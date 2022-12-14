<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignSegmento extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','segmento_id','segmento'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
