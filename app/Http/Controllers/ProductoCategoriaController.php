<?php

namespace App\Http\Controllers;

use App\Models\ProductoCategoria;
use App\Http\Requests\StoreProductoCategoriaRequest;
use App\Http\Requests\UpdateProductoCategoriaRequest;

class ProductoCategoriaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:productocategoria.index')->only('index','show');
        $this->middleware('can:productocategoria.edit')->only('create','edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('productocategoria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta="productocategoria";
        return view('productocategoria.create',compact('ruta'));
    }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TiendaTipo  $tiendaTipo
     * @return \Illuminate\Http\Response
     */
    public function editar(ProductoCategoria $productocategoria){
        $ruta='productocategoria';
        return view('productocategoria.edit',compact('productocategoria','ruta'));

    }
    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateProductoCategoriaRequest  $request
    //  * @param  \App\Models\ProductoCategoria  $productoCategoria
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateProductoCategoriaRequest $request, ProductoCategoria $productoCategoria)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\ProductoCategoria  $productoCategoria
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(ProductoCategoria $productoCategoria)
    // {
    //     //
    // }
}