<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CampaignPresupuesto extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable=['campaign_id','referencia','fecha','version','atencion','total','observaciones','estado'];

    protected $dates = ['fecha'];

    public function scopeSearch2($query, $busca)
    {
        return $query->where('referencia', 'LIKE', "%$busca%")
            ->orWhere('fecha', 'LIKE', "%$busca%")
            ->orWhere('atencion', 'LIKE', "%$busca%")
            ->orWhere('observaciones', 'LIKE', "%$busca%")
            ->orWhere('estado', 'LIKE', "%$busca%")
            ;
    }


    public function campaign(){
    return $this->belongsTo(Campaign::class);
    }

    public function extras(){
        return $this->hasMany(CampaignPresupuestoExtra::class);
    }

    public function getStatusAttribute(){
        return [
            '0'=>['text-blue-500','Creado'],
            '1'=>['text-yellow-500','Iniciado'],
            '2'=>['text-green-500','Aceptado'],
            '3'=>['text-red-500','Rechazado']
        ][$this->estado] ?? ['text-gray-100','Desconocido'];
    }

    public function getFechapreAttribute()
    {
        if ($this->fecha) {
            return Carbon::parse($this->fecha)->format('d/m/Y');
        } else {
            return '';
        }
    }

    public function getFechaprestrAttribute()
    {
        if ($this->fecha) {
            return Carbon::parse($this->fecha)->format('Y-m-d');
        } else {
            return '';
        }
    }
}
