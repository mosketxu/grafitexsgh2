<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreEscaparate extends Model
{
    use HasFactory;
    protected $fillable=['store_id','escaparate_id'];

    public function escaparate(){return $this->belongsTo(Escaparate::class,'escaparate_id');}
    public function store(){return $this->belongsTo(Store::class,'store_id');}



}
