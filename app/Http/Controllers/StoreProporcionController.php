<?php

namespace App\Http\Controllers;

use App\Models\MontajeProporcion;
use App\Models\Store;
use App\Models\StoreProporcion;
use Illuminate\Http\Request;

class StoreProporcionController extends Controller
{

    public function __construct(){
        $this->middleware('can:storeproporcion.index')->only('proporciones');
        $this->middleware('can:storeproporcion.edit')->only('store','edit');
        $this->middleware('can:storeproporcion.delete')->only('destroy');
    }

    public function proporciones($storeId, Request $request){


        $propor=$request->propor;

        $proporciones=MontajeProporcion::orderBy('montajeproporcion')->get();
        $store=Store::find($storeId);

        $storeproporciones=StoreProporcion::with('store','proporcion')
        ->when(!empty($propor),function($query) use($propor){$query->whereHas('proporcion',function($query) use($propor){return $query->where('proporcion','=',$propor);});})
        ->where('store_id',$storeId)
        ->get();

        $proporcionesdisponibles=MontajeProporcion::query()
            // ->whereNotIn('id',$storeproporciones->pluck('proporcion_id'))
            ->when(!empty($propor),function($query) use($propor){return $query->where('montajeproporcion','=',$propor);})
            ->get();

        return view('stores.storeproporciones.index',compact('proporciones','store','storeproporciones','propor','proporcionesdisponibles'));
    }
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'proporcion_id'=>'required'
        ]);

        $proporcion=MontajeProporcion::find($request->proporcion_id);
        DB::table('store_proporciones')
            ->insert([
            'store_id'=>$request->store_id,
            'proporcion_id'=>$request->proporcion_id,
            ]);

        $notification = array(
            'message' => 'Proporcion añadida satisfactoriamente a la store!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Storeproporcion  $storeproporcion
     * @return \Illuminate\Http\Response
     */
    public function show(Storeproporcion $storeproporcion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($storeId, Request $request){
        $store=Store::find($storeId);

        $propor=$request->propor;
        $proporciones=MontajeProporcion::orderBy('proporcion')->get();

        $proporcionesDisp = MontajeProporcion::whereNotIn('id', function ($query) use ($storeId) {
            $query->select('proporcion_id')->from('store_proporciones')->where('store_id', '=', $storeId);
            })
            ->when(!empty($propor),function($query) use($propor){return $query->where('proporcion','=',$propor);})
            ->paginate(10);

        return view('stores.storeproporciones.edit',compact('store','proporcionesDisp','propor','proporciones',));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Storeproporcion  $storeproporcion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Storeproporcion $storeproporcion)
    {
        //
    }

    public function addtostore(MontajeProporcion $proporcion,Store $store){

        Storeproporcion::create([
            'store_id'=>$store->id,
            'proporcion_id'=>$proporcion->id,
        ]);

        $notification = array(
            'message' => 'proporcion añadido satisfactoriamente!',
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
    public function destroy($store_id,$proporcion_id, Request $request){
        $s=Storeproporcion::where('store_id',$store_id)
        ->where('proporcion_id',$proporcion_id)
        ->first();
        try{
            $s->delete();
        }catch(\ErrorException $ex){
            return back()->withError($ex->getMessage());
        }

        $notification = array(
            'message' => 'Proporcion eliminada satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
