<?php

namespace App\Http\Controllers;

use App\Models\{Elemento,Ubicacion,Mobiliario,Propxelemento,Carteleria,Medida,Material, Tarifa};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ElementoController extends Controller{

    public function __construct()
    {
        $this->middleware('can:elemento.index')->only('index','control');
        $this->middleware('can:elemento.edit')->only('edit','update');
        $this->middleware('can:elemento.delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $ubi=$request->ubi;
        $mobi=$request->mobi;
        $prop=$request->prop;
        $car=$request->car;
        $med=$request->med;
        $mat=$request->mat;

        $elementos=Elemento::query()
        ->when(!empty($ubi),function($query) use($ubi){return $query->where('ubicacion','=',$ubi);})
        ->when(!empty($mobi),function($query) use($mobi){return $query->where('mobiliario','=',$mobi);})
        ->when(!empty($car),function($query) use($car){return $query->where('carteleria','=',$car);})
        ->when(!empty($prop),function($query) use($prop){return $query->where('propxelemento','=',$prop);})
        ->when(!empty($med),function($query) use($med){return $query->where('medida','=',$med);})
        ->when(!empty($mat),function($query) use($mat){return $query->where('material','=',$mat);})
        ->orderBy('elementificador')
        ->paginate(15);

        $ubicaciones=Ubicacion::orderBy('ubicacion')->get();
        $mobiliarios=Mobiliario::orderBy('mobiliario')->get();
        $props=Propxelemento::orderBy('propxelemento')->get();
        $cartelerias=Carteleria::orderBy('carteleria')->get();
        $medidas=Medida::orderBy('medida')->get();
        $familias=Tarifa::orderBy('familia')->get();
        $materiales=Material::orderBy('material')->get();
        return view('elementos.index',compact('elementos',
            'ubicaciones','mobiliarios','props','cartelerias','medidas','familias','materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'ubicacion_id'=>'required',
            'mobiliario_id'=>'required',
            'propxelemento_id'=>'required',
            'carteleria_id'=>'required',
            'medida_id'=>'required',
            'material_id'=>'required',
            'familia_id'=>'required',
            'unitxprop'=>'required|numeric',
        ]);

        $u=Ubicacion::find($request->ubicacion_id)->ubicacion;
        $m=Mobiliario::find($request->mobiliario_id)->mobiliario;
        $p=Propxelemento::find($request->propxelemento_id)->propxelemento;
        $c=Carteleria::find($request->carteleria_id)->carteleria;
        $me=Medida::find($request->medida_id)->medida;
        $ma=Material::find($request->material_id)->material;
        $uxp=$request->unitxprop;
        $e=Elemento::elementificador($u,$m,$p,$c,$me,$ma,$uxp);
        $matmed=Elemento::matmed($ma,$me);
        $controlElementificador=Elemento::where('elementificador',$e)->count();

        if ($controlElementificador>0){
            $notification = array(
                'message' => 'Este Elemento ya existe.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($notification);
        }

        DB::table('elementos')->insert([
            'elementificador'=>$e,
            'ubicacion_id'=>$request->ubicacion_id,
            'ubicacion'=>$u,
            'mobiliario_id'=>$request->mobiliario_id,
            'mobiliario'=>$m,
            'propxelemento_id'=>$request->propxelemento_id,
            'propxelemento'=>$p,
            'carteleria_id'=>$request->carteleria_id,
            'carteleria'=>$c,
            'medida_id'=>$request->medida_id,
            'medida'=>$me,
            'material_id'=>$request->material_id,
            'material'=>$ma,
            'matmed'=>$matmed,
            'matmed'=>$matmed,
            'unitxprop'=>$request->unitxprop,
            'observaciones'=>$request->observaciones,
            'familia_id'=>$request->familia_id,
            ]
        );

        $notification = array(
            'message' => 'Elemento creado satisfactoriamente!',
            'alert-type' => 'success'
        );
        return redirect('elemento')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $elemento=Elemento::find($id);
        $ubicaciones=Ubicacion::orderBy('ubicacion')->get();
        $mobiliarios=Mobiliario::orderBy('mobiliario')->get();
        $props=Propxelemento::orderBy('propxelemento')->get();
        $cartelerias=Carteleria::orderBy('carteleria')->get();
        $medidas=Medida::orderBy('medida')->get();
        $materiales=Material::orderBy('material')->get();
        $tarifas=Tarifa::orderBy('familia')->get();

        return view('elementos.edit',compact('elemento','ubicaciones','tarifas','mobiliarios','props','cartelerias','medidas','materiales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $elementoOld=Elemento::find($id);

        $request->validate([
            'ubicacion_id'=>'required',
            'mobiliario_id'=>'required',
            'propxelemento_id'=>'required',
            'carteleria_id'=>'required',
            'medida_id'=>'required',
            'material_id'=>'required',
            'familia_id'=>'required',
            'unitxprop'=>'required|numeric',
        ]);

        $u=Ubicacion::find($request->ubicacion_id)->ubicacion;
        $m=Mobiliario::find($request->mobiliario_id)->mobiliario;
        $p=Propxelemento::find($request->propxelemento_id)->propxelemento;
        $c=Carteleria::find($request->carteleria_id)->carteleria;
        $me=Medida::find($request->medida_id)->medida;
        $ma=Material::find($request->material_id)->material;
        $uxp=$request->unitxprop;
        $e=Elemento::elementificador($u, $m, $p, $c, $me, $ma, $uxp);
        $matmed=Elemento::matmed($ma, $me);

            if ($e!=$elementoOld->elementificador) {
                $controlElementificador=Elemento::where('elementificador', $e)->count();
                if ($controlElementificador>0) {
                    $notification = array(
                        'message' => 'Este Elemento ya existe.',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->withErrors($notification);
                }
            }

        DB::table('elementos')
            ->where('id',$id)
            ->update([
                'elementificador'=>$e,
                'ubicacion_id'=>$request->ubicacion_id,
                'ubicacion'=>$u,
                'mobiliario_id'=>$request->mobiliario_id,
                'mobiliario'=>$m,
                'propxelemento_id'=>$request->propxelemento_id,
                'propxelemento'=>$p,
                'carteleria_id'=>$request->carteleria_id,
                'carteleria'=>$c,
                'medida_id'=>$request->medida_id,
                'medida'=>$me,
                'material_id'=>$request->material_id,
                'material'=>$ma,
                'matmed'=>$matmed,
                'matmed'=>$matmed,
                'unitxprop'=>$request->unitxprop,
                'observaciones'=>$request->observaciones,
                'familia_id'=>$request->familia_id,
            ]
        );

        $notification = array(
            'message' => 'Elemento Actualizado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->route('elemento.edit',$id)->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request){
        Elemento::destroy($id);;

        $notification = array(
            'message' => 'Elemento eliminado satisfactoriamente!',
            'alert-type' => 'success'
        );

        if($request->ajax()){
            return response()->json([
                'id'=>$id,
                'notificacion'=>$notification,
            ]);
        }
    }
}
