<?php

namespace App\Http\Controllers;

use App\Models\MontajeProporcion;
use Illuminate\Http\Request;

class MontajeProporcionController extends Controller
{
    public function __construct(){
        $this->middleware('can:montajeproporcion.index')->only('index','show');
        $this->middleware('can:montajeproporcion.edit')->only('create','edit');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('montajeproporcion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta="montajeproporcion";
        return view('montajeproporcion.create',compact('ruta'));
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
     * @param  \App\Models\Montajeproporcion  $montajeproporcion
     * @return \Illuminate\Http\Response
     */
    public function show(Montajeproporcion $montajeproporcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Montajeproporcion  $montajeproporcion
     * @return \Illuminate\Http\Response
     */

    public function editar(Montajeproporcion $montajeproporcion){
        $ruta='montajeproporcion';
        return view('montajeproporcion.edit',compact('montajeproporcion','ruta'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Montajeproporcion  $montajeproporcion
     * @return \Illuminate\Http\Response
     */
    public function update( $request, Montajeproporcion $montajeproporcion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Montajeproporcion  $montajeproporcion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Montajeproporcion $montajeproporcion)
    {
        //
    }
}
