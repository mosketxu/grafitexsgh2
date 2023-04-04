<?php

namespace App\Http\Controllers;

use App\Models\{Area, Store,Elemento, StoreElemento,Ubicacion,Mobiliario,Propxelemento,Carteleria, Furniture, Medida,Material, Segmento, Storeconcept};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Eloquent\Builder;

class StoreElementosController extends Controller
{
    public function __construct(){
        $this->middleware('can:storeelementos.index')->only('elementos');
        $this->middleware('can:storeelementos.edit')->only('store','edit');
        $this->middleware('can:storeelementos.delete')->only('destroy');
    }

    public function elementos($storeId, Request $request){

        $ubi=$request->ubi;
        $mobi=$request->mobi;
        $prop=$request->prop;
        $car=$request->car;
        $med=$request->med;
        $mat=$request->mat;

        $areas=Area::orderBy('area')->get();
        $ubicaciones=Ubicacion::orderBy('ubicacion')->get();
        $mobiliarios=Mobiliario::orderBy('mobiliario')->get();
        $props=Propxelemento::orderBy('propxelemento')->get();
        $cartelerias=Carteleria::orderBy('carteleria')->get();
        $medidas=Medida::orderBy('medida')->get();
        $materiales=Material::orderBy('material')->get();
        $store=Store::find($storeId);

        $storeelementos=StoreElemento::with('store','elemento')
        ->when(!empty($ubi),function($query) use($ubi){$query->whereHas('elemento',function($query) use($ubi){return $query->where('ubicacion','=',$ubi);});})
        ->when(!empty($mobi),function($query) use($mobi){$query->whereHas('elemento',function($query) use($mobi){return $query->where('mobiliario','=',$mobi);});})
        ->when(!empty($car),function($query) use($car){$query->whereHas('elemento',function($query) use($car){return $query->where('carteleria','=',$car);});})
        ->when(!empty($prop),function($query) use($prop){$query->whereHas('elemento',function($query) use($prop){return $query->where('propxelemento','=',$prop);});})
        ->when(!empty($med),function($query) use($med){$query->whereHas('elemento',function($query) use($med){return $query->where('medida','=',$med);});})
        ->when(!empty($mat),function($query) use($mat){$query->whereHas('elemento',function($query) use($mat){return $query->where('material','=',$mat);});})
        ->where('store_id',$storeId)
        ->get();

        $elementosdisponibles=Elemento::query()
            ->whereNotIn('id',$storeelementos->pluck('elemento_id'))
            ->when(!empty($ubi),function($query) use($ubi){return $query->where('ubicacion','=',$ubi);})
            ->when(!empty($mobi),function($query) use($mobi){return $query->where('mobiliario','=',$mobi);})
            ->when(!empty($car),function($query) use($car){return $query->where('carteleria','=',$car);})
            ->when(!empty($prop),function($query) use($prop){return $query->where('propxelemento','=',$prop);})
            ->when(!empty($med),function($query) use($med){return $query->where('medida','=',$med);})
            ->when(!empty($mat),function($query) use($mat){return $query->where('material','=',$mat);})
            ->get();

        return view('stores.storeelementos.index',compact('ubicaciones','mobiliarios','props','cartelerias','medidas','materiales',
            'store','storeelementos','ubi','mobi','prop','car','med','mat',
            'elementosdisponibles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'elemento_id'=>'required'
        ]);

        $elemento=Elemento::find($request->elemento_id);
        DB::table('store_elementos')
            ->insert([
            'store_id'=>$request->store_id,
            'elemento_id'=>$request->elemento_id,
            'elementificador'=>$elemento->elementificador,
            ]);

        $notification = array(
            'message' => 'Elemento añadido satisfactoriamente a la store!',
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
    public function edit($storeId, Request $request){
        $store=Store::find($storeId);

        $ubi=$request->ubi;
        $mobi=$request->mobi;
        $prop=$request->prop;
        $car=$request->car;
        $med=$request->med;
        $mat=$request->mat;

        $areas=Area::orderBy('area')->get();
        $ubicaciones=Ubicacion::orderBy('ubicacion')->get();
        $mobiliarios=Mobiliario::orderBy('mobiliario')->get();
        $props=Propxelemento::orderBy('propxelemento')->get();
        $cartelerias=Carteleria::orderBy('carteleria')->get();
        $medidas=Medida::orderBy('medida')->get();
        $materiales=Material::orderBy('material')->get();

        $elementosDisp = Elemento::whereNotIn('id', function ($query) use ($storeId) {
            $query->select('elemento_id')->from('store_elementos')->where('store_id', '=', $storeId);
            })
            ->when(!empty($ubi),function($query) use($ubi){return $query->where('ubicacion','=',$ubi);})
            ->when(!empty($mobi),function($query) use($mobi){return $query->where('mobiliario','=',$mobi);})
            ->when(!empty($car),function($query) use($car){return $query->where('carteleria','=',$car);})
            ->when(!empty($prop),function($query) use($prop){return $query->where('propxelemento','=',$prop);})
            ->when(!empty($med),function($query) use($med){return $query->where('medida','=',$med);})
            ->when(!empty($mat),function($query) use($mat){return $query->where('material','=',$mat);})
            ->paginate(10);

        return view('stores.storeelementos.edit',compact('store','elementosDisp',
            'ubi','prop','car','med','mat',
        'areas','ubicaciones','mobiliarios','props','cartelerias','medidas','materiales'));
    }

    public function addtostore(Elemento $elemento,Store $store){
        StoreElemento::create([
            'store_id'=>$store->id,
            'elemento_id'=>$elemento->id,
            'elementificador'=>$elemento->elementificador,
        ]);

        $notification = array(
            'message' => 'Producto añadido satisfactoriamente!',
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
    public function destroy($store_id,$elemento_id, Request $request){
        $s=StoreElemento::where('store_id',$store_id)
        ->where('elemento_id',$elemento_id)
        ->first();
        try{
            $s->delete();
        }catch(\ErrorException $ex){
            return back()->withError($ex->getMessage());
        }

        $notification = array(
            'message' => 'Elemento eliminado satisfactoriamente!',
            'alert-type' => 'success'
        );

        // if($request->ajax()){
        //     return response()->json([
        //         'id'=>$id,
        //         'notificacion'=>$notification,
        //     ]);
        // }
        return redirect()->back()->with($notification);

    }
}
