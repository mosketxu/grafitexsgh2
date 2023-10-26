<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{

    public function __construct()
    {
        // $this->middleware('can:producto.index')->only('index','show');
        // $this->middleware('can:producto.edit')->only('show','edit','update','create');
    }

    public function index(){
        return view('producto.index');
    }

    public function create(){
        $ruta="productos";
        return view('producto.create',compact('ruta'));
    }

    public function show($id){
        dd('show');
        $ruta='producto';
        if(Auth::user()->can('producto.edit')) $producto=producto::find($id);
        return view('producto.edit',compact('producto','ruta'));
    }

    public function editar(Producto $producto){
        $ruta='producto';
        return view('producto.edit',compact('producto','ruta'));
    }

}
