<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['medida'];

    public function elementos()
    {
        return $this->hasMany(Elemento::class);
    }
}
