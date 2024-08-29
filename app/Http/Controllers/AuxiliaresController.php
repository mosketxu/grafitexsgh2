<?php

namespace App\Http\Controllers;

use App\Models\{Area,Carteleria,Country, Furniture, Material, Medida, Mobiliario,Propxelemento,Segmento,Channel,StoreCluster,Storeconcept,Ubicacion};
use Illuminate\Http\Request;

class AuxiliaresController extends Controller
{
    public function __construct(){
        $this->middleware('can:auxiliares.index')->only('index');
    }

    public function index(){
        $countries=Country::paginate(10)->onEachSide(2);
        $areas=Area::orderBy('area')->paginate(10)->onEachSide(2);
        $segmentos=Segmento::orderBy('segmento')->paginate(10)->onEachSide(2);
        $channels=Channel::orderBy('channel')->paginate(10)->onEachSide(2);
        $storeclusters=StoreCluster::orderBy('store_cluster')->paginate(10)->onEachSide(2);
        $furnitures=Furniture::orderBy('furniture_type')->paginate(10)->onEachSide(2);
        $conceptos=Storeconcept::orderBy('storeconcept')->paginate(10)->onEachSide(2);
        $ubicaciones=Ubicacion::orderBy('ubicacion')->paginate(10)->onEachSide(2);
        $mobiliarios=Mobiliario::orderBy('mobiliario')->paginate(10)->onEachSide(2);
        $propxelementos=Propxelemento::orderBy('propxelemento')->paginate(10)->onEachSide(2);
        $cartelerias=Carteleria::orderBy('carteleria')->paginate(10)->onEachSide(2);
        $medidas=Medida::orderBy('medida')->paginate(10)->onEachSide(2);
        $materiales=Material::orderBy('material')->paginate(10)->onEachSide(2);
        return view('auxiliares.index',compact('countries','areas','segmentos','channels','storeclusters','conceptos','ubicaciones','mobiliarios','propxelementos','cartelerias','medidas','materiales','furnitures'));
    }
}
