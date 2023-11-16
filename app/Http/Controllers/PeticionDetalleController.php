<?php

namespace App\Http\Controllers;

use App\Models\PeticionDetalle;
use App\Http\Requests\StorePeticionDetalleRequest;
use App\Http\Requests\UpdatePeticionDetalleRequest;
use App\Models\Peticion;

class PeticionDetalleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function crear(Peticion $peticion){
        $ruta="peticiones";
        return view('peticiondetalle.create',compact('ruta','peticion'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeticionDetalle  $peticionDetalle
     * @return \Illuminate\Http\Response
     */
    public function show(PeticionDetalle $peticionDetalle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeticionDetalle  $peticionDetalle
     * @return \Illuminate\Http\Response
     */
    public function edit(PeticionDetalle $peticionDetalle)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeticionDetalle  $peticionDetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeticionDetalle $peticionDetalle)
    {
        //
    }
}
