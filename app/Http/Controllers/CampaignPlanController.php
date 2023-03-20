<?php

namespace App\Http\Controllers;

use App\Models\{Area,Campaign,CampaignTienda,CampaignTiendaGaleria,Entidad};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CampaignPlanController extends Controller{

    public function __construct(){
        $this->middleware('can:plan.index')->only('index');
        $this->middleware('can:plan.index')->only('index');
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

    public function generarplan(Campaign $campaign){

        $campaigntiendas=CampaignTienda::where('campaign_id',$campaign->id)->get();
        foreach($campaigntiendas as $camptienda){
            $camptienda->update(
            [
                'fechainiprev' => $campaign->fechainstalini,
                'fechafinprev' => $campaign->fechainstalfin,
                'proveedor_id' => $camptienda->tienda->proveedor_id,
                ]
            );
        }
        return redirect()->route('plan.index',$campaign)->with('message','Planificacion realizada');
    }


    public function updatefechas(Request $request,Campaign $campaign){
        $campaign->update(
            [
                'fechainstalini' => $request->fechainstalini,
                'fechainstalfin' => $request->fechainstalfin
                ]
            );

        return redirect()->route('plan.index',$campaign)->with('message','Fechas actualizadas ');
    }


    public function edittienda(Request $request, $camptienda){
        $filtroarea = '';
        if ($request->filtroarea) $filtroarea = $request->filtroarea;

        $camptienda=CampaignTienda::with('campaign')->find($camptienda);
        $montadores=Entidad::join('entidad_areas','entidades.id','entidad_areas.entidad_id')
            ->select('entidades.id','entidades.entidad','entidad_areas.area_id')
            ->when(!empty($filtroarea),function($query) use($filtroarea){return $query->where('entidad_areas.area_id','=',$filtroarea);})
            ->orderBy('entidad')->get();

        $areas=Area::orderBy('area')->get();
        $galeria=CampaignTiendaGaleria::where('campaigntienda_id',$camptienda->id)->get();
        return view('campaign.plan.edit',compact('camptienda','areas','filtroarea','montadores','galeria'));
    }

    public function updatetiendafecha(Request $request,CampaignTienda $camptienda){
        $camptienda->update(
            [
                'fechainimontador' => $request->fechainimontador,
                'fechafinmontador' => $request->fechafinmontador,
                'observacionesmontador' => $request->observacionesmontador
                ]
            );
        return redirect()->route('plam.tiendaedit',$camptienda)->with('message','Datos actualizadas ');
    }

    public function updatetiendamontador(Request $request,CampaignTienda $camptienda){
        $camptienda->update(
            [
                'proveedor_id' => $request->proveedor_id,
                ]
            );
        return redirect()->route('plam.tiendaedit',$camptienda)->with('message','Datos actualizadas ');
    }
}
