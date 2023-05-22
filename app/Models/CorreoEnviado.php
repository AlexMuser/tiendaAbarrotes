<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\CorreoEnviado;

class CorreoEnviado extends Model
{
    protected $table = 'correos_enviados';
    protected $fillable = ['correo_electronico', 'asunto', 'mensaje'];
}
