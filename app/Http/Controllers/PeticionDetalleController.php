<?php

namespace App\Http\Controllers;

use App\Models\PeticionDetalle;
use App\Http\Requests\StorePeticionDetalleRequest;
use App\Http\Requests\UpdatePeticionDetalleRequest;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeticionDetalleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeticionDetalleRequest $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeticionDetalleRequest  $request
     * @param  \App\Models\PeticionDetalle  $peticionDetalle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeticionDetalleRequest $request, PeticionDetalle $peticionDetalle)
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
