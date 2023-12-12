<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontajeProporcion extends Model
{
    use HasFactory;

    protected $table = "montaje_proporciones";

    protected $fillable=['montajeproporcion'];

}
