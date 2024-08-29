<?php

namespace App\Http\Controllers;

use App\Models\{Area,Country,Segmento, Store, StoreElemento, Elemento, Entidad, Furniture, MontajeTipo, Storeconcept, TiendaTipo};
use App\Imports\StoreaddressesImport;
use App\Exports\StoreExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class StoreController extends Controller
{

    public function __construct(){
        $this->middleware('can:stores.index')->only('index','addresses');
        $this->middleware('can:stores.edit')->only('store','edit','update','updateimagenindex','destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $lux=$request->get('lux');
        $sto=$request->get('sto');
        $nam=$request->get('nam');
        $coun=$request->get('coun');
        $are=$request->get('are');
        $segmen=$request->get('segmen');
        $cha=$request->get('cha');
        $clu=$request->get('clu');
        $conce=$request->get('conce');
        $fur=$request->get('fur');

        $stores=Store::lux($lux)
            ->sto($sto)
            ->nam($nam)
            ->coun($coun)
            ->are($are)
            ->segmen($segmen)
            ->cha($cha)
            ->clu($clu)
            ->conce($conce)
            ->fur($fur)
            ->orderBy('id')
            ->paginate('25');

        $storestodos=Store::orderby('name')->get();
        $storestodoscode=Store::orderby('id')->get();
        $areas=Area::orderBy('area')->get();
        $segmentos=Segmento::orderBy('segmento')->get();
        $conceptos=Storeconcept::orderBy('storeconcept')->get();
        $furnitures=Furniture::orderBy('furniture_type')->get();

        if($request->submit=="excel")
            return Excel::download(new StoreExport($lux,$sto,$nam,$coun,$are,$segmen,$cha,$clu,$conce,$fur),'stores.xlsx');
        else
            return view('stores.index',
                    compact('stores','storestodos','storestodoscode','areas','segmentos','conceptos','furnitures','lux','sto','nam','coun','are','segmen','cha','clu','conce','fur'));

    }

    public function addresses(Request $request){
        $sto=$request->get('sto');
        $nam=$request->get('nam');

        $stores=Store::sto($sto)
            ->nam($nam)
            ->orderBy('id')
            ->paginate('15')->onEachSide(1);

        return view('stores.addresses.index',compact('stores','sto','nam'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'id'=>'required|numeric|unique:stores',
            'name'=>'required',
            'country'=>'required',
            'area_id'=>'required',
            'segmento'=>'required',
            'concepto_id'=>'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288',
            ]);


        $a=Area::find($request->area_id)->area;
        $c=Storeconcept::find($request->concepto_id)->storeconcept;
        if($request->area=="Canarias")
        $z="CA";
        else
        $z=$request->country;

        $imagen="SGH.jpg";
        if(!is_null($request->imagen))
            $imagen = Store::subirImagen($request->id,$request->file('imagen'));

        DB::table('stores')->insert([
            'id'=>$request->id,
            'name'=>$request->name,
            'country'=>$request->country,
            'idioma'=>$request->idioma,
            'zona'=>$z,
            'area_id'=>$request->area_id,
            'area'=>$a,
            'segmento'=>$request->segmento,
            'concepto_id'=>$request->concepto_id,
            'concepto'=>$c,
            'imagen'=>$imagen,
            'observaciones'=>$request->observaciones,
             ]
        );

        $notification = array(
            'message' => 'Elemento creado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->route('stores.index')->with($notification);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store){
        $countries=Country::get();
        $areas=Area::orderBy('area')->get();
        $segmentos=Segmento::orderBy('segmento')->get();
        $conceptos=Storeconcept::orderBy('storeconcept')->get();
        $furnitures=Furniture::orderBy('furniture_type')->get();
        $montadores=Entidad::orderBy('entidad')->get();
        $tiendatipos=TiendaTipo::where('tiendatipo','<>','Grafitex')->orderBy('tiendatipo')->get();
        $montajetipos=MontajeTipo::orderBy('montajetipo')->get();
        return view('stores.edit', compact('store','countries','areas','segmentos','conceptos','furnitures','montadores','tiendatipos','montajetipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store){

        // dd($request);
        $request->validate([
            'name'=>'required',
            'country'=>'required',
            'area_id'=>'required',
            'segmento'=>'required',
            'concepto_id'=>'required',
            'email'=>'nullable|email',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:12288',
            ]);


        $a=Area::find($request->area_id)->area;
        $c=Storeconcept::find($request->concepto_id)->storeconcept;
        if($request->area=="Canarias")
        $z="CA";
        else
        $z=$request->country;

        $imagen=$request->imagen;
        if($request->file('photo'))
            $imagen = Store::subirImagen($request->id,$request->file('photo'));

        DB::table('stores')->where('id',$store->id)->update([
            'luxotica'=>$request->luxotica,
            'tiendatipo_id'=>$request->tiendatipo_id,
            'montajetipo_id'=>$request->montajetipo_id,
            'name'=>$request->name,
            'country'=>$request->country,
            'idioma'=>$request->idioma,
            'zona'=>$z,
            'area_id'=>$request->area_id,
            'area'=>$a,
            'segmento'=>$request->segmento,
            'channel'=>$request->channel,
            'channel'=>$request->channel,
            'store_cluster'=>$request->store_cluster,
            'store_cluster'=>$request->store_cluster,
            'concepto_id'=>$request->concepto_id,
            'concepto'=>$c,
            'furniture_type'=>$request->furniture_type,
            'address'=>$request->address,
            'city'=>$request->city,
            'province'=>$request->province,
            'cp'=>$request->cp,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'winterschedule'=>$request->winterschedule,
            'summerschedule'=>$request->summerschedule,
            'deliverytime'=>$request->deliverytime,
            'imagen'=>$imagen,
            'observaciones'=>$request->observaciones,
            'montador_id'=>$request->montador_id,
             ]
        );

        $notification = array(
            'message' => 'Elemento actualizado satisfactoriamente!',
            'alert-type' => 'success'
        );

        return redirect()->route('stores.edit',$store)->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request,$id){
        try{
            Store::destroy($id);;
        }catch(\ErrorException $ex){
            return back()->withError($ex->getMessage());
        }

        // no funciona try catch!

        $notification = array(
            'message' => 'Elemento eliminado satisfactoriamente!',
            'alert-type' => 'success'
        );

        if($request->ajax()){
            return response()->json([
                'id'=>$id,
                'notificacion'=>$notification,
            ]);
        }
    }
}
