<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{CampaignController, ElementoController, MaestroController, RoleController, StoreController, StoredataController,TarifaController, UserController};



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home','HomeController@index')->name('home');
Route::get('/home', function () {return view('dashboard');})->name('home');


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    // Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

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
    Route::get('/seguridad', function () {return view('seguridad.seguridad');})->middleware('can:seguridad.index')->name('seguridad');

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
        Route::post('/asociar', 'CampaignController@asociar')->name('campaign.asociar')
            ->middleware('can:campaign.edit');

        Route::post('/asociarstore', 'CampaignController@asociarstore')->name('campaign.asociarstore')
            ->middleware('can:campaign.edit');

        Route::post('generarcampaign/{tipo}/{campaign}', 'CampaignController@generarcampaign')->name('campaign.generar')
            ->middleware('can:campaign.create');

        Route::get('/{campaign}/filtro', 'CampaignController@filtrar')->name('campaign.filtrar')
            ->middleware('can:campaign.edit');

        Route::get('/{campaign}/address', 'CampaignController@addresses')->name('campaign.addresses')
            ->middleware('can:campaign.index');

        Route::get('/{campaign}/exportaddresses', 'CampaignController@exportadresses')->name('campaign.exportaddresses')
            ->middleware('can:campaign.index');

        Route::delete('/delete/{campaign}', 'CampaignController@destroy')->name('campaign.delete')
            ->middleware('can:campaign.destroy');

        // Estadisticas campaña
        Route::get('/{campaign}/conteo', 'CampaignController@conteo')->name('campaign.conteo')
            ->middleware('can:campaign.index');

        //Elementos de la campaña
        Route::group(['prefix' => 'elementos'], function () {
            Route::get('/{campaignlemento}', 'CampaignElementoController@index')->name('campaign.elementos')
                ->middleware('can:campaign.index');

            Route::get('/{campaign}/{campaigngaleria}/edit', 'CampaignElementoController@editelemento')->name('campaign.elemento.editelemento')
                ->middleware('can:campaign.edit');

            Route::post('/update', 'CampaignElementoController@update')->name('campaign.elemento.update')
                ->middleware('can:campaign.edit');

            Route::post('/updateimagenindex', 'CampaignElementoController@updateimagenindex')->name('campaign.elementos.updateimagenindex')
                ->middleware('can:campaign.edit');

            Route::get('/export/conteoidimatmedmob/{campaign}', 'CampaignElementoController@exportConteoIdiomaMatMedMob')->name('campaign.conteo.export')
                ->middleware('can:campaign.index');

            Route::get('/export/campaignelementos/{campaign}', 'CampaignElementoController@exportCampaignElementos')->name('campaign.elementos.export')
                ->middleware('can:campaign.index');

            Route::get('/export/campaignelementosmat/{campaign}', 'CampaignElementoController@exportCampaignElementosMat')->name('campaign.elementosmat.export')
                ->middleware('can:campaign.index');

            Route::get('/export/campaignelementosmatmed/{campaign}', 'CampaignElementoController@exportCampaignElementosMatMed')->name('campaign.elementosmatmed.export')
                ->middleware('can:campaign.index');
        });
        // galeria
        Route::group(['prefix' => 'galeria'], function () {
            Route::get('/{campaign}', 'CampaignGaleriaController@index')->name('campaign.galeria')
                ->middleware('can:campaign.index');

            Route::get('/{campaigngaleria}', 'CampaignGaleriaController@edit')->name('campaign.galeria.edit')
                ->middleware('can:campaign.edit');

            Route::get('/{campaign}/{campaigngaleria}/edit', 'CampaignGaleriaController@editgaleria')->name('campaign.galeria.editgaleria')
                ->middleware('can:campaign.edit');

            Route::post('/update', 'CampaignGaleriaController@update')->name('campaign.galeria.update')
                ->middleware('can:campaign.edit');

            Route::post('/updateimagenindex', 'CampaignGaleriaController@updateimagenindex')->name('campaign.galeria.updateimagenindex')
                ->middleware('can:campaign.edit');
        });
        // presupuesto
        Route::group(['prefix' => 'presupuesto'], function () {
            Route::get('/{campaign}', 'CampaignPresupuestoController@index')->name('campaign.presupuesto')
                ->middleware('can:presupuesto.index');

            Route::get('/edit/{campaignpresupuesto}', 'CampaignPresupuestoController@edit')->name('campaign.presupuesto.edit')
                ->middleware('can:presupuesto.edit');

            Route::get('/cotizacion/{campaignpresupuesto}', 'CampaignPresupuestoController@cotizacion')->name('campaign.presupuesto.cotizacion')
                ->middleware('can:presupuesto.index');

            Route::get('/cotizacion/elementos/{campaignid}/{familiaid}/{presupuestoid}', 'CampaignPresupuestoController@elementosfamilia')->name('campaign.presupuesto.elementosfamilia')
                ->middleware('can:presupuesto.index');

            Route::post('/update/{campaignpresupuesto}', 'CampaignPresupuestoController@update')->name('campaign.presupuesto.update')
                ->middleware('can:presupuesto.edit');

            Route::put('/updateelemento', 'CampaignPresupuestoController@updateelemento')->name('campaign.presupuesto.updateelemento')
                ->middleware('can:presupuesto.edit');

            Route::get('/refresh/{campaign}/{campaignpresupuesto}', 'CampaignPresupuestoController@refresh')->name('campaign.presupuesto.refresh')
                ->middleware('can:presupuesto.edit');

            Route::post('/store', 'CampaignPresupuestoController@store')->name('campaign.presupuesto.store')
                ->middleware('can:presupuesto.create');

            Route::delete('/delete/{campaignpresupuesto}', 'CampaignPresupuestoController@destroy')->name('campaign.presupuesto.delete')
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
                Route::post('/update/{campaignpresupuestoextra}', 'CampaignPresupuestoExtraController@update')->name('campaign.presupuesto.extra.update')
                    ->middleware('can:prespuesto.edit');

                Route::post('/store', 'CampaignPresupuestoExtraController@store')->name('campaign.presupuesto.extra.store')
                    ->middleware('can:presupuesto.create');

                Route::delete('/delete/{campaignpresupuestoextra}', 'CampaignPresupuestoExtraController@destroy')->name('campaign.presupuesto.extra.delete')
                    ->middleware('can:presupuesto.destroy');
            });
        });

        // Reporting
        Route::group(['prefix' => 'reporting'], function () {
            // etiquetas
            Route::get('/etiquetas/pdf/{campaign}', 'CampaignReportingController@pdf')->name('campaign.etiquetas.pdf')
                ->middleware('can:campaign.index');

            Route::get('/etiquetas/{campaign}', 'CampaignReportingController@index')->name('campaign.etiquetas.index')
            ->middleware('can:campaign.index');

            // presupuesto
            Route::get('/presupuesto/pdf/{campaignreportingcontroller}', 'CampaignReportingController@pdfPresupuesto')->name('campaign.presupuesto.pdfPresupuesto')
                ->middleware('can:campaign.index');

            Route::get('/presupuesto/preview/{campaignreportingcontroller}', 'CampaignReportingController@previewPresupuesto')->name('campaign.presupuesto.previewPresupuesto')
                ->middleware('can:campaign.index');
        });
    });

    //store.php
    Route::get('store/adresses',[StoreController::class,'adresses'])->name('store.adresses')->middleware('can:store.index');
    Route::post('store/updatetiendas',[StoredataController::class,'import'])->name('store.updatetiendas')->middleware('can:store.edit');
    Route::post('store/updateimagenindex', [StoreController::class,'updateimagenindex'])->name('store.updateimagenindex')->middleware('can:store.create');
    Route::resource('store', StoreController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    //elemento.php
    Route::resource('elemento', ElementoController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    // tarifa.php
    Route::resource('tarifa', TarifaController::class); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller


    //auxiliares
    Route::group(['prefix'=>'auxiliares'],function(){
        Route::get('/', 'AuxiliaresController@index')->name('auxiliares.index')->middleware('can:auxiliares.index');

        require __DIR__ .'/country.php';
        require __DIR__ .'/area.php';
        require __DIR__ .'/segmento.php';
        require __DIR__ .'/furniture.php';
        require __DIR__ .'/storeconcept.php';
        require __DIR__ .'/ubicacion.php';
        require __DIR__ .'/mobiliario.php';
        require __DIR__ .'/propxelemento.php';
        require __DIR__ .'/carteleria.php';
        require __DIR__ .'/medida.php';
        require __DIR__ .'/material.php';
    });

    // Route::group(['middleware' => ['auth']], function () {
    //     //Tienda
    //     require __DIR__ .'/tienda.php';
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


