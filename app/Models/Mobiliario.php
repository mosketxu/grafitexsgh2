<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobiliario extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['mobiliario'];

    public function elementos()
    {
        return $this->hasMany(Elemento::class);
    }
}
