<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeticionHistorial extends Model
{
    use HasFactory;

    protected $table = "peticion_historial";
    protected $fillable=['peticion_id','user_id','peticionestado_id','observaciones'];

    public function usuario(){return $this->belongsTo(User::class,'user_id','id');}
    public function peticion(){return $this->belongsTo(Peticion::class);}
    public function estadohistorial(){return $this->belongsTo(EstadoPeticion::class, 'peticionestado_id','id');}

}
