<?php

namespace App\Http\Controllers;

use App\Models\Peticion;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \PDF;
use Maatwebsite\Excel\Facades\Excel;


class PeticionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:peticion.index')->only('index');;
        $this->middleware('can:peticion.edit')->only('nuevo','editar','update','delete');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        return view('peticion.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $ruta="peticiones";
        return view('peticion.create',compact('ruta'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeticionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

    public function editar(Peticion $peticion)
    {
        $ruta='peticion';
        return view('peticion.edit',compact('peticion','ruta'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeticionRequest  $request
     * @param  \App\Models\Peticion  $peticion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peticion $peticion)
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
