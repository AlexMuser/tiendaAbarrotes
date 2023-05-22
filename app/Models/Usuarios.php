<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

use App\Models\Usuarios;

class Usuarios extends Model implements Authenticatable
{
    use HasFactory;

    // Métodos requeridos por la interfaz Authenticatable
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    // Resto del código de la clase Usuarios
    protected $table = 'usuarios';

    protected $fillable = ['nombre','ap_pat','ap_mat','email','telefono','direccion','username','password','status','id_tienda','id_tipo_usu'];

    public function tiendas(){
        return $this->belongsTo('App\Models\Tiendas', 'id_tienda', 'id');
    }

    public function tipo_usuarios(){
        return $this->belongsTo('App\Models\Tipo_usuarios', 'id_tipo_usu', 'id');
    }
}