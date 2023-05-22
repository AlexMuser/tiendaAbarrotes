<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_mermas extends Model
{
    protected $table = 'detalle_mermas';

    protected $fillable = ['cantidad','precio_compra','precio_venta','status', 'id_merma', 'id_producto'];

    public function mermas(){
        return $this->belongsTo('App\Models\Mermas', 'id_merma', 'id');
    }

    public function productos(){
        return $this->belongsTo('App\Models\Productos', 'id_producto', 'id');
    }
}
