<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table = 'ventas';

    protected $fillable = ['fecha','total','total_pagado','status','id_cliente','id_tipo_pago','id_usuario', 'id_tienda'];

    public function clientes(){
        return $this->belongsTo('App\Models\Clientes', 'id_cliente', 'id');
    }

    public function tipos_pagos(){
        return $this->belongsTo('App\Models\Tipos_pagos', 'id_tipo_pago', 'id');
    }

    public function usuarios(){
        return $this->belongsTo('App\Models\Usuarios', 'id_usuario', 'id');
    }

    public function tiendas(){
        return $this->belongsTo('App\Models\Tiendas', 'id_tienda', 'id');
    }
}
