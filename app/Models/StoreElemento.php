<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreElemento extends Model
{
    use HasFactory;
    protected $fillable=['id','elemento_id','store_id','elementificador'];

    public function elemento(){return $this->belongsTo(Elemento::class,'elemento_id');}
    public function store(){return $this->belongsTo(Store::class,'store_id');}

    public function scopeSearch2($query, $busca){
        return $query->where('store_id', 'LIKE', "%$busca%")
        ->orWhere('name', 'LIKE', "%$busca%")
        ->orWhere('country', 'LIKE', "%$busca%")
        ->orWhere('zona', 'LIKE', "%$busca%")
        ->orWhere('area', 'LIKE', "%$busca%")
        ->orWhere('segmento', 'LIKE', "%$busca%")
        ->orWhere('idioma', 'LIKE', "%$busca%")
        ->orWhere('concepto', 'LIKE', "%$busca%")
        ->orWhere('ubicacion', 'LIKE', "%$busca%")
        ->orWhere('mobiliario', 'LIKE', "%$busca%")
        ->orWhere('carteleria', 'LIKE', "%$busca%")
        ->orWhere('medida', 'LIKE', "%$busca%")
        ->orWhere('material', 'LIKE', "%$busca%")
        ->orWhere('propxelemento', 'LIKE', "%$busca%")
        ;
    }

    public function scopeCampstosto($query,$campaignId){
        if (CampaignStore::where('campaign_id',$campaignId)->count()>0){
            return $query->whereIn('store_id',function($q) use($campaignId){
                $q->select('store_id')->from('campaign_stores')->where('campaign_id',$campaignId);
            });}
    }

    public function scopeCampstoseg($query,$campaignId){
        if (CampaignSegmento::where('campaign_id',$campaignId)->count()>0){
            return $query->whereIn('segmento',function($q) use($campaignId){
                $q->select('segmento')->from('campaign_segmentos')->where('campaign_id',$campaignId);
        });}
    }

    public function scopeCampstoidiom($query,$campaignId){
        if (CampaignIdioma::where('campaign_id',$campaignId)->count()>0){
            return $query->whereIn('idioma',function($q) use($campaignId){
                $q->select('idioma')->from('campaign_idiomas')->where('campaign_id',$campaignId);
            });}
    }

    public function scopeCampstoubi($query,$campaignId){
        if (CampaignUbicacion::where('campaign_id',$campaignId)->count()>0){
            return $query->whereIn('ubicacion',function($q) use($campaignId){
                $q->select('ubicacion')->from('campaign_ubicacions')->where('campaign_id',$campaignId);
            });}
    }

    public function scopeCampstomob($query,$campaignId){
        if (CampaignMobiliario::where('campaign_id',$campaignId)->count()>0){
            return $query->whereIn('mobiliario',function($q) use($campaignId){
                $q->select('mobiliario')->from('campaign_mobiliarios')->where('campaign_id',$campaignId);
            });}
    }

    public function scopeCampstomed($query,$campaignId){
        if (CampaignMedida::where('campaign_id',$campaignId)->count()>0){
            return $query->whereIn('medida',function($q) use($campaignId){
                $q->select('medida')->from('campaign_medidas')->where('campaign_id',$campaignId);
            });}
    }
}
