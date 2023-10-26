<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable=['producto','descripcion','precio','activo','imagen'];

    public function peticiondetales(){return $this->hasMany(PeticionDetalle::class,'producto_id');}

}
