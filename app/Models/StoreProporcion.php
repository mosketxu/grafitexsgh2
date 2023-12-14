<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreProporcion extends Model
{
    use HasFactory;
    protected $table = "store_proporciones";

    protected $fillable=['store_id','proporcion_id'];

    public function proporcion(){return $this->belongsTo(MontajeProporcion::class,'proporcion_id');}
    public function store(){return $this->belongsTo(Store::class,'store_id');}
}
