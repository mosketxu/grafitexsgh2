<?php

namespace App\Http\Controllers;

use App\Models\StoreEscaparate;
use App\Http\Requests\StoreStoreEscaparateRequest;
use App\Http\Requests\UpdateStoreEscaparateRequest;
use App\Models\Escaparate;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreEscaparateController extends Controller
{
    public function __construct(){
        $this->middleware('can:storeescaparate.index')->only('escaparates');
        $this->middleware('can:storeescaparate.edit')->only('store','edit');
        $this->middleware('can:storeescaparate.delete')->only('destroy');
    }

    public function escaparates($storeId, Request $request){


        $escap=$request->escap;

        $escaparates=Escaparate::orderBy('escaparate')->get();
        $store=Store::find($storeId);

        $storeescaparates=StoreEscaparate::with('store','escaparate')
        ->when(!empty($escap),function($query) use($escap){$query->whereHas('escaparate',function($query) use($escap){return $query->where('escaparate','=',$escap);});})
        ->where('store_id',$storeId)
        ->get();

        $escaparatesdisponibles=Escaparate::query()
            // ->whereNotIn('id',$storeescaparates->pluck('escaparate_id'))
            ->when(!empty($escap),function($query) use($escap){return $query->where('escaparate','=',$escap);})
            ->get();

        return view('stores.storeescaparates.index',compact('escaparates','store','storeescaparates','escap','escaparatesdisponibles'));
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
            'escaparate_id'=>'required'
        ]);

        $escaparate=Escaparate::find($request->escaparate_id);
        DB::table('store_escaparates')
            ->insert([
            'store_id'=>$request->store_id,
            'escaparate_id'=>$request->escaparate_id,
            ]);

        $notification = array(
            'message' => 'Escaparate añadido satisfactoriamente a la store!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StoreEscaparate  $storeEscaparate
     * @return \Illuminate\Http\Response
     */
    public function show(StoreEscaparate $storeEscaparate)
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

        $escap=$request->escap;
        $escaparates=Escaparate::orderBy('escaparate')->get();

        $escaparatesDisp = Escaparate::whereNotIn('id', function ($query) use ($storeId) {
            $query->select('escaparate_id')->from('store_escaparates')->where('store_id', '=', $storeId);
            })
            ->when(!empty($escap),function($query) use($escap){return $query->where('escaparate','=',$escap);})
            ->paginate(10);

        return view('stores.storeescaparates.edit',compact('store','escaparatesDisp','escap','escaparates',));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\StoreEscaparate  $storeEscaparate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StoreEscaparate $storeEscaparate)
    {
        //
    }

    public function addtostore(Escaparate $escaparate,Store $store){

        StoreEscaparate::create([
            'store_id'=>$store->id,
            'escaparate_id'=>$escaparate->id,
        ]);

        $notification = array(
            'message' => 'Escaparate añadido satisfactoriamente!',
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
    public function destroy($store_id,$escaparate_id, Request $request){
        $s=StoreEscaparate::where('store_id',$store_id)
        ->where('escaparate_id',$escaparate_id)
        ->first();
        try{
            $s->delete();
        }catch(\ErrorException $ex){
            return back()->withError($ex->getMessage());
        }

        $notification = array(
            'message' => 'Escaparate eliminado satisfactoriamente!',
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
