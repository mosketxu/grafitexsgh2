<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use App\Models\{Store,Ubicacion,Carteleria,Material,Medida, Mobiliario,Propxelemento,Area,Storeconcept};

class Maestro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=['store','country','name','area','segmento','storeconcept','elementificador',
                        'ubicacion','mobiliario','propxelemento','carteleria','medida','material','matmed','unitxprop','observaciones',
                        'channel','store_cluster','furniture_type',
                    ];

    // protected $guarded = [];

    public function scopeSto($query,$sto){return $query->where('store','LIKE',"%$sto%");}
    public function scopeNam($query,$nam){return $query->where('name','LIKE',"%$nam%");}
    public function scopeCoun($query,$coun){return $query->where('country','LIKE',"%$coun%");}
    public function scopeAre($query,$are){return $query->where('area','LIKE',"%$are%");}
    public function scopeSeg($query,$seg){return $query->where('segmento','LIKE',"%$seg%");}
    public function scopeCha($query,$cha){return $query->where('channel','LIKE',"%$cha%");}
    public function scopeClu($query,$clu){return $query->where('store_cluster','LIKE',"%$clu%");}
    public function scopeConce($query,$conce){return $query->where('storeconcept','LIKE',"%$conce%");}
    public function scopeFur($query,$fur){return $query->where('furniture_type','LIKE',"%$fur%");}
    public function scopeUbi($query,$ubi){return $query->where('ubicacion','LIKE',"%$ubi%");}
    public function scopeMob($query,$mob){if($mob) return $query->where('mobiliario','LIKE',"%$mob%");}
    public function scopeCart($query,$cart){if($cart) return $query->where('carteleria','LIKE',"%$cart%");}
    public function scopeMat($query,$mat){if($mat) return $query->where('material','LIKE',"%$mat%");}
    public function scopeMed($query,$med){if($med) return $query->where('medida','LIKE',"%$med%");}
    public function scopePropx($query,$propx){if($propx)return $query->where('propxelemento','LIKE',"%$propx%");}


    static function scopeCampaignTiendas($query, $campaign){
        return $query
            ->whereIn('store', function ($query) use ($campaign) {
                $query->select('store_id')->from('campaign_stores')->where('campaign_id', '=', $campaign);})
            ->whereIn('segmento', function ($query) use ($campaign) {
                $query->select('segmento')->from('campaign_segmentos')->where('campaign_id', '=', $campaign);})
            ->whereIn('ubicacion', function ($query) use ($campaign) {
                $query->select('ubicacion')->from('campaign_ubicacions')->where('campaign_id', '=', $campaign);})
            ->whereIn('mobiliario', function ($query) use ($campaign) {
                $query->select('mobiliario')->from('campaign_mobiliarios')->where('campaign_id', '=', $campaign);})
            ->whereIn('medida', function ($query) use ($campaign) {
                $query->select('medida')->from('campaign_medidas')->where('campaign_id', '=', $campaign);})
            ->select('maestros.store as store')
            ->groupBy('maestros.store');
    }

    static function scopeCampaignElementos($query, $campaign, $tienda){
        return $query
        ->where('store',$tienda)
        ->whereIn('ubicacion', function ($query) use ($campaign) {
            $query->select('ubicacion')->from('campaign_ubicacions')->where('campaign_id', '=', $campaign);})
        ->whereIn('mobiliario', function ($query) use ($campaign) {
            $query->select('mobiliario')->from('campaign_mobiliarios')->where('campaign_id', '=', $campaign);})
        ->whereIn('medida', function ($query) use ($campaign) {
            $query->select('medida')->from('campaign_medidas')->where('campaign_id', '=', $campaign);})
        ->select('maestros.store','maestros.country','maestros.name','maestros.area','maestros.segmento','maestros.storeconcept',
            'maestros.ubicacion','maestros.mobiliario','maestros.propxelemento','maestros.carteleria','maestros.medida','maestros.material',
            'maestros.unitxprop','maestros.observaciones', DB::raw($campaign.' as campaign_id'));
        }


        static function insertStores(){
        $stores=Maestro::select('store','name','country','area','segmento','storeconcept')
        ->groupBy('store','name','country','area','segmento','storeconcept')
        ->get();
        foreach (array_chunk($stores->toArray(),100) as $t){
            $dataSet = [];
            foreach ($t as $store) {
                if ($store['country']=='PT'){$zona='PT';
                }else{
                    if($store['area']=='Canarias')$zona='CN';
                    else $zona='ES';
                }
            $idioma=$store['area']=='Cataluña' ? 'CAT' : $store['country'];
            $conceptoId=Storeconcept::where('storeconcept',$store['storeconcept'])->first();
            $areaId=Area::where('area',$store['area'])->first();

            Store::firstOrCreate([
                'id' => $store['store']
            ], [
                'name'=>$store['name'],
                'country'=>$store['country'],
                'zona'=>$zona,
                'area_id'=>$areaId->id,
                'area'=>$store['area'],
                'idioma'=>$idioma,
                'segmento'=>$store['segmento'],
                'concepto_id'=>$conceptoId->id,
                'concepto'=>$store['storeconcept'],
                'imagen'=>$store['store'].'.jpg'
            ]);}
        }
        unset($dataSet);
        unset($stores);
        return true;
    }

    static function insertElementos(){
        $elementos=Maestro::select(
            'elementificador','ubicacion','mobiliario',
            'propxelemento','carteleria','medida','material',
            'unitxprop','observaciones')
            ->distinct('elementificador')
            ->get();

        foreach (array_chunk($elementos->toArray(),100) as $t){
            $dataSet = [];
            foreach ($t as $elemento) {
                $e=Elemento::where('elementificador',$elemento['elementificador'])->count();
                dd($e);
                if($e=='0')
                    $dataSet[] = [
                        'elementificador'=>$elemento['elementificador'],
                        'ubicacion_id'=>Ubicacion::where('ubicacion',$elemento['ubicacion'])->first()['id'],
                        'ubicacion'=>$elemento['ubicacion'],
                        'mobiliario_id'=>Mobiliario::where('mobiliario',$elemento['mobiliario'])->first()['id'],
                        'mobiliario'=>$elemento['mobiliario'],
                        'propxelemento_id'=>Propxelemento::where('propxelemento',$elemento['propxelemento'])->first()['id'],
                        'propxelemento'=>$elemento['propxelemento'],
                        'carteleria_id'=>Carteleria::where('carteleria',$elemento['carteleria'])->first()['id'],
                        'carteleria'=>$elemento['carteleria'],
                        'medida_id'=>Medida::where('medida',$elemento['medida'])->first()['id'],
                        'medida'=>$elemento['medida'],
                        'material_id'=>Material::where('material',$elemento['material'])->first()['id'],
                        'material'=>$elemento['material'],
                        'unitxprop'=>$elemento['unitxprop'],
                        'observaciones'=>$elemento['observaciones'],
                    ];
            }
            DB::table('elementos')->insert($dataSet);
        }

        unset($dataSet);
        unset($elementos);

        return true;
    }

    static function insertStoresSGH(){
        $stores=Maestro::select('store','name','country','area','segmento','storeconcept','channel','store_cluster','furniture_type')
        ->groupBy('store','name','country','area','segmento','storeconcept','channel','store_cluster','furniture_type')
        ->get();

        foreach (array_chunk($stores->toArray(),100) as $t){
            $dataSet = [];
            foreach ($t as $store) {
                if ($store['country']=='PT') $zona='PT';
                else{
                    if($store['area']=='Canarias') $zona='CN';
                    else $zona='ES';
                }

                $idioma=$store['area']=='Cataluña' ? 'CAT' : $store['country'];

                $conceptoId=Storeconcept::where('storeconcept',$store['storeconcept'])->first();
                $areaId=Area::where('area',$store['area'])->first();

                Store::updateOrCreate([
                    'id' => $store['store']
                ], [
                    'name'=>$store['name'],
                    'country'=>$store['country'],
                    'zona'=>$zona,
                    'area_id'=>$areaId->id,
                    'area'=>$store['area'],
                    'idioma'=>$idioma,
                    'segmento'=>$store['segmento'],
                    'concepto_id'=>$conceptoId->id,
                    'concepto'=>$store['storeconcept'],
                    'channel'=>$store['channel'],
                    'store_cluster'=>$store['store_cluster'],
                    'furniture_type'=>$store['furniture_type'],
                    'imagen'=>$store['store'].'.jpg'
                ]);
            }
        }
        unset($dataSet);
        unset($stores);

        return true;
    }

    static function insertElementosSGH(){

        $elementostemp=Maestro::select('elementificador','ubicacion','mobiliario','propxelemento','carteleria','medida','material','matmed','unitxprop','observaciones')->get();

        foreach (array_chunk($elementostemp->toArray(), 100) as $t) {
            $dataSet = [];
            foreach ($t as $elemento) {
                $familia=TarifaFamilia::where('matmed', $elemento['matmed'])->first()->tarifa_id;
                $dataSet[] = [
                    'elementificador'=>$elemento['elementificador'],
                    'ubicacion_id'=>Ubicacion::where('ubicacion', $elemento['ubicacion'])->first()['id'],
                    'ubicacion'=>$elemento['ubicacion'],
                    'mobiliario_id'=>Mobiliario::where('mobiliario', $elemento['mobiliario'])->first()['id'],
                    'mobiliario'=>$elemento['mobiliario'],
                    'propxelemento_id'=>Propxelemento::where('propxelemento', $elemento['propxelemento'])->first()['id'],
                    'propxelemento'=>$elemento['propxelemento'],
                    'carteleria_id'=>Carteleria::where('carteleria', $elemento['carteleria'])->first()['id'],
                    'carteleria'=>$elemento['carteleria'],
                    'medida_id'=>Medida::where('medida', $elemento['medida'])->first()['id'],
                    'medida'=>$elemento['medida'],
                    'material_id'=>Material::where('material', $elemento['material'])->first()['id'],
                    'material'=>$elemento['material'],
                    'unitxprop'=>$elemento['unitxprop'],
                    'familia_id'=>$familia,
                    'matmed'=>$elemento['matmed'],
                    'observaciones'=>$elemento['observaciones'],
                    ];
            }
            DB::table('elementos_temp')->insert($dataSet);
        }

        unset($dataSet);

        $elementos=DB::table('elementos_temp')->distinct()->get();

        foreach($elementos as $elemen){
            $el=Elemento::updateOrCreate([
                'elementificador'=>$elemen->elementificador
            ],[
                'elementificador'=>$elemen->elementificador,
                'ubicacion_id'=>$elemen->ubicacion_id,
                'ubicacion'=>$elemen->ubicacion,
                'mobiliario_id'=>$elemen->mobiliario_id,
                'mobiliario'=>$elemen->mobiliario,
                'propxelemento_id'=>$elemen->propxelemento_id,
                'propxelemento'=>$elemen->propxelemento,
                'carteleria_id'=>$elemen->carteleria_id,
                'carteleria'=>$elemen->carteleria,
                'medida_id'=>$elemen->medida_id,
                'medida'=>$elemen->medida,
                'material_id'=>$elemen->material_id,
                'material'=>$elemen->material,
                'unitxprop'=>$elemen->unitxprop,
                'familia_id'=>$elemen->familia_id,
                'matmed'=>$elemen->matmed,
                'observaciones'=>$elemen->observaciones,
            ]);

        }
        // foreach (array_chunk($e->toArray(),100) as $t){
        //     $dataSet = [];
        //     foreach ($t as $elemento) {
        //         $dataSet[] = [
        //             'elementificador'=>$elemento->elementificador,
        //             'ubicacion_id'=>$elemento->ubicacion_id,
        //             'ubicacion'=>$elemento->ubicacion,
        //             'mobiliario_id'=>$elemento->mobiliario_id,
        //             'mobiliario'=>$elemento->mobiliario,
        //             'propxelemento_id'=>$elemento->propxelemento_id,
        //             'propxelemento'=>$elemento->propxelemento,
        //             'carteleria_id'=>$elemento->carteleria_id,
        //             'carteleria'=>$elemento->carteleria,
        //             'medida_id'=>$elemento->medida_id,
        //             'medida'=>$elemento->medida,
        //             'material_id'=>$elemento->material_id,
        //             'material'=>$elemento->material,
        //             'unitxprop'=>$elemento->unitxprop,
        //             'familia_id'=>$elemento->familia_id,
        //             'matmed'=>$elemento->matmed,
        //             'observaciones'=>$elemento->observaciones,
        //         ];
        //     }
        //     DB::table('elementos')->insert($dataSet);
        // }
        unset($dataSet);
        unset($elementos);

        return true;
    }

    static function insertStoreElementos(){
        // dd(Maestro::get()->count());
        Maestro::chunk(100, function ($maestros) {
            $dataSet = [];
            foreach ($maestros as $elemento) {
                // $existe=StoreElemento::where('store_id',$elemento['store'])->where('elementificador',$elemento['elementificador'])->count();
                // if($existe==0){
                    $dataSet[] = [
                    'store_id'=>$elemento['store'],
                    'elemento_id'=>Elemento::where('elementificador',$elemento['elementificador'])->first()['id'],
                    'elementificador'=>$elemento['elementificador'],
                    ];
                // };
            }
            DB::table('store_elementos')->insertOrIgnore($dataSet);
        });
        unset($dataSet);
        unset($maestros);

    }
}
