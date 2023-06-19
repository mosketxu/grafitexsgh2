<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignIdioma extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable=['id','campaign_id','idioma'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
