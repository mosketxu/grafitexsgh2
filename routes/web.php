<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{CampaignController, CampaignElementoController, CampaignGaleriaController,AuxiliaresController,  CampaignPresupuestoController, CampaignReportingController, CampaignPresupuestoExtraController, ElementoController, EntidadController, MaestroController, RoleController, StoreController, StoredataController, StoreElementosController, TarifaController, TiendaController, UserController};


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

    //Roles
    Route::resource('roles', RoleController::class)->only(['edit','update'])->names('roles');

    //Users
    Route::resource('users', UserController::class)->except(['create'])->names('users'); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    //Maestro
    Route::post('/maestro/import/{origen}', [MaestroController::class,'import'])->name('maestro.import')->middleware('can:maestro.create');
    Route::get('maestro/actualizatablas/{origen}',[MaestroController::class,'actualizartablas'])->name('maestro.actualizatablas')->middleware('can:maestro.edit');
    Route::get('maestro/actualizaStoreElementos',[MaestroController::class,'actualizastoreelementos'])->name('maestro.actualizastoreelementos')->middleware('can:maestro.edit');
    Route::resource('maestro', MaestroController::class)->only('index');

    //campaign.php
    Route::group(['prefix' => 'campaign'], function () {
        Route::post('generarcampaign/{tipo}/{campaign}', [CampaignController::class,'generarcampaign'])->name('campaign.generar')->middleware('can:campaign.create');
        Route::get('/{campaign}/filtro', [CampaignController::class,'filtrar'])->name('campaign.filtrar')->middleware('can:campaign.edit');
        Route::get('/{campaign}/address', [CampaignController::class,'addresses'])->name('campaign.addresses')->middleware('can:campaign.index');
        Route::get('/{campaign}/exportaddresses', [CampaignController::class,'exportadresses'])->name('campaign.exportaddresses')->middleware('can:campaign.index');
        Route::delete('/delete/{campaign}', [CampaignController::class,'destroy'])->name('campaign.delete')->middleware('can:campaign.destroy');
        Route::get('/{campaign}/conteo', [CampaignController::class,'conteo'])->name('campaign.conteo')->middleware('can:campaign.index');
        Route::resource('campaign', CampaignController::class)->only('index','edit','update');

        // plan
        Route::group(['prefix' => 'campaignplan'], function () {
            Route::put('/update/{campaign}', [CampaignController::class,'updateplanfechas'])->name('campaign.updateplanfechas')->middleware('can:plan.edit');
            Route::put('/{camptienda}/update/', [CampaignController::class,'updateplantienda'])->name('campaign.updateplantienda')->middleware('can:plan.edit');
            Route::get('/{campaigntienda}/editplan', [CampaignController::class,'editplantienda'])->name('campaign.editplantienda')->middleware('can:plan.edit');
            Route::get('/{campaign}/generar', [CampaignController::class,'generarplan'])->name('campaign.generarplan')->middleware('can:plan.edit');
            Route::get('/{campaign}', [CampaignController::class,'plan'])->name('campaign.plan')->middleware('can:plan.index');
        });

            //Elementos de la campaña
        Route::group(['prefix' => 'elementos'], function () {
            Route::get('/{campaignelemento}', [CampaignElementoController::class,'index'])->name('campaign.elementos')->middleware('can:campaign.index');
            Route::get('/{campaign}/{campaigngaleria}/edit', [CampaignElementoController::class,'editelemento'])->name('campaign.elemento.editelemento')->middleware('can:campaign.edit');
            Route::get('/export/campaignelementos/{campaign}', [CampaignElementoController::class,'exportCampaignElementos'])->name('campaign.elementos.export')->middleware('can:campaign.index');
        });
        // galeria
        Route::group(['prefix' => 'galeria'], function () {
            Route::get('/{campaign}', [CampaignGaleriaController::class,'index'])->name('campaign.galeria')->middleware('can:campaign.index');
            Route::get('/{campaign}/{campaigngaleria}/edit', [CampaignGaleriaController::class,'editgaleria'])->name('campaign.galeria.editgaleria')->middleware('can:campaign.edit');
            Route::post('/update', [CampaignGaleriaController::class,'update'])->name('campaign.galeria.update')->middleware('can:campaign.edit');
        });
        // presupuesto
        Route::group(['prefix' => 'presupuesto'], function () {
            Route::get('/{campaign}', [CampaignPresupuestoController::class,'index'])->name('campaign.presupuesto')->middleware('can:presupuestos.index');
            Route::get('/presupuesto/{campaignpresupuesto}/cotizacion', [CampaignPresupuestoController::class,'cotizacion'])->name('campaign.presupuesto.cotizacion')->middleware('can:presupuestos.index');
            Route::get('/edit/{campaignpresupuesto}', [CampaignPresupuestoController::class,'edit'])->name('campaign.presupuesto.edit')->middleware('can:presupuestos.edit');
            Route::get('/cotizacion/elementos/{campaignid}/{familiaid}/{presupuestoid}', [CampaignPresupuestoController::class,'elementosfamilia'])->name('campaign.presupuesto.elementosfamilia')->middleware('can:presupuestos.index');
            Route::post('/update/{campaignpresupuesto}', [CampaignPresupuestoController::class,'update'])->name('campaign.presupuesto.update')->middleware('can:presupuestos.edit');
            Route::put('/updateelemento', [CampaignPresupuestoController::class,'updateelemento'])->name('campaign.presupuesto.updateelemento')->middleware('can:presupuestos.edit');
            Route::get('/refresh/{campaign}/{campaignpresupuesto}', [CampaignPresupuestoController::class,'refresh'])->name('campaign.presupuesto.refresh')->middleware('can:presupuestos.edit');
            Route::post('/store', [CampaignPresupuestoController::class,'store'])->name('campaign.presupuesto.store')->middleware('can:presupuestos.create');
            Route::delete('/delete/{campaignpresupuesto}', [CampaignPresupuestoController::class,'destroy'])->name('campaign.presupuesto.delete')->middleware('can:presupuestos.delete');

            //presupuesto extras
            Route::group(['prefix' => 'extra'], function () {
            });
        });

        // Reporting PDF´s
        Route::group(['prefix' => 'reporting'], function () {
            // Etiquetas
            Route::get('/etiquetas/pdf/{campaign}', [CampaignReportingController::class,'pdf'])->name('campaign.etiquetas.pdf')->middleware('can:campaign.index');
            Route::get('/etiquetas/{campaign}', [CampaignReportingController::class,'index'])->name('campaign.etiquetas.index')->middleware('can:campaign.index');

            // presupuesto
            Route::get('/presupuesto/pdf/{campaignreportingcontroller}', [CampaignReportingController::class,'pdfPresupuesto'])->name('campaign.presupuesto.pdfPresupuesto')->middleware('can:campaign.index');
            Route::get('/presupuesto/{campaignreportingcontroller}/pdf', [CampaignReportingController::class,'pdfPresupuestounido'])->name('campaign.presupuesto.pdfPresupuestounido')->middleware('can:campaign.index');
        });
    });

    //store.php
    Route::post('store/updatetiendas',[StoredataController::class,'import'])->name('stores.updatetiendas')->middleware('can:stores.edit');
    Route::get('store/adresses',[StoreController::class,'adresses'])->name('stores.addresses')->middleware('can:stores.index');
    Route::resource('stores', StoreController::class)->only('index','edit','update');

    //store elementos
    Route::get('storeelementos/{store}/elementos',[StoreElementosController::class,'elementos'])->name('storeelementos.elementos')->middleware('can:stores.index');

    //elemento.php
    Route::resource('elemento', ElementoController::class)->only('index','store','edit','update');

    // tarifa.php
    Route::resource('tarifa', TarifaController::class)->only('index','store','edit','destroy');

    //Auxiliares
    Route::get('auxiliares', [AuxiliaresController::class,'index'])->name('auxiliares.index')->middleware('can:auxiliares.index');

    //Tienda
    Route::put('tienda/update',[TiendaController::class,'update'])->name('tienda.update')->middleware('can:tiendas.edit');
    Route::get('tienda/{campaign}/controlstores',[TiendaController::class,'controlstores'])->name('tienda.controlstores')->middleware('can:tiendas.index');
    Route::get('tienda/{campaign}/{store}/show',[TiendaController::class,'show'])->name('tienda.show')->middleware('can:tiendas.index');
    Route::get('tienda/{campaign}/{store}/edit',[TiendaController::class,'editrecepcion'])->name('tienda.editrecepcion')->middleware('can:tiendas.edit');
    Route::get('tienda/control',[TiendaController::class,'control'])->name('tienda.control')->middleware('can:tiendas.index');
    Route::get('tienda',[TiendaController::class,'index'])->name('tienda.index')->middleware('can:tiendas.index');

    //Entidades
    Route::get('/entidad/nuevocontacto/{entidad}', [EntidadController::class, 'createcontacto'])->name('entidad.createcontacto');
    Route::get('/entidad/contactos/{entidad}', [EntidadController::class, 'contactos'])->name('entidad.contactos');
    Route::resource('entidad', EntidadController::class)->only('index','show','edit','update','create');
});


