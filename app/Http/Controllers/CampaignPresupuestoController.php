<?php

namespace App\Http\Controllers;

use App\Models\{Campaign, CampaignElemento,
    CampaignPresupuesto, CampaignPresupuestoDetalle, CampaignPresupuestoExtra,
    CampaignPresupuestoPickingtransporte, CampaignTienda, Elemento, Tarifa, TarifaFamilia,
    VCampaignPromedio, VCampaignResumenElemento};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Image;

class CampaignPresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request, $campaignId){
        $busqueda = '';
        if ($request->busca)
            $busqueda = $request->busca;

        $campaign = Campaign::find($campaignId);

        $presupuestos= CampaignPresupuesto::search2($request->busca)
            ->where('campaign_id',$campaignId)
            ->orderBy('fecha')
            ->paginate('50');

        return view('campaign.presupuesto.index', compact('presupuestos','campaign','busqueda'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'referencia' => 'required',
            'version' => 'required',
            'fecha' => 'required|date',
            'estado' => 'required',
        ]);

        // recupero la lista de elementos creada y asigno el precio en función de cuántos hay
        // calculo el total actual de los elementos para insertarlo y mostrarlo en el indice de prepuestos
        // Lo hago cada vez que genero un presupuesto para tener siempre el último precio

        //cambio el 5/3/2020 Como solo se va a usar un tramo, asigno el precio del tramo 1.
        $totalpresupuestoMat= CampaignElemento::asignElementosPrecio($request->campaign_id);

        $campPresu=CampaignPresupuesto::create($request->all());
        // $campPresu->total=$totalpresupuestoMat->total;
        $campPresu->total=$totalpresupuestoMat;
        $campPresu->save();

        // guardo los materiales en campaign_presupuestos_detalle para tener historico si se cambian los precios en una segunda versión del presupuesto
        $materiales=CampaignElemento::getElementos($request->campaign_id);

        if($materiales->count()>0){
            foreach (array_chunk($materiales->toArray(),1000) as $t){
                $dataSet = [];
                foreach ($t as $material) {
                    $dataSet[] = [
                        'presupuesto_id'  => $campPresu->id,
                        'familia'  => $material['familia'],
                        'precio'  => $material['precio'],
                        'unidades'  => $material['unidades'],
                        'total'  => $material['tot'],
                    ];
                }
                DB::table('campaign_presupuesto_detalles')->insert($dataSet);
            }
        }

        // guardo picking y transporte en campaign_presupuestos_pickintransporte para tener historico si se cambian los precios en una segunda versión del presupuesto
        $stores=VCampaignPromedio::where('campaign_id',$request->campaign_id)
        ->select('zona',DB::raw('count(store_id) as tiendas'),DB::raw('SUM(tot) as total'))
        ->groupBy('zona')
        ->get()
        ->toArray();

        $totalStores=VCampaignPromedio::where('campaign_id',$request->campaign_id)
        ->count();
        $dataSet=[];
        foreach($stores as $store){

            $pick=Tarifa::where('tipo',1)
                ->where('zona',$store['zona'])
                ->first();
            $transp=Tarifa::where('tipo',2)
                ->where('zona',$store['zona'])
                ->first();

            $dataSet[]=[
                'presupuesto_id'=>$campPresu->id,
                'zona'=>$store['zona'],
                'picking'=>$pick['tarifa1'],
                'transporte'=>$transp['tarifa1'],
                'stores'=>$store['tiendas'],
                'totalstores'=>$totalStores,
                'totalzona'=>$store['total'],
                'total'=>$totalpresupuestoMat
                // 'total'=>$totalpresupuestoMat->total
            ];
        }
        DB::table('campaign_presupuesto_pickingtransportes')->insert($dataSet);

        $notification = array(
            'message' => '¡Presupuesto creado satisfactoriamente!',
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
    public function edit($id){
        $campaignpresupuesto=CampaignPresupuesto::find($id);
        $campaign=Campaign::find($campaignpresupuesto->campaign_id);
        $materiales=CampaignPresupuestoDetalle::where('presupuesto_id',$campaignpresupuesto->id)->get();

        return view('campaign.presupuesto.edit',compact('campaign','materiales','campaignpresupuesto'));
    }

    public function cotizacion($id){
        $campaignpresupuesto=CampaignPresupuesto::find($id);
        $campaign=Campaign::find($campaignpresupuesto->campaign_id);
        return view('campaign.presupuesto.indexcotizacion',compact('campaign','campaignpresupuesto',));
    }

    public function elementosfamilia($campaignId,$familiaId,$presupuestoId){
        $elementos=CampaignElemento::join('campaign_tiendas','campaign_elementos.tienda_id','campaign_tiendas.id')
        ->join('elementos','campaign_elementos.elemento_id','elementos.id')
        ->where('campaign_id',$campaignId)
        ->where('familia',$familiaId)
        ->select('campaign_id','elementificador','campaign_elementos.material as material','campaign_elementos.medida as medida','campaign_elementos.familia as familia',)
        ->orderBy('campaign_elementos.material','asc')
        ->orderBy('campaign_elementos.medida','asc')
        ->groupBy('campaign_id','elementificador','material','medida','familia')
        ->paginate(13);

        $presupuesto=CampaignPresupuesto::find($presupuestoId);
        $tarifas=Tarifa::where('tipo','0')->orderBy('familia')->get();
        $campaign=Campaign::find($campaignId);

        return view('campaign.presupuesto.indexelementosfamilia',compact('campaign','elementos','presupuesto','tarifas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $request->validate([
            'referencia' => 'required',
            'version' => 'required',
            'fecha' => 'required|date',
            'estado' => 'required',
            ]);

        CampaignPresupuesto::find($id)->update($request->all());
        $campaign=Campaign::find($request->campaign_id);

        $notification = array(
            'message' => '¡Presupuesto actualizado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function updateelemento(Request $request){
        //busco el elemento que tenga ese elementificador
        $elemento=Elemento::where('elementificador',$request->elementificador)->first();
        //busco las tiendas que pertenecen a la campaña.
        $tiendas=CampaignTienda::where('campaign_id',$request->campaign_id)->pluck('id');
        //busco el precio actual de la familia
        $precio=Tarifa::where('id',$request->familia)->first()->tarifa1;

        //Puedo aplicar la familia a todos los elementos de CampaignElementos o solo a los que corresponden a la campaña actual. Creo que debería ser a todos. Pero lo mismo modifican la familia despues de haber hecho algun presupuesto anterior.
        //Así que  aplico solo a la actual para hacerlo a la vez que el precio,ya que el precio debe ser solo a los de la campaña actual porque quizas se ha modificado respecto a campañas anteriores y no queremos modificarlo.

        //busco y actualizo los elementos que pertenecen a esas tiendas y luego que tengan el id del elemento
        $campaignelems=CampaignElemento::whereIn('tienda_id',$tiendas)->where('elemento_id',$elemento->id)->get();
        // $campaignelems=CampaignElemento::where('elemento_id',$elemento->id)->get();
        $campaignelems->toQuery()->update([
                'familia'=>$request->familia,
                'precio'=>$precio]
            );
        // //actualizo la familia del elemento y le asigno el valor del precio de la familia solo
        // $campaignelem=CampaignElemento::join('elementos','elementos.id','campaign_elementos.elemento_id')
        // ->where('elementificador',$request->elementificador)->first();

        // Elemento::where('material',$campaignelem->material)
        // ->where('medida',$campaignelem->medida)
        // ->update(['familia_id'=>$request->familia]);

        // TarifaFamilia::where('material',$campaignelem->material)
        // ->where('medida',$campaignelem->medida)
        // ->update(['tarifa_id'=>$request->familia]);

        $notification = array(
            'message' => 'Tarifa actualizada satisfactoriamente!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function refresh($campaignId,$presupuestoId){
        // elimino los detalles del presupuesto
        $detallePresup=CampaignPresupuestoDetalle::where('presupuesto_id',$presupuestoId)->count();
        if ($detallePresup>0) CampaignPresupuestoDetalle::where('presupuesto_id',$presupuestoId)->delete();
        // y de picking y transporte para poner nuevos precios
        $pickingtransp=CampaignPresupuestoPickingtransporte::where('presupuesto_id',$presupuestoId)->count();
        if ($pickingtransp>0)
            CampaignPresupuestoPickingtransporte::where('presupuesto_id',$presupuestoId)->delete();

        //actualizo los valores de la familia en los elementos de la campaña
        $elementos=CampaignElemento::join('campaign_tiendas','campaign_tiendas.id','campaign_elementos.tienda_id')
            ->where('campaign_id',$campaignId)
            ->orderBy('elemento_id')
            ->get();

        foreach ($elementos as $elemento){
            $familia=TarifaFamilia::getFamilia($elemento['material'],$elemento['medida']);
            $fam=$familia['id'];
            $precio=Tarifa::where('id',$fam)->first()->tarifa1;
            // si no encuentra familia lo ponogo como "sin identificar"! que debe ser el 1 en ña tabla Tarifas
            if (is_null($fam)) $fam=1;
            CampaignElemento::where('elemento_id',$elemento->elemento_id)
                ->update([
                    'familia'=>$fam,
                    'precio'=>$precio,
            ]);
            Elemento::where('matmed',$familia->matmed)
                ->update([
                    'familia_id'=>$fam,
                ]);
        }

        $totalpresupuestoMat= CampaignElemento::asignElementosPrecio($campaignId);

        // guardo los materiales en campaign_presupuestos_detalle para tener historico si se cambian los precios en una segunda versión del presupuesto
        $materiales=VCampaignResumenElemento::where('campaign_id',$campaignId)->get();

        if($materiales->count()>0){
            foreach (array_chunk($materiales->toArray(),500) as $t){
                $dataSet = [];
                foreach ($t as $material) {
                    $dataSet[] = [
                        'presupuesto_id'  => $presupuestoId,
                        'familia'  => $material['familia'],
                        'precio'  => $material['precio'],
                        'unidades'  => $material['unidades'],
                        'total'  => $material['tot'],
                    ];
                }
                DB::table('campaign_presupuesto_detalles')->insert($dataSet);
            }
        }

        // guardo picking y transporte en campaign_presupuestos_pickintransporte para tener historico si se cambian los precios en una segunda versión del presupuesto
        $stores=VCampaignPromedio::where('campaign_id',$campaignId)
        ->select('zona',DB::raw('count(store_id) as tiendas'),DB::raw('SUM(tot) as total'))
        ->groupBy('zona')
        ->get()
        ->toArray();

        $totalStores=VCampaignPromedio::where('campaign_id',$campaignId)
        ->count();
        $dataSet=[];

        foreach($stores as $store){
            $pick=Tarifa::where('tipo',1)
                ->where('zona',$store['zona'])
                ->first();
            $transp=Tarifa::where('tipo',2)
                ->where('zona',$store['zona'])
                ->first();

            $dataSet[]=[
                'presupuesto_id'=>$presupuestoId,
                'zona'=>$store['zona'],
                'picking'=>$pick->tarifa1,
                'transporte'=>$transp->tarifa1,
                'stores'=>$store['tiendas'],
                'totalstores'=>$totalStores,
                'totalzona'=>$store['total'],
                'total'=>$totalpresupuestoMat
                // 'total'=>$totalpresupuestoMat->total
            ];
            // print_r($dataSet);die();
        }

        DB::table('campaign_presupuesto_pickingtransportes')->insert($dataSet);

        $notification = array(
            'message' => '¡Nuevos precios asociados satisfactoriamente!',
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
    public function destroy($id)
    {
        CampaignPresupuesto::find($id)->delete();

        $notification = array(
            'message' => 'Eliminado con exito.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        return response()->json(['success'=>'Eliminado con exito']);
    }
}
