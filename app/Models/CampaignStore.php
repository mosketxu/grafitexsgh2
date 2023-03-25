<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignStore extends Model
{
    use HasFactory;

    // protected $fillable=['campaign_id','store_id','store','montador_id','fechainiprev','fechafinprev','fechainimontador','fechafinmontador','fechafinmontador','observacionesmontador'];
    protected $fillable=['campaign_id','store_id','store'];


    public function campaign(){return $this->belongsTo(Campaign::class);}
    // public function montador(){return $this->hasOne(Entidad::class,'id','montador_id');}
    public function Store(){return $this->hasOne(Store::class,'id','store_id');}


    static function getStore($campaignId,$store){
        return CampaignStore::where('campaign_id',$campaignId)
            ->where('store_id',$store)
            ->first();
    }
}
