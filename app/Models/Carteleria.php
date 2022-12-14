<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carteleria extends Model
{
    public $timestamps = false;
    protected $fillable=['carteleria'];

    public function elementos()
    {
        return $this->hasMany(Elemento::class);
    }
}
