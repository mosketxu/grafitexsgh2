<?php

namespace App\Http\Controllers;

use App\Models\{Tarifa,TarifaFamilia};
use Illuminate\Http\Request;

class TarifaFamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        //separo sin identificar del resto para que esté siempre arriba sin identificar
        $sinidentificar=Tarifa::where('id',1)->first();

        $tarifas=Tarifa::where('tipo',0)
        ->where('id','<>','1')->orderBy('familia')->get();
        return view('tarifa.familia.index', compact('tarifas','sinidentificar'));
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
    public function store(Request $request){


        $request->validate([
            'material'=>'required',
            'medida'=>'required',
            'tarifa_id'=>'required',
        ]);

        $mat=trim($request->material);
        $med=trim($request->medida);
        $matmed=$mat . $med;
        $sust=array(" ","/","-","(",")","á","é","í",'ó','ú',"Á","É","Í",'Ó','Ú');
        $por=array("","","","","","a","e","i",'o','u',"A","E","I",'O','U');
        $matmed=str_replace($sust, $por, $matmed);
        $matmed=strtolower($matmed);

        $existe=TarifaFamilia::where('matmed',$matmed)->first();
        if($existe){
            $notification = array(
                'message' => 'Esta familia ya existe!',
                'alert-type' => 'alert'
            );
            return redirect()->back()->with($notification);
        }

        $tarifafamilia = TarifaFamilia::create([
            'material'=>$mat,
            'medida'=>$med,
            'matmed'=>$matmed,
            'tarifa_id'=>$request->tarifa_id,
            ]
        );

        $notification = array(
            'message' => 'Tarifa creada satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
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
    public function update(Request $request)
    {
        $request->validate([
            'material' => 'required',
            'medida' => 'required',
            'tarifa_id' => 'required',
        ]);

        TarifaFamilia::find($request->id)->update($request->all());

        $notification = array(
            'message' => 'Tarifa actualizada satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TarifaFamilia::find($id)->delete();

        $notification = array(
            'message' => 'Tarifa eliminada satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
