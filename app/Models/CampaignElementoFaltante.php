<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignElementoFaltante extends Model
{
    use HasFactory;

    protected $fillable=['campaigntienda_id', 'elementofaltante','cantidad','observaciones'];

    public function tienda(){return $this->belongsTo(CampaignTienda ::class,'campaigntienda_id');}
}
