<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mermas extends Model
{
    protected $table = 'mermas';

    protected $fillable = ['fecha','total','status', 'id_tienda', 'id_usuario'];

    public function tiendas(){
        return $this->belongsTo('App\Models\Tiendas', 'id_tienda', 'id');
    }

    public function usuarios(){
        return $this->belongsTo('App\Models\Usuarios', 'id_usuario', 'id');
    }
}
