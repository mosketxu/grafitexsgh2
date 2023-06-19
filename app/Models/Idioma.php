<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "idiomas";
    protected $fillable=['id','idioma'];

}
