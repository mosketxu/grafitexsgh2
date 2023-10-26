<?php

namespace App\Http\Controllers;

use App\Models\Peticion;
use App\Http\Requests\StorePeticionRequest;
use App\Http\Requests\UpdatePeticionRequest;

class PeticionController extends Controller
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
     * @param  \App\Http\Requests\StorePeticionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeticionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function show(Peticion $peticion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function edit(Peticion $peticion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeticionRequest  $request
     * @param  \App\Models\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeticionRequest $request, Peticion $peticion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peticion $peticion)
    {
        //
    }
}
