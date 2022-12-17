<?php

namespace App\Http\Controllers;

use App\Models\{Store,Elemento, StoreElemento,Ubicacion,Mobiliario,Propxelemento,Carteleria,Medida,Material};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use phpDocumentor\Reflection\Element;

class StoreElementosController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:storeelementos.index')->only('index');
        $this->middleware('can:storeelementos.edit')->only('store','edit','destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($storeId, Request $request){
        if ($request->busca) {
            $busqueda = $request->busca;
        } else {
            $busqueda = '';
        }

        $store=Store::find($storeId);
        $storeelementos=StoreElemento::search($request->busca)
        ->join('stores','store_elementos.store_id','stores.id')
        ->join('elementos','store_elementos.elemento_id','elementos.id')
        ->where('store_elementos.store_id',$storeId)
        ->paginate('10')->onEachSide(1);

        return view('stores.storeelementos.index',compact('store','busqueda','storeelementos','totalElementos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$store_id){
        $request->validate([
            'elemento_id'=>'required'
        ]);

        $elemento=Elemento::find($request->elemento_id);

        DB::table('store_elementos')
            ->insert([
            'store_id'=>$store_id,
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

        $ubi=$request->get('ubi');
        $mob=$request->get('mob');
        $cart=$request->get('cart');
        $mat=$request->get('mat');
        $med=$request->get('med');
        $propx=$request->get('propx');

        $elementosDisp = Elemento::whereNotIn('id', function ($query) use ($storeId) {
            $query->select('elemento_id')->from('store_elementos')->where('store_id', '=', $storeId);
            })
        ->ubi($request->ubi)
        ->mob($request->mob)
        ->cart($request->cart)
        ->mat($request->mat)
        ->med($request->med)
        ->propx($request->propx)
        ->paginate(10)
        ->onEachSide(1);

        // dd($totalelementosDisp);

        return view('stores.storeelementos.edit',compact('store','elementosDisp',
            'ubi','mob','propx','cart','med','mat'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($store_id,$elemento_id, Request $request){
        // dd($store_id.'-'.$elemento_id);
        $s=StoreElemento::where('store_id',$store_id)
        ->where('elemento_id',$elemento_id)
        ->first();
        // dd($s);
        try{
            // StoreElemento::destroy($s->id);
            $s->delete();
        }catch(\ErrorException $ex){
            return back()->withError($ex->getMessage());
        }

        // no funcionan los mensajes ni try catch!

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
        return redirect()->back()->with($notification);

    }
}
