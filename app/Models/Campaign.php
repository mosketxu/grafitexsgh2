<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['area'];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
