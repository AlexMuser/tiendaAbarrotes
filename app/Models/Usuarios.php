<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';

    protected $fillable = ['nombre','ap_pat','ap_mat','email','telefono','direccion','username','password','status'];

    public function tiendas(){
        return $this->belongsTo('App\Models\Tiendas', 'id_tienda', 'id');
    }

    public function tipo_usuarios(){
        return $this->belongsTo('App\Models\Tipo_usuarios', 'id_tipo_usu', 'id');
    }
}
