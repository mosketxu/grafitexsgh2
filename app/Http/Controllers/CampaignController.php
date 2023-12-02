<?php

namespace App\Http\Controllers;

use App\Models\{Store,StoreElemento,Area,Mobiliario,Campaign,
    CampaignStore,CampaignMedida,CampaignMobiliario,
    CampaignUbicacion,CampaignSegmento,CampaignArea,CampaignElemento,
    CampaignGaleria,
    CampaignIdioma,
    CampaignTienda,
    Idioma,
    Medida,Segmento,TarifaFamilia,Ubicacion,
    };

use App\Exports\CampaignStoresExport;
use App\Http\Requests\CampaignUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class CampaignController extends Controller{

    public function __construct(){
        $this->middleware('can:campaign.index')->only('index','edit','addresses','exportaddresses','conteo');
        $this->middleware('can:campaign.edit')->only('filtrar','show','update','generarcampaign');
        $this->middleware('can:campaign.delete')->only('destroy');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $busqueda = '';
        $filtrocampaign = '';
        if ($request->search) $busqueda = $request->search;
        if ($request->filtrocampaign) $filtrocampaign = $request->filtrocampaign;

        $campaigns=Campaign::query()
        // ->search2($request->search)
        ->when(!empty($busqueda),function($query) use($busqueda){return $query->where('campaign_name','=',$busqueda);})
        ->when(!empty($filtrocampaign),function($query) use($filtrocampaign){return $query->where('campaign_state','=',$filtrocampaign);})
        ->orderBy('id','DESC')
        ->paginate(15);

        $ancho1= Auth::user()->hasRole('sgh') ? 'w-10/12' : 'w-8/12';
        $ancho2= Auth::user()->hasRole('sgh') ? 'w-2/12' : 'w-4/12';

        return view('campaign.index',compact('campaigns','busqueda','filtrocampaign','ancho1','ancho2'));
    }

    public function edit($campid){
        $deshabilitado=Auth::user()->can('campaign.edit') ? '' : 'disabled' ;
        $campaign=Campaign::find($campid);
        return view('campaign.edit',compact('campaign','deshabilitado'));
    }

    public function addresses($id){
        $campaign=Campaign::find($id);
        $stores=CampaignStore::join('stores','stores.id','store_id')
            ->where('campaign_id', '=', $id)
            ->orderBy('stores.id')
            ->paginate('20')->onEachSide(1);
        return view('campaign.indexaddresses',compact('stores','campaign'));
    }

    public function exportaddresses($campaignId){
        return Excel::download(new CampaignStoresExport($campaignId), 'direcciones.xlsx');
    }

    public function filtrar($id,Request $request){
        $campaign = Campaign::find($id);
        $busqueda = '';

        if ($request->busca) $busqueda = $request->busca;

        $elementos=StoreElemento::join('stores','stores.id','store_id')
        ->join('elementos','elementos.id','elemento_id')
        ->search2($busqueda)
        ->campstosto($campaign->id)
        ->campstoseg($campaign->id)
        ->campstoubi($campaign->id)
        ->campstomob($campaign->id)
        ->campstomed($campaign->id)
        ->paginate(15);

        return view('campaign.indexfiltrar', compact('campaign','elementos','busqueda'));
    }

    // public function update(CampaignUpdateRequest $request,$id){
    public function update(Request $request,$id){
        $request->validate([
            'campaign_name' => 'required',
            'campaign_initdate' => 'date|required',
            'campaign_enddate' => 'date|required',
            'fechaentregatienda' => 'date',
            'campaign_state' => 'required',
            'fechainstal1'=>['nullable','date',Rule::requiredIf($request->montaje1!='')],
            'fechainstal2'=>['nullable','date',Rule::requiredIf($request->montaje2!='')],
            'fechainstal3'=>['nullable','date',Rule::requiredIf($request->montaje3!='')],
            'montaje1'=>['nullable',Rule::requiredIf($request->fechainstal1!='')],
            'montaje2'=>['nullable',Rule::requiredIf($request->fechainstal2!='')],
            'montaje3'=>['nullable',Rule::requiredIf($request->fechainstal3!='')],
            'preciomontador' => 'nullable',
            'pedidocliente' => 'nullable',
        ]);

        $campaign=Campaign::find($id);
        $campaign->update([
            'campaign_name' => $request->campaign_name,
            'campaign_initdate' => $request->campaign_initdate,
            'campaign_enddate' => $request->campaign_enddate,
            'fechaentregatienda' => $request->fechaentregatienda,
            'campaign_state' => $request->campaign_state,
            'fechainstal1' => $request->fechainstal1,
            'fechainstal2' => $request->fechainstal2,
            'fechainstal3' => $request->fechainstal2,
            'montaje1' => $request->montaje1,
            'montaje2' => $request->montaje2,
            'montaje3' => $request->montaje3,
            'preciomontador' => $request->preciomontador,
            'pedidocliente' => $request->pedidocliente,
            ]
        );
        return redirect()->route('campaign.edit',$campaign)->with('message','Registro actualizado satisfactoriamente');
    }

    public function generarcampaign($tipo,$id){
        $campaign = Campaign::find($id);
        //Si empiezo de 0 borrar todo lo generado y regenerar
        if($tipo=="0"){
            // CampaignStore NO SE ELEMINA PORQUE ES UN FILTRO!!!!
            // if(CampaignStore::where('campaign_id',$id)->count()>0){
            //     CampaignStore::where('campaign_id','=',$id)->delete();
            // }
            if(CampaignTienda::where('campaign_id',$id)->count()>0){
                CampaignTienda::where('campaign_id','=',$id)->delete();
                // elimna en cascada CampaignTienda
            }
            if(CampaignGaleria::where('campaign_id','=',$id)->count()>0){
                CampaignGaleria::where('campaign_id','=',$id)->delete();
            }
        }

        // Si no se ha seleccionado ningun Area entiendo que los quiero todos
        // if(CampaignArea::where('campaign_id','=',$id)->count()==0){
        //     $areas=Area::select('area')->get();
        //     Campaign::inserta('campaign_areas',$areas,'area',$id);
        // }

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

        // Si no se ha seleccionado ningun segmento entiendo que los quiero todos
        if(CampaignSegmento::where('campaign_id','=',$id)->count()==0){
            $segmentos=Segmento::select('segmento')->get();
            Campaign::inserta('campaign_segmentos',$segmentos,'segmento',$id);
        }

        // Si no se ha seleccionado ningun idioma entiendo que los quiero todos
        if(CampaignIdioma::where('campaign_id','=',$id)->count()==0){
            $idiomas=Idioma::get();
            Campaign::inserta('campaign_idiomas',$idiomas,'idioma',$id);
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

        // Si no se ha seleccionado ningun ubicacion entiendo que los quiero todos
        if(CampaignUbicacion::where('campaign_id','=',$id)->count()==0){
            $ubicacions=Ubicacion::select('ubicacion')->get();
            Campaign::inserta('campaign_ubicacions',$ubicacions,'ubicacion',$id);
        }


        // Separo en una tabla los stores y en otra todo los elementos de la store
        // $tiendas=Maestro::CampaignTiendas($id)->get();
        $tiendas=StoreElemento::join('stores','stores.id','store_id')
            ->join('elementos','elementos.id','elemento_id')
            ->select('store_id as store')
            ->campstosto($campaign->id)
            ->campstoseg($campaign->id)
            ->campstoidiom($campaign->id)
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
    public function destroy($id){

        $campaignborrar=Campaign::find($id);
        if($campaignborrar)
            $campaignborrar->delete();

         $notification = array(
            'message' => '¡Campaña eliminada satisfactoriamente!',
            'alert-type' => 'success'
        );
        if(!Auth::user()->hasRole('tienda'))
            return redirect()->route('campaign.index')->with($notification);
        else
            return redirect()->route('tienda.control')->with($notification);
    }
}
