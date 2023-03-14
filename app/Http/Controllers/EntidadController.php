<?php

namespace App\Http\Controllers;

use App\Models\Entidad;
use Illuminate\Support\Facades\Auth;

class EntidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:entidad.index')->only('index','show');
        $this->middleware('can:entidad.edit')->only('show','edit','update','create');
    }

    public function index()
    {
        return view('entidad.index');
    }

    public function create(){
        return view('entidad.create');
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        if(Auth::user()->can('entidad.edit'))
            $entidad=Entidad::find($id);
            return view('entidad.edit',compact('entidad'));
    }

    public function edit(Entidad $entidad)
    {
        return view('entidad.edit',compact('entidad'));
    }

    public function contactos(Entidad $entidad)
    {
        return view('entidad.contactos',compact('entidad'));
    }


    public function createcontacto($contactoId)
    {
        $contacto=Entidad::find($contactoId);
        return view('entidad.createcontacto',compact('contacto'));
    }


}
