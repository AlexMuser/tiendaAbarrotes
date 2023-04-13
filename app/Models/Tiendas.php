<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiendas extends Model
{
    protected $table = 'tiendas';

    protected $fillable = ['nombre','ubicacion','status'];
}
