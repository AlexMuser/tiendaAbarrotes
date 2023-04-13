<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';

    protected $fillable = ['nombre','ap_pat','ap_mat','telefono','direccion','estadoPago','status'];

    public function tiendas(){
        return $this-> belongsTo('App\Models\Tiendas','id_tienda','id');
    }
}