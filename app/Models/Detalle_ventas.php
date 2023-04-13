<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_ventas extends Model
{
    protected $table = 'detalle_ventas';

    protected $fillable = ['cantidad','precio_compra','precio_venta','status'];

    public function ventas(){
        return $this->belongsTo('App\Models\Ventas', 'id_venta', 'id');
    }

    public function productos(){
        return $this->belongsTo('App\Models\Productos', 'id_producto', 'id');
    }
}