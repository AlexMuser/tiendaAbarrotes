<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_compras extends Model
{
    protected $table = 'detalle_compras';

    protected $fillable = ['cantidad','precio_compra','precio_venta','status', 'id_compra', 'id_producto'];

    public function compras(){
        return $this->belongsTo('App\Models\Compras', 'id_compra', 'id');
    }

    public function productos(){
        return $this->belongsTo('App\Models\Productos', 'id_producto', 'id');
    }
}
