<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storeconcept extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['storeconcept'];

    public function stores()
    {
        return $this->hasMany(Store::class);
    }
}
