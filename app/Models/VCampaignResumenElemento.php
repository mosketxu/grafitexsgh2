<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VCampaignResumenElemento extends Model
{
    use HasFactory;

    protected $table = "v_campaign_resumen_elementos";

    public function campaign(){
        return $this->belongsTo(Campaign::class,'campaign_id');
    }

    public function tarifa()
    {
        return $this->belongsTo(Tarifa::class,'familia');
    }
}
