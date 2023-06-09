<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores';

    protected $fillable = ['nombre','telefono','dia_visita','status','id_tienda'];

    public function tiendas(){
        return $this->belongsTo('App\Models\Tiendas', 'id_tienda', 'id');
    }
}
