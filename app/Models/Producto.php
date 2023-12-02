<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable=['producto','tiendatipo_id','descripcion','precio','activo'];

    public function peticiondetalles(){return $this->hasMany(PeticionDetalle::class,'producto_id');}
    public function tiendatipo(){return $this->belongsTo(TiendaTipo::class,'tiendatipo_id');}
    public function imagenes(){return $this->hasMany(ProductoImagen::class,'producto_id');}
    // public function imagen(){return $this->has(ProductoImagen::class,'producto_id');}

}
