<?php

namespace App\Http\Controllers;

use App\Models\Destinatario;
use App\Http\Requests\StoreDestinatarioRequest;
use App\Http\Requests\UpdateDestinatarioRequest;

class DestinatarioController extends Controller
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
     * @param  \App\Http\Requests\StoreDestinatarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDestinatarioRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Destinatario  $destinatario
     * @return \Illuminate\Http\Response
     */
    public function show(Destinatario $destinatario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Destinatario  $destinatario
     * @return \Illuminate\Http\Response
     */
    public function edit(Destinatario $destinatario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDestinatarioRequest  $request
     * @param  \App\Models\Destinatario  $destinatario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDestinatarioRequest $request, Destinatario $destinatario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Destinatario  $destinatario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destinatario $destinatario)
    {
        //
    }
}
