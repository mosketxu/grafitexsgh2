<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignStoreconcept extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','storeconcept_id','storeconcept'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
