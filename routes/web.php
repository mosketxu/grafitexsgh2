<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{CampaignController, CampaignElementoController, CampaignGaleriaController,AuxiliaresController,  CampaignPresupuestoController, CampaignReportingController, CampaignPresupuestoExtraController, ElementoController, MaestroController, RoleController, StoreController, StoredataController, StoreElementosController, TarifaController, TiendaController, UserController};


Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {return view('dashboard');})->name('home');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', function () {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('seguridad');
        } elseif(Auth::user()->hasRole('grafitex')){
            dd('2');
            return redirect()->route('campaign.index');
        }
        elseif(Auth::user()->hasRole('sgh')){
            dd('3');
            return redirect()->route('stores.index');
        }
        elseif(Auth::user()->hasRole('tienda')){
            return redirect()->route('tienda.index');
        }
        elseif(Auth::user()->hasRole('proveedor')){
            dd('5');
            return redirect()->route('tienda.index');
        }
        else{
            dd(Auth::user());
        }
    })->name('dashboard');

    //Seguridad
    Route::get('/seguridad', function () {return view('seguridad.seguridad');})->name('seguridad');
    // Route::get('/seguridad', function () {return view('seguridad.seguridad');})->middleware('can:seguridad.index')->name('seguridad');

    //Roles
    Route::resource('roles', RoleController::class)->only(['edit','update'])->names('roles');

    //Users
    Route::resource('users', UserController::class)->except(['create'])->names('users'); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    //Maestro
    // require __DIR__ .'/maestro.php';
    Route::post('/maestro/import/{origen}', [MaestroController::class,'import'])->name('maestro.import')->middleware('can:maestro.create');
    Route::get('maestro/actualizatablas/{origen}',[MaestroController::class,'actualizartablas'])->name('maestro.actualizatablas')->middleware('can:maestro.edit');;
    Route::get('maestro/actualizaStoreElementos',[MaestroController::class,'actualizastoreelementos'])->name('maestro.actualizastoreelementos')->middleware('can:maestro.edit');;
    Route::resource('maestro', MaestroController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    //campaign.php
    Route::group(['prefix' => 'campaign'], function () {
        Route::post('generarcampaign/{tipo}/{campaign}', [CampaignController::class,'generarcampaign'])->name('campaign.generar')
            ->middleware('can:campaign.create');
        Route::get('/{campaign}/filtro', [CampaignController::class,'filtrar'])->name('campaign.filtrar') //creo que sobra pw lo hago con livewire
            ->middleware('can:campaign.edit');
        Route::get('/{campaign}/address', [CampaignController::class,'addresses'])->name('campaign.addresses')
            ->middleware('can:campaign.index');
        Route::get('/{campaign}/exportaddresses', [CampaignController::class,'exportadresses'])->name('campaign.exportaddresses')
            ->middleware('can:campaign.index');
        Route::delete('/delete/{campaign}', [CampaignController::class,'destroy'])->name('campaign.delete')
            ->middleware('can:campaign.destroy');
        Route::get('/{campaign}/conteo', [CampaignController::class,'conteo'])->name('campaign.conteo')
            ->middleware('can:campaign.index');
        Route::resource('campaign', CampaignController::class)
            ->only('index','edit','update'); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

        //Elementos de la campaña
        Route::group(['prefix' => 'elementos'], function () {
            Route::get('/{campaignelemento}', [CampaignElementoController::class,'index'])->name('campaign.elementos')
                ->middleware('can:campaign.index');
            Route::get('/{campaign}/{campaigngaleria}/edit', [CampaignElementoController::class,'editelemento'])->name('campaign.elemento.editelemento')
                ->middleware('can:campaign.edit');
            Route::post('/update', [CampaignElementoController::class,'update'])->name('campaign.elemento.update')
                ->middleware('can:campaign.edit');
            Route::post('/updateimagenindex', [CampaignElementoController::class,'updateimagenindex'])->name('campaign.elementos.updateimagenindex')
                ->middleware('can:campaign.edit');
            Route::get('/export/conteoidimatmedmob/{campaign}', [CampaignElementoController::class,'exportConteoIdiomaMatMedMob'])->name('campaign.conteo.export')
                ->middleware('can:campaign.index');
            Route::get('/export/campaignelementos/{campaign}', [CampaignElementoController::class,'exportCampaignElementos'])->name('campaign.elementos.export')
                ->middleware('can:campaign.index');
            Route::get('/export/campaignelementosmat/{campaign}', [CampaignElementoController::class,'exportCampaignElementosMat'])->name('campaign.elementosmat.export')
                ->middleware('can:campaign.index');
            Route::get('/export/campaignelementosmatmed/{campaign}', [CampaignElementoController::class,'exportCampaignElementosMatMed'])->name('campaign.elementosmatmed.export')
                ->middleware('can:campaign.index');
        });
        // galeria
        Route::group(['prefix' => 'galeria'], function () {
            Route::get('/{campaign}', [CampaignGaleriaController::class,'index'])->name('campaign.galeria')
                ->middleware('can:campaign.index');
            Route::get('/{campaigngaleria}', [CampaignGaleriaController::class,'edit'])->name('campaign.galeria.edit')
                ->middleware('can:campaign.edit');
            Route::get('/{campaign}/{campaigngaleria}/edit', [CampaignGaleriaController::class,'editgaleria'])->name('campaign.galeria.editgaleria')
                ->middleware('can:campaign.edit');
            Route::post('/update', [CampaignGaleriaController::class,'update'])->name('campaign.galeria.update')
                ->middleware('can:campaign.edit');
            Route::post('/updateimagenindex', [CampaignGaleriaController::class,'updateimagenindex'])->name('campaign.galeria.updateimagenindex')
                ->middleware('can:campaign.edit');
        });
        // presupuesto
        Route::group(['prefix' => 'presupuesto'], function () {
            Route::get('/{campaign}', [CampaignPresupuestoController::class,'index'])->name('campaign.presupuesto')
                ->middleware('can:presupuestos.index');
            Route::get('/presupuesto/{campaignpresupuesto}/cotizacion', [CampaignPresupuestoController::class,'cotizacion'])->name('campaign.presupuesto.cotizacion')
            ->middleware('can:presupuestos.index');
            Route::get('/edit/{campaignpresupuesto}', [CampaignPresupuestoController::class,'edit'])->name('campaign.presupuesto.edit')
                ->middleware('can:presupuestos.edit');
            Route::get('/cotizacion/elementos/{campaignid}/{familiaid}/{presupuestoid}', [CampaignPresupuestoController::class,'elementosfamilia'])->name('campaign.presupuesto.elementosfamilia')
                ->middleware('can:presupuestos.index');
            Route::post('/update/{campaignpresupuesto}', [CampaignPresupuestoController::class,'update'])->name('campaign.presupuesto.update')
                ->middleware('can:presupuestos.edit');
            Route::put('/updateelemento', [CampaignPresupuestoController::class,'updateelemento'])->name('campaign.presupuesto.updateelemento')
                ->middleware('can:presupuestos.edit');
            Route::get('/refresh/{campaign}/{campaignpresupuesto}', [CampaignPresupuestoController::class,'refresh'])->name('campaign.presupuesto.refresh')
                ->middleware('can:presupuestos.edit');
            Route::post('/store', [CampaignPresupuestoController::class,'store'])->name('campaign.presupuesto.store')
                ->middleware('can:presupuestos.create');
            Route::delete('/delete/{campaignpresupuesto}', [CampaignPresupuestoController::class,'destroy'])->name('campaign.presupuesto.delete')
                ->middleware('can:presupuestos.delete');
            //presupuesto detalles
            // Route::group(['prefix' => 'detalle'], function () {
            //     Route::post('/update/{campaignpresupuestodetalle}', 'CampaignPresupuestoDetalleController@update')->name('campaign.presupuesto.detalle.update')
            //         ->middleware('can:campaign.edit');

            //     Route::post('/store', 'CampaignPresupuestoDetalleController@store')->name('campaign.presupuesto.detalle.store')
            //         ->middleware('can:campaign.create');

            //     Route::get('/delete/{campaignpresupuestodetalle}', 'CampaignPresupuestoDetalleController@destroy')->name('campaign.presupuesto.detalle.delete')
            //         ->middleware('can:campaign.destroy');
            // });

            //presupuesto extras
            Route::group(['prefix' => 'extra'], function () {
                Route::post('/update/{campaignpresupuestoextra}', [CampaignPresupuestoExtraController::class,'update'])->name('campaign.presupuesto.extra.update')
                    ->middleware('can:prespuesto.edit');

                Route::post('/store', [CampaignPresupuestoExtraController::class,'store'])->name('campaign.presupuesto.extra.store')
                    ->middleware('can:presupuestos.create');

                Route::delete('/delete/{campaignpresupuestoextra}', [CampaignPresupuestoExtraController::class,'destroy'])->name('campaign.presupuesto.extra.delete')
                    ->middleware('can:presupuestos.destroy');
            });
        });

        // Reporting
        Route::group(['prefix' => 'reporting'], function () {
            // etiquetas
            Route::get('/etiquetas/pdf/{campaign}', [CampaignReportingController::class,'pdf'])->name('campaign.etiquetas.pdf')
                ->middleware('can:campaign.index');

            Route::get('/etiquetas/{campaign}', [CampaignReportingController::class,'index'])->name('campaign.etiquetas.index')
            ->middleware('can:campaign.index');

            // presupuesto
            Route::get('/presupuesto/pdf/{campaignreportingcontroller}', [CampaignReportingController::class,'pdfPresupuesto'])->name('campaign.presupuesto.pdfPresupuesto')
                ->middleware('can:campaign.index');
            Route::get('/presupuesto/{campaignreportingcontroller}/pdf', [CampaignReportingController::class,'pdfPresupuestounido'])->name('campaign.presupuesto.pdfPresupuestounido')
                ->middleware('can:campaign.index');

            Route::get('/presupuesto/preview/{campaignreportingcontroller}', [CampaignReportingController::class,'previewPresupuesto'])->name('campaign.presupuesto.previewPresupuesto')
                ->middleware('can:campaign.index');
        });
    });

    //store.php
    Route::post('store/updatetiendas',[StoredataController::class,'import'])->name('stores.updatetiendas')->middleware('can:stores.edit');
    Route::get('store/adresses',[StoreController::class,'adresses'])->name('stores.addresses')->middleware('can:stores.index');
    Route::post('store/updateimagenindex', [StoreController::class,'updateimagenindex'])->name('stores.updateimagenindex')->middleware('can:store.create');
    Route::resource('stores', StoreController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller


    //store elementos
    Route::get('storeelementos/{store}/elementos',[StoreElementosController::class,'elementos'])->name('storeelementos.elementos')->middleware('can:stores.index');
    Route::resource('storeelementos', StoreElementosController::class)->except('create','update');; //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    //elemento.php
    Route::resource('elemento', ElementoController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    // tarifa.php
    Route::resource('tarifa', TarifaController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller


    //auxiliares
    Route::group(['prefix'=>'auxiliares'],function(){
        Route::get('/', [AuxiliaresController::class,'index'])->name('auxiliares.index')->middleware('can:auxiliares.index');
    });

    // Route::group(['middleware' => ['auth']], function () {
    //     //Tienda
    //     require __DIR__ .'/tienda.php';
    Route::put('tienda/update',[TiendaController::class,'update'])->name('tienda.update')->middleware('can:tiendas.edit');
    Route::get('tienda/{campaign}/controlstores',[TiendaController::class,'controlstores'])->name('tienda.controlstores')->middleware('can:tiendas.index');
    Route::get('tienda/control',[TiendaController::class,'control'])->name('tienda.control')->middleware('can:tiendas.index');
    Route::get('tienda/{campaign}/{store}/show',[TiendaController::class,'show'])->name('tienda.show')->middleware('can:tiendas.index');
    Route::get('tienda/{campaign}/{store}/edit',[TiendaController::class,'editrecepcion'])->name('tienda.editrecepcion')->middleware('can:tiendas.edit');
    Route::get('tienda',[TiendaController::class,'index'])->name('tienda.index')->middleware('can:tiendas.index');
    // Route::resource('tiendas', TiendaController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    //     //Store elementos
    //     require __DIR__ .'/storeelementos.php';
    //     // Elementos
    //     require __DIR__ .'/elemento.php';
    //     //Auxiliares
    //     require __DIR__ .'/auxiliares.php';
    //     //Campañas
    //     require __DIR__ .'/campaign.php';
    //     // Tarifa
    //     require __DIR__ .'/tarifa.php';
    //     // Tarifa Familia
    //     require __DIR__ .'/tarifafamilia.php';
    // });
});


