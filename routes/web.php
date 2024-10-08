<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{CampaignController, CampaignElementoController, CampaignGaleriaController,
    AuxiliaresController, CampaignPlanController, CampaignPlanGaleriaController, CampaignPresupuestoController,
    CampaignReportingController, CampaignPresupuestoExtraController, ElementoController, EntidadController,
    EscaparateController,
    MaestroController, MarcaController, MontadorController, MontajeMaterialController, MontajeProporcionController, MontajeTipoController, PeticionController, ProductoController, ProductoImagenController, RoleController,
    SghController, StoreController, StoredataController, StoreElementosController, TarifaController, TarifaFamiliaController,
    TiendaController, UploadController, UserController,ProductoImagen, PeticionDetalleController,PeticionHistorialController, ProductoCategoriaController, StoreEscaparateController, StorePeticionesProductoController, StoreProporcionController, StoresPeticionesController, TiendaTipoController};
use App\Mail\MailControlrecepcion2;
use App\Models\StorePeticionesProducto;
use Illuminate\Support\Facades\Mail;

// use HasRoles;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {return view('dashboard');})->name('home');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {

    Route::get('/dashboard', function () {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('seguridad');
        } elseif(Auth::user()->hasRole('grafitex')){
            return redirect()->route('campaign.index');
        }
        elseif(Auth::user()->hasRole('sgh')){
            return redirect()->route('campaign.index');
        }
        elseif(Auth::user()->hasRole('tienda')){
            return redirect()->route('tienda.index');
        }
        elseif(Auth::user()->hasRole('montador')){
            return redirect()->route('montador.index');
        }
        else{
            dd('no tiene rol');
            // dd(Auth::user());
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
            Route::get('/{campaign}/exportaddresses', [CampaignController::class,'exportaddresses'])->name('campaign.exportaddresses')->middleware('can:campaign.index');
            Route::get('/{campaign}/conteo', [CampaignController::class,'conteo'])->name('campaign.conteo')->middleware('can:campaign.index');
            Route::resource('campaign', CampaignController::class)->only('index','edit','update','destroy');
            //Elementos de la campaña
            Route::group(['prefix' => 'elementos'], function () {
                Route::get('/{campaignelemento}', [CampaignElementoController::class,'index'])->name('campaign.elementos')->middleware('can:campaign.index');
                Route::get('/{campaign}/{campaigngaleria}/edit', [CampaignElementoController::class,'editelemento'])->name('campaign.elemento.editelemento')->middleware('can:campaign.edit');
                Route::get('/export/campaignelementos/{campaign}', [CampaignElementoController::class,'exportCampaignElementos'])->name('campaign.elementos.export')->middleware('can:campaign.index');

                // Exporacion estadistiscas
                Route::get('/export/conteoidimatmedmob/{campaign}', [CampaignElementoController::class,'exportConteoIdiomaMatMedMob'])->name('campaign.conteo.export')->middleware('can:campaign.index');
                Route::get('/export/campaignelementos/{campaign}', [CampaignElementoController::class,'exportCampaignElementos'])->name('campaign.elementos.export')->middleware('can:campaign.index');
                Route::get('/export/campaignelementosmat/{campaign}', [CampaignElementoController::class,'exportCampaignElementosMat'])->name('campaign.elementosmat.export')->middleware('can:campaign.index');
                Route::get('/export/campaignelementosmatmed/{campaign}', [CampaignElementoController::class,'exportCampaignElementosMatMed'])->name('campaign.elementosmatmed.export')->middleware('can:campaign.index');
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
            // plan
            Route::group(['prefix' => 'plan'], function () {
                Route::put('/fechas/{camptienda}/update/', [CampaignPlanController::class,'update'])->name('plan.update')->middleware('can:plan.update');
                Route::get('/{campaigntienda}/editplan', [CampaignPlanController::class,'edit'])->name('plan.edit');//->middleware('can:plan.edit','can:plantienda.edit');
                Route::get('/{campaign}', [CampaignPlanController::class,'index'])->name('plan.index')->middleware('can:plan.index');
                // PlanGaleria
                Route::post('/{campaigntienda}/updateimagentienda', [ CampaignPlanGaleriaController::class, 'uploadimagentienda' ])->name('plan.uploadimagentienda');
                Route::delete('/{campaigntienda}/deleteimagentienda/{imagen}', [ CampaignPlanGaleriaController::class, 'deleteimagentienda' ])->name('plan.deleteimagentienda');
            });
        });

    //store.php
        Route::post('stores/updatetiendas',[StoredataController::class,'import'])->name('stores.updatetiendas')->middleware('can:stores.edit');
        Route::get('stores/addresses',[StoreController::class,'addresses'])->name('stores.addresses')->middleware('can:stores.index');
        Route::resource('stores', StoreController::class)->only('index','edit','store','update');

    //store elementos
        Route::post('storeelementos/add/{elemento}/to/{store}',[StoreElementosController::class,'addtostore'])->name('storeelementos.addtostore')->middleware('can:storeelementos.update');
        Route::get('storeelementos/{store}/elementos',[StoreElementosController::class,'elementos'])->name('storeelementos.elementos')->middleware('can:storeelementos.index');

    //store escaparates
        Route::post('storeescaparates/add/{escaparate}/to/{store}',[StoreEscaparateController::class,'addtostore'])->name('storeescaparates.addtostore')->middleware('can:storeescaparate.update');
        Route::get('storeescaparates/{store}/escaparate',[StoreEscaparateController::class,'escaparates'])->name('storeescaparates.escaparates')->middleware('can:storeescaparate.index');

    //store proporciones
        Route::post('storeproporciones/add/{storeproporcion}/to/{store}',[StoreProporcionController::class,'addtostore'])->name('storeproporciones.addtostore')->middleware('can:storeproporcion.update');
        Route::get('storeproporciones/{storeproporcion}/proporcion',[StoreProporcionController::class,'proporciones'])->name('storeproporciones.proporciones')->middleware('can:storeproporcion.index');

    //elemento.php
        Route::resource('elemento', ElementoController::class)->only('index','store','edit','update');

    // tarifa.php
        Route::resource('tarifa', TarifaController::class)->only('index','store','edit','destroy');
    // familias.php
        Route::resource('tarifafamilia', TarifaFamiliaController::class);

    //Auxiliares
        Route::get('auxiliares', [AuxiliaresController::class,'index'])->name('auxiliares.index')->middleware('can:auxiliares.index');

    //Tienda
        Route::get  ('tienda/{campaign}/incidencias/{store}',[TiendaController::class,'envioincidencias'])->name('tienda.envioincidencias')->middleware('can:tiendas.edit');
        Route::put('tienda/{campaign}/update/{store}',[TiendaController::class,'update'])->name('tienda.update')->middleware('can:tiendas.edit');
        Route::get('tienda/{campaign}/controlstores',[TiendaController::class,'controlstores'])->name('tienda.controlstores')->middleware('can:tiendas.index');
        Route::get('tienda/{campaigntienda}/show',[TiendaController::class,'show'])->name('tienda.show')->middleware('can:tiendas.index');
        Route::get('tienda/{campaign}/{store}/edit',[TiendaController::class,'editrecepcion'])->name('tienda.editrecepcion')->middleware('can:tiendas.edit');
        Route::get('tienda/control',[TiendaController::class,'control'])->name('tienda.control')->middleware('can:tiendas.index');
        Route::get('tienda/recepcion',[TiendaController::class,'recepcion'])->name('tienda.recepcion')->middleware('can:tiendas.index');
        Route::get('tienda',[TiendaController::class,'index'])->name('tienda.index')->middleware('can:tiendas.index');

    // tienda montador
        Route::get('montador/{campaigntienda}/edit', [MontadorController::class,'edit'])->name('montador.edittienda')->middleware('can:montador.update');
        Route::get('montador',[MontadorController::class,'index'])->name('montador.index')->middleware('can:montador.index');
        Route::put('/montador/{camptienda}/updateestadomontaje/{ruta}', [MontadorController::class,'updateestadomontaje'])->name('montador.updateestadomontaje')->middleware('can:montador.update');
        Route::put('/montador/{camptienda}/updatefechasmontador/', [MontadorController::class,'updatefechasmontador'])->name('montador.updatefechasmontador')->middleware('can:montador.update');
        Route::put('/montador/{camptienda}/updatemontador/', [MontadorController::class,'updatemontadortienda'])->name('montador.updatemontadortienda')->middleware('can:plan.edit');
        Route::put('/montador/{camptienda}/updatefechasplan/', [MontadorController::class,'updatefechasplan'])->name('montador.updatefechasplan')->middleware('can:plan.edit');

    //Entidades-Montadores
        Route::get('/entidad/nuevocontacto/{entidad}', [EntidadController::class, 'createcontacto'])->name('entidad.createcontacto');
        Route::get('/entidad/contactos/{entidad}', [EntidadController::class, 'contactos'])->name('entidad.contactos');
        Route::get('/entidad/{entidad}/contacto/{ruta}', [EntidadController::class, 'editcontacto'])->name('entidad.editcontacto');
        Route::resource('entidad', EntidadController::class)->only('index','show','edit','update','create');

    //SGH
    Route::group(['prefix' => 'sgh'], function () {
        Route::resource('/', SghController::class)->names('sgh')->only('index');
    });

    //Tienda Tipos
    Route::group(['prefix' => 'tiendatipo'], function () {
        Route::get('/{tiendatipo}/edit', [TiendaTipoController::class, 'editar'])->name('tiendatipo.editar')->middleware('can:tiendatipo.edit');
        Route::resource('/', TiendaTipoController::class)->names('tiendatipo')->except('edit');
    });

    //Categorias Productos de peticiones de las tiendas
        Route::group(['prefix' => 'catprod'], function () {
            Route::get('/{productocategoria}/edit', [ProductoCategoriaController::class, 'editar'])->name('productocategoria.editar')->middleware('can:productocategoria.edit');
            Route::resource('/', ProductoCategoriaController::class)->names('productocategoria')->except('edit');
        });

    //Marcas
        Route::group(['prefix' => 'brand'], function () {
            Route::get('/{marca}/edit', [MarcaController::class, 'editar'])->name('marca.editar')->middleware('can:marcas.edit');
            Route::resource('/', MarcaController::class)->names('marca')->except('edit');
        });

    //Montaje Tipos
    Route::group(['prefix' => 'montajetipo'], function () {
        Route::get('/{montajetipo}/edit', [MontajeTipoController::class, 'editar'])->name('montajetipo.editar')->middleware('can:montajetipo.edit');
        Route::resource('/', MontajeTipoController::class)->names('montajetipo')->except('edit');
    });

    //Montaje Materiales
    Route::group(['prefix' => 'montajematerial'], function () {
        Route::get('/{montajematerial}/edit', [MontajeMaterialController::class, 'editar'])->name('montajematerial.editar')->middleware('can:montajematerial.edit');
        Route::resource('/', MontajeMaterialController::class)->names('montajematerial')->except('edit');
    });

    //Montaje Materiales
    Route::group(['prefix' => 'montajeproporcion'], function () {
        Route::get('/{montajeproporcion}/edit', [MontajeProporcionController::class, 'editar'])->name('montajeproporcion.editar')->middleware('can:montajeproporcion.edit');
        Route::resource('/', MontajeProporcionController::class)->names('montajeproporcion')->except('edit');
    });

    //Escaparates
    Route::group(['prefix' => 'escaparate'], function () {
        Route::get('/{escaparate}/edit', [EscaparateController::class, 'editar'])->name('escaparate.editar')->middleware('can:escaparate.edit');
        Route::resource('/', EscaparateController::class)->names('escaparate')->except('edit');
    });



    //Productos de peticiones de las tiendas
    Route::group(['prefix' => 'prod'], function () {
        Route::get('/producto/{producto}/edit', [ProductoController::class, 'editar'])->name('producto.editar')->middleware('can:producto.edit');
        Route::delete('/{producto}/deleteimagen/{imagen}', [ ProductoImagenController::class, 'deleteimagen' ])->name('producto.deleteimagen');
        Route::resource('/', ProductoController::class)->names('producto')->except('edit');
    });

    //Stores de peticiones de las tiendas y sus productos
    Route::group(['prefix' => 'storespeticiones'], function () {
        Route::get('/{store}/productos',[StorePeticionesProductoController::class,'productos'])->name('storespeticiones.productos')->middleware('can:storeelementos.index');
        Route::resource('/', StoresPeticionesController::class)->names('storespeticiones')->only('index');
    });

    // Peticiones
    Route::group(['prefix' => 'peticiones'], function () {
        Route::get('/etiquetas/pdf/{peticion}', [PeticionController::class,'pdf'])->name('peticion.etiquetas.pdf')->middleware('can:peticion.index');
        Route::get  ('peticion/{peticion}/mail',[PeticionController::class,'enviopeticion'])->name('peticion.enviopeticion')->middleware('can:peticion.edit');
        Route::get('/peticion/{peticion}/edit', [PeticionController::class, 'editar'])->name('peticion.editar')->middleware('can:peticion.edit');
        Route::resource('/', PeticionController::class)->names('peticion');

        //detalles
        Route::get('/detalles/{peticion}/nueva', [PeticionDetalleController::class, 'crear'])->name('peticiondetalle.crear')->middleware('can:peticion.create');
        Route::get('{peticion}/detalle/{peticiondetalle}/edit', [PeticionDetalleController::class, 'edit'])->name('peticiondetalle.edit')->middleware('can:peticion.create');
        Route::resource('/detalles/', PeticionDetalleController::class)->names('peticiondetalle')->only('destroy');

        //historial
        Route::get('/historial/{peticion}/nueva', [PeticionHistorialController::class, 'crear'])->name('peticionhistorial.crear')->middleware('can:peticion.create');
        Route::resource('/historial/', PeticionHistorialController::class)->names('peticionhistorial');
    });

    //Mails
    // Route::get('/mail', function() {

    //     $details=[
    //         'de'=>'alex.arregui@sumaempresa.com',
    //         'a'=>'mosketxu@gmail.com',
    //         'asunto'=>'definirlo',
    //         'cuerpo'=>'Hey ,
    //         Can your Laravel app send emails yet? 😉',
    //     ];
    //     Mail::to($details['a'])->send(new MailControlrecepcion2($details));
    // })->name('maillll');
});


