<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    // public $timestamps = false;
    protected $fillable=['campaign_name','campaign_initdate','campaign_enddate','slug'];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
