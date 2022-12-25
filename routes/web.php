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
            return redirect()->route('store.index');
        }
        elseif(Auth::user()->hasRole('tienda')){
            dd('4');
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
    Route::resource('campaign', CampaignController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller
        //Generar Campaña
    Route::group(['prefix' => 'campaign'], function () {
        Route::post('/asociar', [CampaignController::class,'asociar'])->name('campaign.asociar')
            ->middleware('can:campaign.edit');

        Route::post('/asociarstore', [CampaignController::class,'asociarstore'])->name('campaign.asociarstore')
            ->middleware('can:campaign.edit');

        Route::post('generarcampaign/{tipo}/{campaign}', [CampaignController::class,'generarcampaign'])->name('campaign.generar')
            ->middleware('can:campaign.create');

        Route::get('/{campaign}/filtro', [CampaignController::class,'filtrar'])->name('campaign.filtrar')
            ->middleware('can:campaign.edit');

        Route::get('/{campaign}/address', [CampaignController::class,'addresses'])->name('campaign.addresses')
            ->middleware('can:campaign.index');

        Route::get('/{campaign}/exportaddresses', [CampaignController::class,'exportadresses'])->name('campaign.exportaddresses')
            ->middleware('can:campaign.index');

        Route::delete('/delete/{campaign}', [CampaignController::class,'destroy'])->name('campaign.delete')
            ->middleware('can:campaign.destroy');

        // Estadisticas campaña
        Route::get('/{campaign}/conteo', [CampaignController::class,'conteo'])->name('campaign.conteo')
            ->middleware('can:campaign.index');

        //Elementos de la campaña
        Route::group(['prefix' => 'elementos'], function () {
            Route::get('/{campaignlemento}', [CampaignElementoController::class,'index'])->name('campaign.elementos')
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
                ->middleware('can:presupuesto.index');

            Route::get('/edit/{campaignpresupuesto}', [CampaignPresupuestoController::class,'edit'])->name('campaign.presupuesto.edit')
                ->middleware('can:presupuesto.edit');

            Route::get('/cotizacion/{campaignpresupuesto}', [CampaignPresupuestoController::class,'cotizacion'])->name('campaign.presupuesto.cotizacion')
                ->middleware('can:presupuesto.index');

            Route::get('/cotizacion/elementos/{campaignid}/{familiaid}/{presupuestoid}', [CampaignPresupuestoController::class,'elementosfamilia'])->name('campaign.presupuesto.elementosfamilia')
                ->middleware('can:presupuesto.index');

            Route::post('/update/{campaignpresupuesto}', [CampaignPresupuestoController::class,'update'])->name('campaign.presupuesto.update')
                ->middleware('can:presupuesto.edit');

            Route::put('/updateelemento', [CampaignPresupuestoController::class,'updateelemento'])->name('campaign.presupuesto.updateelemento')
                ->middleware('can:presupuesto.edit');

            Route::get('/refresh/{campaign}/{campaignpresupuesto}', [CampaignPresupuestoController::class,'refresh'])->name('campaign.presupuesto.refresh')
                ->middleware('can:presupuesto.edit');

            Route::post('/store', [CampaignPresupuestoController::class,'store'])->name('campaign.presupuesto.store')
                ->middleware('can:presupuesto.create');

            Route::delete('/delete/{campaignpresupuesto}', [CampaignPresupuestoController::class,'destroy'])->name('campaign.presupuesto.delete')
                ->middleware('can:presupuesto.destroy');

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
                    ->middleware('can:presupuesto.create');

                Route::delete('/delete/{campaignpresupuestoextra}', [CampaignPresupuestoExtraController::class,'destroy'])->name('campaign.presupuesto.extra.delete')
                    ->middleware('can:presupuesto.destroy');
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

            Route::get('/presupuesto/preview/{campaignreportingcontroller}', [CampaignReportingController::class,'previewPresupuesto'])->name('campaign.presupuesto.previewPresupuesto')
                ->middleware('can:campaign.index');
        });
    });

    //store.php
    Route::post('store/updatetiendas',[StoredataController::class,'import'])->name('store.updatetiendas')->middleware('can:store.edit');

    Route::get('store/adresses',[StoreController::class,'adresses'])->name('store.addresses')->middleware('can:store.index');
    Route::post('store/updateimagenindex', [StoreController::class,'updateimagenindex'])->name('store.updateimagenindex')->middleware('can:store.create');
    Route::resource('store', StoreController::class)->except('create','show'); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    //store elementos
    Route::get('storeelementos/{store}/elementos',[StoreElementosController::class,'elementos'])->name('storeelementos.elementos')->middleware('can:store.index');
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
    Route::get('tienda/control','TiendaController@control')->name('tienda.control')->middleware('can:tiendas.index');
    Route::resource('tiendas', TiendaController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

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


