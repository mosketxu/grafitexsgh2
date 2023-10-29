<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeticionEstado extends Model
{
    use HasFactory;

    protected $table = 'peticiones_estado';
    protected $fillable=['peticionestado'];

    public function peticion(){ return $this->belongsTo(Peticion::class);}

}
