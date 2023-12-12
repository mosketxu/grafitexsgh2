<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MontajeMaterial extends Model
{
    use HasFactory;
    protected $table = "montaje_materiales";

    protected $fillable=['montajematerial'];


}
