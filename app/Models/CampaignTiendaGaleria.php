<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignTiendaGaleria extends Model
{
    use HasFactory;

    protected $fillable=['campaigntienda_id','imagen','observaciones'];

    public function campaigntienda(){return $this->belongsTo(CampaignTienda::class);}


}
