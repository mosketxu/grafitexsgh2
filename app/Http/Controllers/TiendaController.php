<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Campaigns\CampaignElementos;
use App\Models\{Campaign,CampaignElemento, CampaignStore, CampaignTienda, Destinatario, EstadoRecepcion, Store, User};
// use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\MailControlrecepcion2;
use App\Mail\MailDeficiencias;
use Illuminate\Support\Facades\Mail;

class TiendaController extends Controller
{

    public function __construct(){
        $this->middleware('can:tiendas.index')->only('index','indexmontador','control');
        $this->middleware('can:tiendas.edit')->only('edit','show','update','destroy','campaginstores');
    }

    public function index(Request $request){
        $store=Store::find(auth()->user()->name);

        return view('tienda.index',compact('store'));
    }
    public function recepcion(Request $request){
        $busqueda = '';
        if ($request->busca) $busqueda = $request->busca;

        $storeId=(auth()->user()->name);
        $store=Store::find(auth()->user()->name);

        $campaigns=Campaign::search2($request->busca)
            ->whereHas('campstores', function ($query) use($storeId){$query->where('store_id', 'like', $storeId);})
            ->paginate(15);

        $campaigns=CampaignTienda::with('campaign')
            ->search2($request->busca)
            ->where('store_id',$storeId)
            // ->groupBy('campaign_id')
            ->paginate(15);
            // dd($campaigns);

        return view('tienda.indexrecepcion',compact('campaigns','store','busqueda'));
    }

    public function peticion(Request $request){
        dd('peti');
        $busqueda = '';
        if ($request->busca) $busqueda = $request->busca;

        $storeId=(auth()->user()->name);
        $store=Store::find(auth()->user()->name);

        $campaigns=Campaign::search2($request->busca)
            ->whereHas('campstores', function ($query) use($storeId){$query->where('store_id', 'like', $storeId);})
            ->paginate(15);

        $campaigns=CampaignTienda::with('campaign')
            ->search2($request->busca)
            ->where('store_id',$storeId)
            // ->groupBy('campaign_id')
            ->paginate(15);
            // dd($campaigns);

        return view('tienda.indexpeticion',compact('campaigns','store','busqueda'));
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

    public function editrecepcion(Campaign $campaign,Store $store, Request $request){
        $busqueda = '';
        $ok='';
        $ko='';
        $nose='';
        if ($request->busca) $busqueda = $request->busca;
        if ($request->ok) $ok= $request->ok=='1' ? '0' : '1';
        if ($request->ko) $ko= $request->ko=='1' ? '0' : '1';
        if ($request->nose) $nose= $request->nose=='1' ? '0' : '1';


        $elementos= CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
        ->where('campaign_id',$campaign->id)
        ->where('campaign_elementos.store_id',$store->id)
        ->select('campaign_elementos.id as id','estadorecepcion')
        ->get();

        $total=$elementos->count();
        $sinvalorar=$elementos->where('estadorecepcion','0')->count();
        $incidencias=$elementos->where('estadorecepcion','>','1')->count();
        $correctos=$elementos->where('estadorecepcion','1')->count();

        $elementos= CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
        ->search2($request->busca)
        ->where('campaign_id',$campaign->id)
        ->where('campaign_elementos.store_id',$store->id)
        ->when($ko!='',function ($q){$q->where('KO', '1');})
        ->when($ok!='',function ($q){$q->where('OK', '1');})
        // ->when($nose!='',function ($q){$q->where('OK','');})
        ->select('campaign_elementos.id as id','campaign_elementos.store_id as store_id','ubicacion','mobiliario','propxelemento','carteleria','medida',
            'material','familia','unitxprop','imagen','observaciones','estadorecepcion','obsrecepcion','OK','KO')
        ->get();
        // ->paginate(10);
        // dd($elementos);

        $estadosrecep=EstadoRecepcion::get();

        return view('tienda.indexeditrecepcion', compact('campaign','store','elementos','busqueda','total','incidencias','correctos','sinvalorar','estadosrecep','ok','nose','ko'));
    }

    public function show(CampaignTienda $campaigntienda,Request $request){
        $busqueda = '';
        $ok='';
        $ko='';
        $nose='';
        if ($request->busca) $busqueda = $request->busca;
        if ($request->ok) $ok= $request->ok=='1' ? '0' : '1';
        if ($request->ko) $ko= $request->ko=='1' ? '0' : '1';
        if ($request->nose) $nose= $request->nose=='1' ? '0' : '1';


        $campaign = Campaign::find($campaigntienda->campaign_id);
        $store=Store::find($campaigntienda->store_id);
        $elementos= CampaignElemento::with('estadorecep')
        ->where('tienda_id',$campaigntienda->id)
        ->when($ok!='',function ($q){$q->where('OK', '1');})
        ->when($ko!='',function ($q){$q->where('KO', '1');})
        // ->when($nose!='',function ($q){$q->where('KO','<>','1');})
        ->paginate(15);

        $estados=EstadoRecepcion::get();

        return view('tienda.indexcampaignelementos', compact('campaigntienda','campaign','store','elementos','busqueda','ok','ko','estados','nose'));
    }

    public function control(Request $request){
        $busqueda='';
        $ok='';
        $ko='';
        if ($request->busca) $busqueda = $request->busca;
        if ($request->ok) $ok= $request->ok=='1' ? '0' : '1';
        if ($request->ko) $ko= $request->ko=='1' ? '0' : '1';


        $campaigns=CampaignTienda::with('campaign')
        ->when($ok!='',function ($q){
            $q->whereHas('elementos', function ($query) {$query->where('OK', '1');});
        })
        ->when($ko!='',function ($q){
            $q->whereHas('elementos', function ($query) {$query->where('KO', '1');});
        })
        ->groupBy('campaign_id')
        ->paginate(15);



        return view('tienda.indexcontrol',compact('campaigns','busqueda','ok','ko'));
    }

    public function controlstores($campaignId,Request $request){
        $ok='';
        $ko='';
        if ($request->busca) $busqueda = $request->busca;
        if ($request->ok) $ok= $request->ok=='1' ? '0' : '1';
        if ($request->ko) $ko= $request->ko=='1' ? '0' : '1';

        $campaign=Campaign::find($campaignId);

        $stores=CampaignTienda::with('campaign')
        ->when($ok!='',function ($q){
            $q->whereHas('elementos', function ($query) {$query->where('OK', '1');});
        })
        ->when($ko!='',function ($q){
            $q->whereHas('elementos', function ($query) {$query->where('KO', '1');});
        })
        ->where('campaign_id',$campaignId)
        ->get();

        return view('tienda.indexcontroltienda',compact('campaign','stores','ok','ko'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Campaign $campaign, Store $store,Request $request){
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
                'OK'=>$request->estadorecepcion==1 ? '1' : '0',
                'KO'=>$request->estadorecepcion>1 ? '1' : '0',
                'obsrecepcion'=>$request->obsrecepcion,
                'updated_by'=>auth()->user()->id,
                'fecharecepcion'=>now(),
            ]
            );

            $notification = array(
            'message' => 'Elemento actualizado satisfactoriamente!',
            'alert-type' => 'success',
        );

        // if($request->estadorecepcion!='1'){
        //     $this->enviamail($campaign,$store);
        // }

        return redirect()->route('tienda.editrecepcion',[$request->campaignId,$request->storeId])->with($notification);

    }

    public function envioincidencias(Campaign $campaign,Store $store){

        $details=[
            'de'=>'alex.arregui@sumaempresa.com',
            'asunto'=>'Deficiencias en la entrega de la campaña: ' . $campaign->campaign_name . ' Tienda: ' . $store->name ,
            'cuerpo'=>'deficiencias',
            'campaignId'=>$campaign->id,
            'campaignname'=>$campaign->campaign_name,
            'storename'=>$store->name,
            'storeId'=>$store->id,
            'cuerpo'=>'Se han reportado las siguientes deficiecnisad en la entrega de la campaña: ' . $campaign->campaign_name . ' Tienda: ' . $store->name
        ];

        $destinatarios=Destinatario::where('empresa','Grafitex')->get();

        $deficiencias= CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','tienda_id')
        ->where('campaign_id',$details['campaignId'])
        ->where('campaign_elementos.store_id',$details['storeId'])
        ->where('campaign_elementos.estadorecepcion','<>','1')
        ->get();

        if($deficiencias->count()>0){
            foreach ($destinatarios as $destinatario) {
                Mail::to($destinatario->mail)->send(new MailDeficiencias($details,$deficiencias));
                // Mail::to($user->email)->send(new MailControlrecepcion2($details));
                $notification = array(
                    'message' => '¡Mail de incidencias enviado!',
                    'alert-type' => 'success',
                );
            }
        }
        else
            $notification = array(
                'message' => 'No hay incidencias a enviar',
                'alert-type' => 'alert',
            );


        return redirect()->back()->with($notification);



    }
}
