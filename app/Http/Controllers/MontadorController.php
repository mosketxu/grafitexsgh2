<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Campaign;
use App\Models\CampaignTienda;
use App\Models\CampaignTiendaGaleria;
use App\Models\Entidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $filtroestadomontaje=is_null($request->filtroestadomontaje) ? '3' : $request->filtroestadomontaje;
        // dd($filtroestadomontaje);
        $montador=Entidad::where('user_id',Auth()->user()->id)->first();
        $camptiendas=CampaignTienda::with('campaign','montador')
        ->where('montador_id',$montador->id)
        ->when($filtroestadomontaje!='t',function($query) use($filtroestadomontaje){
            if($filtroestadomontaje=='3'){
                // dd('es 3');
                return $query->where('estadomontaje','<>','2');}
            else{
                // dd('es menor de 3');
                return $query->where('estadomontaje','=',$filtroestadomontaje);}
        })
        ->paginate(20);

        return view('montador.index',compact('camptiendas','filtroestadomontaje'));
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
        $ruta='montador.index';

        return view('campaign.plan.edit',compact('camptienda','areas','filtroarea','montadores','galeria','deshabilitado','deshabilitadocolor','deshabilitadofechamontador','deshabilitadofechamontadorcolor','ruta'));
    }

    public function updatefechasplan(Request $request,CampaignTienda $camptienda){
        // dd($request);
        $request->validate([
            'fechaprev1'=>'required',
            'fechaprev2'=>'nullable|date',
            'fechaprev3'=>'nullable|date',
        ]);

        $montaje2=$request->fechaprev2=='' ? null : $request->montaje2;
        $montaje3=$request->fechaprev2=='' ? null : $request->montaje3;
        $preciomontador=$request->preciomontador=='' ? null : $request->preciomontador;

        $camptienda->update([
            'fechaprev1'=>$request->fechaprev1,
            'fechaprev2'=>$request->fechaprev2,
            'fechaprev3'=>$request->fechaprev3,
            'montaje2'=>$montaje2,
            'montaje3'=>$montaje3,
            'preciomontador'=>$preciomontador,
            ]
        );
        return redirect()->route('plan.edit',$camptienda)->with('message','Datos actualizadas ');
    }

    public function updatefechasmontador(Request $request,CampaignTienda $camptienda){
        $request->validate([
            'fechamontador1'=>'required',
            'fechamontador2'=>'nullable|date',
            'fechamontador3'=>'nullable|date',
        ]);

        $camptienda->update([
            'fechamontador1'=>$request->fechamontador1,
            'fechamontador2'=>$request->fechamontador2,
            'fechamontador3'=>$request->fechamontador3,
            'preciomontador'=>$request->preciomontador,
            ]
        );

        return redirect()->route('plan.edit',$camptienda)->with('message','Datos actualizadas ');
    }

    public function updateestadomontaje(Request $request,CampaignTienda $camptienda,$ruta){
        $camptienda->update(['estadomontaje' => $request->estadomontaje,]);
        return redirect()->route($ruta,[$camptienda,$ruta])->with('message','Datos actualizadas ');
    }

    public function updatemontadortienda(Request $request,CampaignTienda $camptienda){
        $preciomontador= $request->preciomontador=='' ? '0.00' : $request->preciomontador;
        $camptienda->update(['montador_id' => $request->montador_id,'preciomontador'=>$preciomontador]);
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
