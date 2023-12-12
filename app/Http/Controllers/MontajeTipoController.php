<?php

namespace App\Http\Controllers;

use App\Models\MontajeTipo;

class MontajeTipoController extends Controller
{

    public function __construct(){
        $this->middleware('can:montajetipo.index')->only('index','show');
        $this->middleware('can:montajetipo.edit')->only('create','edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('montajetipo.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta="montajetipo";
        return view('montajetipo.create',compact('ruta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMontajeTipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMontajeTipoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MontajeTipo  $montajeTipo
     * @return \Illuminate\Http\Response
     */
    public function show(MontajeTipo $montajeTipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MontajeTipo  $montajeTipo
     * @return \Illuminate\Http\Response
     */

    public function editar(MontajeTipo $tiendatipo){
        $ruta='montajetipo';
        return view('montajetipo.edit',compact('montajetipo','ruta'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMontajeTipoRequest  $request
     * @param  \App\Models\MontajeTipo  $montajeTipo
     * @return \Illuminate\Http\Response
     */
    public function update( $request, MontajeTipo $montajeTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MontajeTipo  $montajeTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(MontajeTipo $montajeTipo)
    {
        //
    }
}
