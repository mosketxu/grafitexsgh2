<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propxelemento extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['propxelemento'];

    public function elementos()
    {
        return $this->hasMany(Elemento::class);
    }
}
