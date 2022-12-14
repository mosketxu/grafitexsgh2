<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "countries";
    protected $fillable=['id','country'];

    public function countries()
    {
        return $this->hasMany(CampaignCountry::class);
    }
}
