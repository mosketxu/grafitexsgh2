<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignMobiliario extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','mobiliario_id','mobiliario'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
