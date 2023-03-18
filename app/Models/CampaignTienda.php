<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignTienda extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','store_id',
        'proveedor_id','fechainiprev','fechafinprev','fechainimontador','fechafinmontador','observacionesmontador'];

    // protected $with=['campaign','tienda'];

    public function campaign(){return $this->belongsTo(Campaign::class,'campaign_id');}
    public function tienda(){return $this->belongsTo(Store::class,'store_id');}
    public function montador(){return $this->belongsTo(Entidad::class,'proveedor_id');}

    public function elementos(){return $this->hasMany(CampaignElemento::class,'tienda_id');}
    public function galeria(){return $this->hasMany(CampaignTiendaGaleria::class,'campaigntienda_id','id');}

    // SCOPES
    public function scopeSearch2($query, $busca){
      return $query->join('campaigns','campaigns.id','campaign_tiendas.campaign_id')
      ->where('campaign_name', 'LIKE', "%$busca%");
    }

    public function scopeStore($query, $campaignid){
      return $query->join('stores','store.id','store_id')
      ->where('campaign_id',$campaignid)
      ;
    }

    public function scopeStoreElemento($query, $campaignid){
      return $query->join('stores','stores.id','store_id')
      ->join('campaign_elementos','campaign_tiendas.id','tienda_id')
      ->where('campaign_id',$campaignid)
      ;
    }
}
