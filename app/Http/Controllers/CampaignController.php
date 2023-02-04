<?php

namespace App\Http\Controllers;

use App\Models\{
    Store,StoreElemento,Area,Mobiliario,
    Campaign,
    CampaignStore,
    CampaignMedida,
    CampaignMobiliario,
    CampaignUbicacion,
    CampaignSegmento,
    CampaignArea,
    CampaignElemento,
    CampaignGaleria,
    CampaignTienda,
    Medida,
    Segmento,
    Tarifa,
    VCampaignGaleria,
    TarifaFamilia,
    Ubicacion,
    };

use App\Exports\CampaignStoresExport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class CampaignController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->search) {
            $busqueda = $request->search;
        } else {
            $busqueda = '';
        }
        $campaigns=Campaign::query()
        ->when($busqueda!='',function($query) use($busqueda){return $query->where('campaign_name','like','%'.$busqueda.'%');})
        ->orderBy('id','DESC')
        ->paginate(15);

        return view('campaign.index',compact('campaigns','busqueda'));
    }

    public function edit($campid){
        $campaign=Campaign::find($campid);
        return view('campaign.edit',compact('campaign'));
    }

    public function addresses($id){
        $campaign=Campaign::find($id);
        $stores=CampaignStore::join('stores','stores.id','store_id')
            ->where('campaign_id', '=', $id)
            ->orderBy('stores.id')
            ->paginate('20')->onEachSide(1);
        return view('campaign.indexaddresses',compact('stores','campaign'));
    }

    public function exportadresses($campaignId){
        return Excel::download(new CampaignStoresExport($campaignId), 'direcciones.xlsx');
    }

    public function filtrar($id,Request $request){

        $campaign = Campaign::find($id);

        if ($request->busca) {
            $busqueda = $request->busca;
        } else {
            $busqueda = '';
        }

        $elementos=StoreElemento::join('stores','stores.id','store_id')
        ->join('elementos','elementos.id','elemento_id')
        ->when($busqueda!='',function($query) use($busqueda){return $query->where('campaign_name','like','%'.$busqueda.'%');})
        ->campstosto($campaign->id)
        ->campstoseg($campaign->id)
        ->campstoubi($campaign->id)
        ->campstomob($campaign->id)
        ->campstomed($campaign->id)
        ->get();

        return view('campaign.indexfiltrar', compact('campaign','elementos','busqueda'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'campaign_name' => 'required',
            'campaign_initdate' => 'required',
            'campaign_enddate' => 'required',
            'campaign_state' => 'required',
        ]);

        $campaign=Campaign::find($id)->update($request->all());
        // dd('sdf');
        return redirect()->route('campaign.edit',$campaign)->with('message','Registro actualizado satisfactoriamente');
    }

    public function generarcampaign($tipo,$id){
        $campaign = Campaign::find($id);
        //Si empiezo de 0 borrar todo lo generado y regenerar
        if($tipo=="0"){
            if(CampaignTienda::where('campaign_id',$id)->count()>0){
                CampaignTienda::where('campaign_id','=',$id)->delete();
                // elimna en cascada CampaignElemento
            }
            if(CampaignGaleria::where('campaign_id','=',$id)->count()>0){
                CampaignGaleria::where('campaign_id','=',$id)->delete();
            }
        }

        // Si no se ha seleccionado ningun Area entiendo que los quiero todos
        if(CampaignArea::where('campaign_id','=',$id)->count()==0){
            $areas=Area::select('area')->get();
            Campaign::inserta('campaign_areas',$areas,'area',$id);
        }
        // Si no se ha seleccionado ningun Medida entiendo que los quiero todos
        if(CampaignMedida::where('campaign_id','=',$id)->count()==0){
            $medidas=Medida::select('medida')->get();
            Campaign::inserta('campaign_medidas',$medidas,'medida',$id);
        }
        // Si no se ha seleccionado ningun Mobiliario entiendo que los quiero todos
        if(CampaignMobiliario::where('campaign_id','=',$id)->count()==0){
            $mobiliarios=Mobiliario::select('mobiliario')->get();
            Campaign::inserta('campaign_mobiliarios',$mobiliarios,'mobiliario',$id);
        }
        // Si no se ha seleccionado ningun segmento entiendo que los quiero todos
        if(CampaignSegmento::where('campaign_id','=',$id)->count()==0){
            $segmentos=Segmento::select('segmento')->get();
            Campaign::inserta('campaign_segmentos',$segmentos,'segmento',$id);
        }
        // Si no se ha seleccionado ningun ubicacion entiendo que los quiero todos
        if(CampaignUbicacion::where('campaign_id','=',$id)->count()==0){
            $ubicacions=Ubicacion::select('ubicacion')->get();
            Campaign::inserta('campaign_ubicacions',$ubicacions,'ubicacion',$id);
        }

        // Si no se ha seleccionado ningun store entiendo que los quiero todos
        if(CampaignStore::where('campaign_id','=',$id)->count()==0){
            Store::select('id as store','name')->chunk(100, function ($stores) use($id){
                foreach ($stores as $store) {
                    $existe=CampaignStore::where('store_id',$store['store'])->where('campaign_id',$id)->count();
                    if($existe==0){
                        CampaignStore::insert([
                            'campaign_id'  => $id,
                            'store_id'  => $store['store'],
                            'store'  => $store['name'],
                        ]);
                    };
                }
            });
        }

        // Separo en una tabla los stores y en otra todo los elementos de la store
        // $tiendas=Maestro::CampaignTiendas($id)->get();
        $tiendas=StoreElemento::join('stores','stores.id','store_id')
            ->join('elementos','elementos.id','elemento_id')
            ->select('store_id as store')
            ->campstosto($campaign->id)
            ->campstoseg($campaign->id)
            ->campstoubi($campaign->id)
            ->campstomob($campaign->id)
            ->campstomed($campaign->id)
            ->groupBy('store','name')
            ->get();

        foreach ($tiendas as $tienda) {
            if(CampaignTienda::where('campaign_id',$id)->where('store_id',$tienda->store)->count()==0){
                $tiendaId = CampaignTienda::insertGetId(["campaign_id"=>$id,"store_id"=>$tienda->store]);
            }else{
                $tiendaId=CampaignTienda::where('campaign_id',$id)->where('store_id',$tienda->store)->first()->id;
            }
            $t=$tienda->store;
            $generar=StoreElemento::join('stores','stores.id','store_id')
            ->join('elementos','elementos.id','elemento_id')
            ->campstoubi($campaign->id)
            ->campstomob($campaign->id)
            ->campstomed($campaign->id)
            ->where('store_id',$t)
            ->get();

            foreach ($generar as $gen){
                if ($gen['country']=='PT'){
                    $zona='PT';
                }else{
                    if($gen['area']=='Canarias')
                    $zona='CN';
                    else
                    $zona='ES';
                }
                $familia=TarifaFamilia::getFamilia($gen['material'],$gen['medida']);

		        if($familia)
                    $fam=$familia['id'];

                if (is_null($fam))
                    $fam=1;

                $elemento=$gen['mobiliario'].$gen['carteleria'].$gen['medida'];
                $sust=array(" ","/","-","+",".","(",")","á","é","í",'ó','ú',"Á","É","Í",'Ó','Ú');
                $por=array("","","","","","","","a","e","i",'o','u',"A","E","I",'O','U');

                if(substr($gen['name'],0,3)==='ECI')
                    $eci='ECI';
                else
                    $eci='';
                $elemento=strtolower(str_replace($sust, $por, $elemento)).$eci;

                $imagen=$elemento.'.jpg';
                $mat=!is_null($gen['material'])?$gen['material']:'';
                $med=!is_null($gen['medida'])?$gen['medida']:'';
                $matmed=$mat . $med;
                $sust=array(" ","/","-","(",")","á","é","í",'ó','ú',"Á","É","Í",'Ó','Ú');
                $por=array("","","","","","a","e","i",'o','u',"A","E","I",'O','U');
                $matmed=str_replace($sust, $por, $matmed);
                $matmed=strtolower($matmed);

                $i=CampaignElemento::insert([
                    'tienda_id'  => $tiendaId,
                    'elemento_id'  => $gen['elemento_id'],
                    'store_id'  => $gen['store_id'],
                    'name'  => $gen['name'],
                    'country'  => $gen['country'],
                    'idioma'  => $gen['idioma'],
                    'area'  => $gen['area'],
                    'zona'  => $zona,
                    'segmento'  => $gen['segmento'],
                    'storeconcept'  => $gen['concepto'],
                    'ubicacion'  => $gen['ubicacion'],
                    'mobiliario'  => $gen['mobiliario'],
                    'propxelemento'  => $gen['propxelemento'],
                    'carteleria'  => $gen['carteleria'],
                    'medida'  => $gen['medida'],
                    'material'  => $gen['material'],
                    'matmed'  => $gen['matmed'],
                    'familia'=>$fam,
                    'unitxprop'  => $gen['unitxprop'],
                    'imagen'  => $imagen,
                    'elemento'  => $elemento,
                    'ECI'=>$eci,
                ]);
            }
        }

        //relleno la tabla imagenes
        // $imagenes=VCampaignGaleria::getGaleria($id);
        $imagenes=CampaignElemento::getGaleria($id);
        // dd($imagenes);
        foreach (array_chunk($imagenes->toArray(),1000) as $t){
            $dataSet = [];
            foreach ($t as $gen) {
                $dataSet[] = [
                    'campaign_id'  => $id,
                    'mobiliario'  => $gen['mobiliario'],
                    'carteleria'  => $gen['carteleria'],
                    'medida'  => $gen['medida'],
                    'elemento'  => $gen['elemento'],
                    'eci'  => $gen['ECI'],
                    'imagen'  => $gen['imagen'],
                ];
            }
            DB::table('campaign_galerias')->insert($dataSet);
        }

        return redirect()->route('campaign.elementos', $campaign);
    }

    public function conteo($campaignId, Request $request){
        $busqueda = '';
        if ($request->busca)
            $busqueda = $request->busca;

        $campaign = Campaign::find($campaignId);
        $total=CampaignElemento::tienda($campaignId)->count();
        $totalstores=CampaignTienda::where('campaign_id',$campaignId)->count();
        return view('campaign.conteosindex',compact('campaign','busqueda'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Campaign::where('id',$id)->delete();


         $notification = array(
            'message' => '¡Campaña eliminada satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
