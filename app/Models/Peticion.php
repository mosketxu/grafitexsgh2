<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    use HasFactory;
    protected $table = 'peticiones';
    protected $fillable=['peticion','peticionario_id','fecha','total','observaciones','peticionestado_id'];

    public function peticiondetalles(){return $this->hasMany(PeticionDetalle::class,'peticion_id');}
    public function peticionario(){return $this->belongsTo(User::class,'peticionario_id');}
    public function estado(){return $this->hasOne(Peticion::class,'peticionario_id');}


}
