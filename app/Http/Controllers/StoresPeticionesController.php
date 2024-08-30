<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Carteleria;
use App\Models\Material;
use App\Models\Medida;
use App\Models\Mobiliario;
use App\Models\Propxelemento;
use App\Models\Store;
use App\Models\StoreElemento;
use App\Models\Ubicacion;
use Illuminate\Http\Request;

class StoresPeticionesController extends Controller
{

    public function __construct(){
        $this->middleware('can:stores.index')->only('index');
        $this->middleware('can:stores.edit')->only('editar');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('storespeticiones.index');

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }



}
