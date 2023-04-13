<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $table = 'compras';

    protected $fillable = ['fecha','total','status'];

    public function tiendas(){
        return $this->belongsTo('App\Models\Tiendas', 'id_tienda', 'id');
    }

    public function proveedores(){
        return $this->belongsTo('App\Models\Proveedores', 'id_proveedor', 'id');
    }

    public function usuarios(){
        return $this->belongsTo('App\Models\Usuarios', 'id_usuario', 'id');
    }
}
