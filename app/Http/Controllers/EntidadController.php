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

    public function index(){
        $montador='1';
        return view('entidad.index',compact('montador'));
    }

    public function create(){return view('entidad.create');
    }

    public function show($id){
        if(Auth::user()->can('entidad.edit'))
            $entidad=Entidad::find($id);
            return view('entidad.edit',compact('entidad'));
    }

    public function edit(Entidad $entidad){
        $ruta="entidad";
        return view('entidad.edit',compact('entidad','ruta'));
    }

    public function editcontacto(Entidad $entidad,$ruta){
        // La ruta es el id del contacto origen
        return view('entidad.edit',compact('entidad','ruta'));
    }

    public function contactos(Entidad $entidad){
        return view('entidad.contactos',compact('entidad'));
    }

    public function createcontacto($contactoId){
        $contacto=Entidad::find($contactoId);

        return view('entidad.createcontacto',compact('contacto'));
    }

}
