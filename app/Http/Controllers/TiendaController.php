<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Campaigns\CampaignElementos;
use App\Models\{Campaign,CampaignElemento, CampaignStore, CampaignTienda, Store};
// use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TiendaController extends Controller
{

    public function __construct(){
        $this->middleware('can:tiendas.index')->only('index','indexmontador','control');
        $this->middleware('can:tiendas.edit')->only('edit','show','update','destroy','campaginstores');
    }

    public function index(Request $request){
        $busqueda = '';
        if ($request->busca) $busqueda = $request->busca;

        $storeId=(auth()->user()->name);
        $store=Store::find(auth()->user()->name);

        $campaigns=Campaign::search2($request->busca)
            ->whereHas('campstores', function ($query) use($storeId){$query->where('store_id', 'like', $storeId);})
            ->paginate(10);

        return view('tienda.indexrecepcion',compact('campaigns','store','busqueda'));
    }

    public function indexmontador(Request $request, $user){
        dd('montador');
        // $busqueda = '';
        // if ($request->busca) $busqueda = $request->busca;

        // $storeId=(auth()->user()->name);
        // $store=Store::find(auth()->user()->name);

        // $campaigns=Campaign::search2($request->busca)
        //     ->whereHas('campstores', function ($query) use($storeId){$query->where('store_id', 'like', $storeId);})
        //     ->paginate(10);

        // return view('tienda.indexrecepcion',compact('campaigns','store','busqueda'));
    }

    public function editrecepcion($camp,$sto, Request $request){
        $busqueda = '';
        if ($request->busca) $busqueda = $request->busca;

        $campaign = Campaign::find($camp);
        $store=Store::find($sto);

        $elementos= CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
        ->where('campaign_id',$camp)
        ->where('campaign_elementos.store_id',$sto)
        ->select('campaign_elementos.id as id','estadorecepcion')
        ->get();

        $total=$elementos->count();
        $sinvalorar=$elementos->where('estadorecepcion','0')->count();
        $incidencias=$elementos->where('estadorecepcion','>','1')->count();
        $correctos=$elementos->where('estadorecepcion','1')->count();

        $elementos= CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
        ->search2($request->busca)
        ->where('campaign_id',$camp)
        ->where('campaign_elementos.store_id',$sto)
        ->select('campaign_elementos.id as id','campaign_elementos.store_id as store_id','ubicacion','mobiliario','propxelemento','carteleria','medida',
            'material','familia','unitxprop','imagen','observaciones','estadorecepcion','obsrecepcion')
        ->paginate(8);

        return view('tienda.indexeditrecepcion', compact('campaign','store','elementos','busqueda','total','incidencias','correctos','sinvalorar'));
    }

    public function show($camp,$sto,Request $request){
        $busqueda = '';
        if ($request->busqueda) $busqueda = $request->busqueda;

        $campaign = Campaign::find($camp);
        $store=Store::find($sto);
        dd($camp ,$sto);
        $elementos= CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
        ->where('campaign_id',$camp)
        ->where('campaign_elementos.store_id',$sto)
        ->select('campaign_elementos.id as id','estadorecepcion')
        ->get();

        $total=$elementos->count();
        $sinvalorar=$elementos->where('estadorecepcion','0')->count();
        $incidencias=$elementos->where('estadorecepcion','>','1')->count();
        $correctos=$elementos->where('estadorecepcion','1')->count();

        $elementos= CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
            ->OK($busqueda)
            ->where('campaign_id',$camp)
            ->select('campaign_elementos.id as id','campaign_elementos.store_id as store_id','ubicacion','mobiliario','propxelemento','carteleria','medida',
                'material','familia','unitxprop','imagen','observaciones','OK','KO','estadorecepcion','obsrecepcion')
            ->paginate(10);

        return view('tienda.indexcampaignelementos', compact('campaign','store','elementos','busqueda','total','incidencias','correctos','sinvalorar'));
    }

    public function control(Request $request){
        $busqueda='';
        $ok='';
        $ko='';
        if ($request->busca) $busqueda = $request->busca;
        if ($request->ok) $ok= $request->ok=='1' ? '0' : '1';
        if ($request->ko) $ko= $request->ko=='1' ? '0' : '1';

        $campaigns=CampaignTienda::with('campaign')
        ->groupBy('campaign_id')
        ->paginate(10);

        $campaigns=CampaignTienda::with('campaign')
        ->with('elementos' ,function($query) {
            $query->where('KO', '1');
        })
        ->groupBy('campaign_id')
        ->paginate(10);

        // $posts = App\Post::whereHas('comments', function (Builder $query) {
        //     $query->where('content', 'like', 'foo%');
        // })->get();

        $campaigns=CampaignTienda::with('campaign')
        ->when($ok!='',function ($q){
            $q->whereHas('elementos', function ($query) {$query->where('OK', '1');});
        })
        ->when($ko!='',function ($q){
            $q->whereHas('elementos', function ($query) {$query->where('KO', '1');});
        })
        // ->whereHas('elementos',function($query){
        //     $query->where('OK','1');
        // })
        ->groupBy('campaign_id')
        ->paginate(10);


        // dd($campaigns);
        // dd($campaigns);

        // $users = User::with('products' => function($query) {
        //     $query->where('isGlobal', 1);
        // })->get();

        // $campaigns=CampaignTienda::search2($busqueda)
        // ->with('campaign')
        // ->with('tienda')
        // ->join('campaign_elementos','campaign_tiendas.store_id','campaign_elementos.store_id')
        // ->select('campaign_name','campaign_id',DB::raw('count(*) as total'),DB::raw('count(OK) as OK'),DB::raw('count(KO) as KO'))
        // ->when($ok!='', function ($query) use($ok){
        //     $query->whereHas('elementos', function ($query) use($ok){$query->where('OK', $ok);});
        //     })
        // ->when($ko!='', function ($query){
        //     $query->where('KO','>','0');
        //     })
        // ->groupBy('campaign_id')
        // ->paginate(10);

        return view('tienda.index',compact('campaigns','busqueda','ok','ko'));
    }

    public function controlstores($campaignId){

        $campaign=Campaign::find($campaignId);

        $stores=CampaignTienda::with('campaign')
        ->where('campaign_id',$campaignId)
        ->paginate(10);

        return view('tienda.indexcontroltienda',compact('campaign','stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $rules=[
            'estadorecepcion'=>'required|integer|min:1',
        ];
        $messages = [
            'estadorecepcion.min' => 'Debes seleccionar una opción de Estado de recepción',
        ];
        $this->validate($request, $rules, $messages);

        CampaignStore::join('campaign_elementos','campaign_elementos.store_id','campaign_stores.store_id')
            ->where('campaign_stores.campaign_id',$request->campaignId)
            ->where('campaign_elementos.id',$request->elementoId)
            ->update([
                'estadorecepcion'=>$request->estadorecepcion,
                'OK'=>$request->estadorecepcion==1 ? '1' : null,
                'KO'=>$request->estadorecepcion>1 ? '1' : null,
                'obsrecepcion'=>$request->obsrecepcion,
                'updated_by'=>auth()->user()->id,
                'fecharecepcion'=>now(),
            ]
            );

            $notification = array(
            'message' => 'Elemento actualizado satisfactoriamente!',
            'alert-type' => 'success',
        );
        return redirect()->route('tienda.editrecepcion',[$request->campaignId,$request->storeId])->with($notification);

    }
}
