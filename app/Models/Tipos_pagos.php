<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipos_pagos extends Model
{
    protected $table = 'tipos_pagos';

    protected $fillable = ['nombre','status'];
}
