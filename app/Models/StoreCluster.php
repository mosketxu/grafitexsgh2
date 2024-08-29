<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCluster extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable=['store_cluster'];
}
