<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\CampaignTienda;
use App\Models\Entidad;
use Illuminate\Http\Request;

class MontadorController extends Controller
{

    public function __construct(){
        $this->middleware('can:montador.index')->only('index');
        // $this->middleware('can:montador.edit')->only();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $busqueda = '';
        if ($request->busca) $busqueda = $request->busca;

        $montador=Entidad::where('user_id',Auth()->user()->id)->first();
        $tiendas=CampaignTienda::where('montador_id',$montador->id)->get();

        dd($tiendas);


        $campaigns=Campaign::search2($request->busca)
            ->whereHas('campstores', function ($query) use($storeId){$query->where('store_id', 'like', $storeId);})
            ->paginate(10);

        return view('tienda.indexrecepcion',compact('campaigns','store','busqueda'));
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

    public function updatefechasmontador(Request $request,CampaignTienda $camptienda){

        // dd($request);
        $request->validate([
            'fechamontador1'=>'required',
            'fechamontador2'=>'nullable|date',
            'fechamontador3'=>'nullable|date',
        ]);

        $camptienda->update([
            'fechamontador1'=>$request->fechamontador1,
            'fechamontador2'=>$request->fechamontador2,
            'fechamontador3'=>$request->fechamontador3,
            ]
        );
        return redirect()->route('plan.edit',$camptienda)->with('message','Datos actualizadas ');
    }


    public function updatemontadortienda(Request $request,CampaignTienda $camptienda){
        $camptienda->update(['montador_id' => $request->montador_id,]);
        return redirect()->route('plan.edit',$camptienda)->with('message','Datos actualizadas ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
