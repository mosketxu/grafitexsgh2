<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignMedida extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','medida_id','medida'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
