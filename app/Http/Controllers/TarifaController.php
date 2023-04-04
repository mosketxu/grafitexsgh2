<?php

namespace App\Http\Controllers;

use App\Models\Tarifa;
use App\Models\TarifaFamilia;
use Illuminate\Http\Request;

class TarifaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:tarifa.index')->only('index');
        $this->middleware('can:tarifa.edit')->only('edit','store');
        $this->middleware('can:tarifa.update')->only('update','store');
        $this->middleware('can:tarifa.delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    public function index(){
        return view('tarifa.index',);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'familia'=>'required',
            'tramo1'=>'required|numeric',
            // 'tramo2'=>'required|numeric',
            // 'tramo3'=>'required|numeric',
            'tarifa1'=>'required|numeric',
            // 'tarifa2'=>'required|numeric',
            // 'tarifa3'=>'required|numeric',
        ]);

        $tarifa = Tarifa::create($request->all());

        $notification = array(
            'message' => 'Tarifa creada satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $tarifa=Tarifa::find($id);
        return view('tarifa.edit',compact('tarifa'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $t=Tarifa::find($id);

        $tf=TarifaFamilia::where('tarifa_id',$t->id)->count();
        if($tf>0){
            $notification = array(
                'message' => 'Hay familias asociadas a esta tarifa. No se puede eliminer',
                'alert-type' => 'alarm'
            );
            return redirect()->back()->with($notification);
        }

        $t->delete();

        $notification = array(
            'message' => 'Tarifa eliminada satisfactoriamente!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
