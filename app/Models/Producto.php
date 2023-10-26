<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable=['producto','descripcion','precio','activo'];

    public function peticiondetales(){return $this->hasMany(PeticionDetalle::class,'producto_id');}
    public function imagenes(){return $this->hasMany(ProductoImagen::class,'producto_id');}
    // public function imagen(){return $this->has(ProductoImagen::class,'producto_id');}

}
