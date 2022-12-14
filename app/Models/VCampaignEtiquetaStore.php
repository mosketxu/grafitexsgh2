<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VCampaignEtiquetaStore extends Model
{
    use HasFactory;

    protected $table = "v_campaign_etiqueta_stores";

    public function campaignetiquetaelemento(){
        return $this->hasMany(CampaignEtiquetaElemento::class);
    }
}
