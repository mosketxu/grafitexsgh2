<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignUbicacion extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','ubicacion_id','ubicacion'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
