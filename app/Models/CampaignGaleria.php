<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignGaleria extends Model
{
    use HasFactory;

    protected $fillable=['campaign_id','elemento','imagen','observaciones'];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    public function getImagenUrlAttribute()
    {
        return $this->imagen ? 'storage/galeria/' . $this->imagen : 'pordefecto.jpg';
    }

    public function scopeSearch2($query, $busca)
    {
      return $query->where('mobiliario', 'LIKE', "%$busca%")
      ->orWhere('carteleria', 'LIKE', "%$busca%")
      ->orWhere('medida', 'LIKE', "%$busca%")
      ->orWhere('eci', 'LIKE', "%$busca%")
      ->orWhere('observaciones', 'LIKE', "%$busca%")
      ;
    }
}
