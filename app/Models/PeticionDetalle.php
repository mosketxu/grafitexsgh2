<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeticionDetalle extends Model
{
    use HasFactory;

    protected $fillable=['peticion_id','producto_id','comentario','unidades','preciounidad','total','observaciones'];

    public function peticion(){return $this->belongsTo(PeticionDetalle::class,'peticion_id');}

    public function producto(){return $this->belongsTo(Producto::class,'producto_id');}

}
