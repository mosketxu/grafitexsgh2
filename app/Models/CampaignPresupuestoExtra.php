<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignPresupuestoExtra extends Model
{
    use HasFactory;

    protected $table = "campaign_presupuesto_extras";
    protected $fillable=['presupuesto_id','concepto','medida','zona','familia','preciounidad','unidades','total','observaciones'];

    public function campaignpresupuesto(){
        return $this->belongsTo(CampaignPresupuesto::class);
    }
}
