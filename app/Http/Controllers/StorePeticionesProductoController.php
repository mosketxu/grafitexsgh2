<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Carteleria;
use App\Models\Material;
use App\Models\Medida;
use App\Models\Mobiliario;
use App\Models\Producto;
use App\Models\ProductoCategoria;
use App\Models\Propxelemento;
use App\Models\Store;
use App\Models\StorePeticionesProducto;
use App\Models\TiendaTipo;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class StorePeticionesProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStorePeticionesProductoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StorePeticionesProducto  $storePeticionesProducto
     * @return \Illuminate\Http\Response
     */
    public function show(StorePeticionesProducto $storePeticionesProducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StorePeticionesProducto  $storePeticionesProducto
     * @return \Illuminate\Http\Response
     */
    public function edit(StorePeticionesProducto $storePeticionesProducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStorePeticionesProductoRequest  $request
     * @param  \App\Models\StorePeticionesProducto  $storePeticionesProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StorePeticionesProducto $storePeticionesProducto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StorePeticionesProducto  $storePeticionesProducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(StorePeticionesProducto $storePeticionesProducto)
    {
        //
    }

    public function productos(Store $store){
        return view('storespeticiones.productos',compact(['store']));

    }
}
