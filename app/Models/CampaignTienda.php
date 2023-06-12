<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignTienda extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','store_id',
        'montador_id','fechaprev1','fechaprev2','fechaprev3','montaje1','montaje2','montaje3','preciomontador','pedidocliente',
        'fechamontador1','fechamontador2','fechamontador3','observacionesmontador',
        'estadomontaje'];

    public function campaign(){return $this->belongsTo(Campaign::class, 'campaign_id');}
    public function tienda(){return $this->belongsTo(Store::class, 'store_id');}
    public function montador(){ return $this->belongsTo(Entidad::class, 'montador_id');}
    public function elementos(){return $this->hasMany(CampaignElemento::class, 'tienda_id');}
    public function galeria(){return $this->hasMany(CampaignTiendaGaleria::class, 'campaigntienda_id', 'id');}

    protected function getElementosCountAttribute($value){return $value ?? $this->elementos_count = $this->elementos()->count();}
    protected function getElementosokCountAttribute($value){return $value ?? $this->elementos_count = $this->elementos()->count('OK','1');}
    protected function getElementoskoCountAttribute($value){return $value ?? $this->elementos_count = $this->elementos()->count('KO','1');}

    // SCOPES
    public function scopeSearch2($query, $busca){
        return $query->join('campaigns', 'campaigns.id', 'campaign_tiendas.campaign_id')
        ->where('campaign_name', 'LIKE', "%$busca%");
    }

    public function scopeStore($query, $campaignid){
        return $query->join('stores', 'store.id', 'store_id')
        ->where('campaign_id', $campaignid)
        ;
    }

    public function scopeStoreElemento($query, $campaignid){
        return $query->join('stores', 'stores.id', 'store_id')
        ->join('campaign_elementos', 'campaign_tiendas.id', 'tienda_id')
        ->where('campaign_id', $campaignid)
        ;
    }

    public function getMonta1Attribute(){return ['D'=>'Desmontaje','M'=>'Montaje',][$this->montaje1] ?? '';}
    public function getMonta2Attribute(){return ['D'=>'Desmontaje','M'=>'Montaje',][$this->montaje2] ?? '';}
    public function getMonta3Attribute(){return ['D'=>'Desmontaje','M'=>'Montaje',][$this->montaje3] ?? '';}

    public function getEstadomontaAttribute(){
        return [
            '0'=>'Sin Iniciar',
            '1'=>'En Curso',
            '2'=>'Finalizada',
            ][$this->estadomontaje] ?? 'Sin Iniciar';}
        }
