<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Http\Requests\StoreMarcaRequest;
use App\Http\Requests\UpdateMarcaRequest;

class MarcaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:marcas.index')->only('index','show');
        $this->middleware('can:marcas.edit')->only('create','edit');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('marca.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $ruta="marca";
        return view('marca.create',compact('ruta'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function editar(Marca $marca){
        $ruta='marca';
        return view('marca.edit',compact('marca','ruta'));

    }
}
