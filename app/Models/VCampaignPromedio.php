<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VCampaignPromedio extends Model
{
    use HasFactory;

    protected $table = "v_campaign_promedios";

    public function campaign(){
        return $this->belongsTo(Campaign::class,'campaign_id');
    }
}
