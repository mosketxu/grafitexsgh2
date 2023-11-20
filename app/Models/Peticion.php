<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    use HasFactory;
    protected $table = 'peticiones';
    protected $fillable=['peticion','peticionario_id','fecha','total','observaciones','estadopeticion_id'];

    public function peticiondetalles(){return $this->hasMany(PeticionDetalle::class,'peticion_id');}
    public function peticionhistorial(){return $this->hasMany(PeticionHistorial::class,'peticion_id');}
    public function peticionario(){return $this->belongsTo(User::class,'peticionario_id');}
    public function estado(){return $this->belongsTo(EstadoPeticion::class,'estadopeticion_id','id');}

    public function getFechapreAttribute(){
        if ($this->fecha) {
            return Carbon::parse($this->fecha)->format('d/m/Y');
        } else {
            return '';
        }
    }

}
