<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VCampaignEtiquetaElemento extends Model
{
    use HasFactory;

    protected $table = "v_campaign_etiqueta_elementos";

    public function campaignetiquetastore(){
        return $this->belongsTo(CampaignEtiquetaStore::class);
    }
}
