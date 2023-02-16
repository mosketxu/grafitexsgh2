<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Entidad extends Model
{
    use HasFactory;
    protected $table = 'entidades';
    protected $fillable=['entidad','direccion','cp','localidad','provincia','pais_id','area_id',
                        'nif','tfno','emailgral','emailadm','emailaux','web',
                        'banco1','iban1','banco2','iban2',
                        'vencimientofechafactura',
                        'metodopago_id','diavencimiento','observaciones'];

    public function pais(){ return $this->belongsTo(Pais::class);}
    public function entidadarea(){return $this->belongsTo(Area::class,'area_id');}
    public function metodopago(){return $this->belongsTo(MetodoPago::class);}
    public function contactos(){return $this->hasMany(EntidadContacto::class)->withDefault(['contacto'=>'-']);}

}
