<?php

namespace App\Http\Controllers;

use App\Models\{Area,Campaign,CampaignTienda,CampaignTiendaGaleria,Entidad};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CampaignPlanController extends Controller{

    public function __construct(){
        $this->middleware('can:plan.index')->only('index');
        $this->middleware('can:plan.edit')->only('update');
        $this->middleware('can:plantienda.index')->only('edit');
    }

    public function index(Request $request,Campaign $campaign){

        $busquedaname = '';
        if ($request->buscaname) $busquedaname = $request->buscaname;
        $busquedastoreid = '';
        if ($request->buscastoreid) $busquedastoreid = $request->buscastoreid;
        $habilitado=Auth::user()->can('plan.edit') ? '' :'disabled';
        $color=Auth::user()->can('plan.edit') ? 'bg-white' :'bg-gray-100';

        $campaigntiendas=CampaignTienda::join('stores','campaign_tiendas.store_id','=','stores.id')
            ->select('campaign_tiendas.*','stores.name')
            ->search('store_id',$busquedastoreid)
            ->orSearch('stores.name',$busquedaname)
            ->where('campaign_id',$campaign->id)
            ->paginate(10);

        return view('campaign.plan.index',compact('campaign','campaigntiendas','busquedaname','busquedastoreid','habilitado','color'));
    }

    public function update(Request $request,$campaignid){
        $request->validate([
            'fechainstal1'=>['required',Rule::requiredIf($request->montaje1!='')],
            'fechainstal2'=>['nullable','date',Rule::requiredIf($request->montaje2!='')],
            'fechainstal3'=>['nullable','date',Rule::requiredIf($request->montaje3!='')],
            'montaje1'=>['required',Rule::requiredIf($request->fechainstal1!='')],
            'montaje2'=>['nullable',Rule::requiredIf($request->fechainstal2!='')],
            'montaje3'=>['nullable',Rule::requiredIf($request->fechainstal3!='')],
        ]);

        $campaign=Campaign::find($campaignid);
        $campaign->update([
                'fechainstal1' => $request->fechainstal1,
                'fechainstal2' => $request->fechainstal2,
                'fechainstal3' => $request->fechainstal3,
                'montaje1' => $request->montaje1,
                'montaje2' => $request->montaje2,
                'montaje3' => $request->montaje3,
                'preciomontador' => $request->preciomontador,
                'pedidocliente' => $request->pedidocliente
                ]
            );

        $campaigntiendas=CampaignTienda::where('campaign_id',$campaign->id)->get();
        foreach($campaigntiendas as $camptienda){
            $camptienda->update([
                'fechaprev1' => $campaign->fechainstal1,
                'fechaprev2' => $campaign->fechainstal2,
                'fechaprev3' => $campaign->fechainstal3,
                'montaje1' => $campaign->montaje1,
                'montaje2' => $campaign->montaje2,
                'montaje3' => $campaign->montaje3,
                'preciomontador' => $campaign->preciomontador,
                'pedidocliente' => $campaign->pedidocliente,
                'montador_id' => $camptienda->tienda->montador_id,
                'estadomontaje' => '0',
                ]
            );
        }

        return redirect()->route('plan.index',$campaign)->with('message','Fechas actualizadas ');
    }

    public function edit(Request $request, $camptienda){
        $filtroarea = '';

        if ($request->filtroarea) $filtroarea = $request->filtroarea;

        $camptienda=CampaignTienda::with('campaign')->find($camptienda);

        if($filtroarea=='')
            $montadores=Entidad::select('entidades.id','entidades.entidad')->where('montador','1')->orderBy('entidad')->get();
        else
            $montadores=Entidad::join('entidad_areas','entidades.id','entidad_areas.entidad_id')
                ->select('entidades.id','entidades.entidad','entidad_areas.area_id')
                ->where('montador','1')
                ->when(!empty($filtroarea),function($query) use($filtroarea){return $query->where('entidad_areas.area_id','=',$filtroarea);})
                ->orderBy('entidad')->get();

        $areas=Area::orderBy('area')->get();
        $galeria=CampaignTiendaGaleria::where('campaigntienda_id',$camptienda->id)->get();

        if(Auth::user()->can('plan.create')){
            $deshabilitado='';
            $deshabilitadocolor='bg-white';
        }else{
            $deshabilitado='disabled';
            $deshabilitadocolor='bg-gray-100';
        }
        if(Auth::user()->can('plantienda.update')){
            $deshabilitadofechamontador='';
            $deshabilitadofechamontadorcolor='bg-white';
        }else{
            $deshabilitadofechamontador='disabled';
            $deshabilitadofechamontadorcolor='bg-gray-100';
        }

        $ruta='plan.index';

        return view('campaign.plan.edit',compact('camptienda','areas','filtroarea','montadores','galeria','deshabilitado','deshabilitadocolor','deshabilitadofechamontador','deshabilitadofechamontadorcolor','ruta'));
    }

}
