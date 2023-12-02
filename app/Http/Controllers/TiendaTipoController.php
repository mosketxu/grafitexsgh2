<?php

namespace App\Http\Controllers;

use App\Models\TiendaTipo;
use App\Http\Requests\StoreTiendaTipoRequest;
use App\Http\Requests\UpdateTiendaTipoRequest;
use Illuminate\Http\Request;

class TiendaTipoController extends Controller
{

    public function __construct(){
        $this->middleware('can:tiendatipo.index')->only('index','show');
        $this->middleware('can:tiendatipo.edit')->only('create','edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('tiendatipo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta="tiendatiop";
        return view('tiendatipo.create',compact('ruta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTiendaTipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTiendaTipoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TiendaTipo  $tiendaTipo
     * @return \Illuminate\Http\Response
     */
    public function show(TiendaTipo $tiendaTipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TiendaTipo  $tiendaTipo
     * @return \Illuminate\Http\Response
     */
    public function editar(TiendaTipo $tiendatipo){
        $ruta='tiendatipo';
        return view('tiendatipo.edit',compact('tiendatipo','ruta'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTiendaTipoRequest  $request
     * @param  \App\Models\TiendaTipo  $tiendaTipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTiendaTipoRequest $request, TiendaTipo $tiendaTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TiendaTipo  $tiendaTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TiendaTipo $tiendaTipo)
    {
        //
    }
}
