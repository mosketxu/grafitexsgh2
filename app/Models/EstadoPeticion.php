<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPeticion extends Model
{
    use HasFactory;

    protected $table = 'estados_peticion';
    protected $fillable=['estadopeticion','validador'];

    public function peticion(){ return $this->belongsTo(Peticion::class);}

}
