<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCarteleria extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','carteleria_id','carteleria'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
