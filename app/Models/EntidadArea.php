<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntidadArea extends Model
{
    use HasFactory;

    use HasFactory;
    protected $fillable=['entidad_id','area_id','observaciones'];

    public function entidad(){ return $this->belongsTo(Entidad::class);}
    public function area(){ return $this->belongsTo(Area::class,'area_id');}

}
