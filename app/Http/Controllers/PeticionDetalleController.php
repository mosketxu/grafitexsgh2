<?php

namespace App\Http\Controllers;

use App\Models\PeticionDetalle;
use App\Models\Peticion;

class PeticionDetalleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:peticion.edit')->only('crear','edit');
    }

    public function crear(Peticion $peticion){
        $ruta="peticiones";
        return view('peticiondetalle.create',compact('ruta','peticion'));
    }


    public function edit(Peticion $peticion, PeticionDetalle $peticiondetalle){
        $ruta="peticiones";

        return view('peticiondetalle.edit',compact('peticion','ruta','peticiondetalle'));
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeticionDetalle  $peticionDetalle
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeticionDetalle $peticionDetalle)
    {
        dd('falta');
    }

}
