<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignPresupuestoDetalle extends Model
{
    use HasFactory;

    protected $table = "campaign_presupuesto_detalles";
    protected $fillable=['presupuesto_id','concepto','preciounidad','unidades','total','observaciones'];

    public function campaignpresupuesto(){
        return $this->belongsTo(CampaignPresupuesto::class);
    }

    public function tarifa(){
        return $this->belongsTo(Tarifa::class,'familia');
    }
}
