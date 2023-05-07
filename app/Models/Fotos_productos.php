<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos_productos extends Model
{
    protected $table = 'fotos_productos';

    protected $fillable = ['ruta','status','id_producto'];

    public function productos(){
        return $this->belongsTo('App\Models\Productos', 'id_producto', 'id');
    }
}
