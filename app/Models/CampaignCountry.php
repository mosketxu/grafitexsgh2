<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCountry extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','country_id','country'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
