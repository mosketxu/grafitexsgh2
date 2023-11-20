<?php

namespace App\Http\Controllers;

use App\Models\PeticionHistorial;
use App\Http\Requests\StorePeticionHistorialRequest;
use App\Http\Requests\UpdatePeticionHistorialRequest;
use App\Models\Peticion;

class PeticionHistorialController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear(Peticion $peticion){
        $ruta="peticiones";
        return view('peticionhistorial.create',compact('ruta','peticion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeticionHistorialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeticionHistorialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PeticionHistorial  $peticionHistorial
     * @return \Illuminate\Http\Response
     */
    public function show(PeticionHistorial $peticionHistorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PeticionHistorial  $peticionHistorial
     * @return \Illuminate\Http\Response
     */
    public function edit(PeticionHistorial $peticionHistorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeticionHistorialRequest  $request
     * @param  \App\Models\PeticionHistorial  $peticionHistorial
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeticionHistorialRequest $request, PeticionHistorial $peticionHistorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PeticionHistorial  $peticionHistorial
     * @return \Illuminate\Http\Response
     */
    public function destroy(PeticionHistorial $peticionHistorial)
    {
        //
    }
}
