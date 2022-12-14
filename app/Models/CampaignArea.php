<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignArea extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','area_id','area'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
