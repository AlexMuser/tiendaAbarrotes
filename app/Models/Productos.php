<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';

    protected $fillable = ['nombre','descripcion','codigo','existencia','precio_compra','precio_venta','stock','status'];

    public function tipos_ventas(){
        return $this->belongsTo('App\Models\Tipos_ventas', 'id_tipo_venta', 'id');
    }

    public function categorias(){
        return $this->belongsTo('App\Models\Categorias', 'id_categoria', 'id');
    }

    public function proveedores(){
        return $this->belongsTo('App\Models\Proveedores', 'id_proveedor', 'id');
    }

    public function tiendas(){
        return $this->belongsTo('App\Models\Tiendas', 'id_tienda', 'id');
    }
}
