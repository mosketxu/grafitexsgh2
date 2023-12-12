<?php

namespace App\Http\Controllers;

use App\Models\MontajeMaterial;

use Illuminate\Http\Request;

class MontajeMaterialController extends Controller
{
    public function __construct(){
        $this->middleware('can:montajematerial.index')->only('index','show');
        $this->middleware('can:montajematerial.edit')->only('create','edit');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('montajematerial.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta="montajematerial";
        return view('montajematerial.create',compact('ruta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Montajematerial  $montajematerial
     * @return \Illuminate\Http\Response
     */
    public function show(Montajematerial $montajematerial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Montajematerial  $montajematerial
     * @return \Illuminate\Http\Response
     */

    public function editar(Montajematerial $tiendatipo){
        $ruta='montajematerial';
        return view('montajematerial.edit',compact('montajematerial','ruta'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Montajematerial  $montajematerial
     * @return \Illuminate\Http\Response
     */
    public function update( $request, Montajematerial $montajematerial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Montajematerial  $montajematerial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Montajematerial $montajematerial)
    {
        //
    }
}
