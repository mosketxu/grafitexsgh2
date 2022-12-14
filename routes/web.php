<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{RoleController,UserController};



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
    // Route::get('/seguridad', function () {return view('seguridad.seguridad');})->middleware('can:seguridad.index')->name('seguridad');
    Route::get('/seguridad', function () {return view('seguridad.seguridad');})->name('seguridad');

    //Roles
    Route::resource('roles', RoleController::class)->only(['edit','update'])->names('roles');

    //Users
    Route::resource('users', UserController::class)->except(['create'])->names('users'); //cuando es resource para aplicar seguridad can hay que hacerlo en el controller

    // Route::group(['middleware' => ['auth']], function () {
    //     //User
    //     require __DIR__ .'/user.php';
    //     //Roles
    //     require __DIR__ .'/roles.php';
    //     //Permisos
    //     require __DIR__ .'/permisos.php';
    //     //Maestro
    //     require __DIR__ .'/maestro.php';
    //     //Store
    //     require __DIR__ .'/store.php';
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


