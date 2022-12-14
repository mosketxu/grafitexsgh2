<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignPresupuestoPickingtransporte extends Model
{
    use HasFactory;

    protected $table = "campaign_presupuesto_pickingtransportes";
    protected $fillable=['presupuesto_id','zona','picking','transporte','stores'];

    public function campaignpresupuesto(){
        return $this->belongsTo(CampaignPresupuesto::class);
    }
}
