<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    use HasFactory;
    protected $table = 'peticiones';
    protected $fillable=['peticion','fecha','total','observaciones','estado'];

    public function peticiondetalles(){return $this->hasMany(PeticionDetalle::class,'peticion_id');}



}
