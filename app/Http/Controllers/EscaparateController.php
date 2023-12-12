<?php

namespace App\Http\Controllers;

use App\Models\Escaparate;
use Illuminate\Support\Facades\Request;

class EscaparateController extends Controller
{
    public function __construct(){
        $this->middleware('can:escaparate.index')->only('index','show');
        $this->middleware('can:escaparate.edit')->only('create','edit');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('escaparate.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta="escaparate";
        return view('escaparate.create',compact('ruta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escaparate  $escaparate
     * @return \Illuminate\Http\Response
     */
    public function show(Escaparate $escaparate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escaparate  $escaparate
     * @return \Illuminate\Http\Response
     */

    public function editar(Escaparate $escaparate){
        $ruta='escaparate';
        return view('escaparate.edit',compact('escaparate','ruta'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Escaparate  $escaparate
     * @return \Illuminate\Http\Response
     */
    public function update( $request, Escaparate $escaparate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escaparate  $escaparate
     * @return \Illuminate\Http\Response
     */
    public function destroy(escaparate $escaparate)
    {
        //
    }
}
