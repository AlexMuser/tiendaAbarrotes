<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiendas extends Model
{
    protected $table = 'tiendas';

    protected $fillable = ['nombre','ubicacion','status', 'id_pais', 'id_municipio', 'id_entidad'];

    public function paises()
    {
        return $this->belongsTo('App\Models\Paises', 'id_pais', 'id');
    }

    public function municipios()
    {
        return $this->belongsTo('App\Models\Municipios', 'id_municipio', 'id');
    }

    public function entidades()
    {
        return $this->belongsTo('App\Models\Entidades', 'id_entidad', 'id');
    }
}