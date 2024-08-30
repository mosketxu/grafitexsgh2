<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorePeticionesProducto extends Model
{
    use HasFactory;

    protected $fillable=['store_id','producto_id'];

    public function producto(){return $this->belongsTo(Producto::class);}
    public function store(){return $this->belongsTo(Store::class);}


}
