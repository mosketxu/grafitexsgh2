<?php

namespace App\Http\Controllers;

use App\Models\Entidad;

class EntidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:entidad.index')->only('index');
        $this->middleware('can:entidad.edit')->only('edit','update','create');
    }

    public function index()
    {
        return view('entidad.index');
    }

    public function create(){
        return view('entidad.create');
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
