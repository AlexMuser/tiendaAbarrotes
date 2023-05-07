<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorreoController extends Controller
{
    public function formulario_correo(){
        return view("Correo.form_mail");
    }

    public function enviar(Request $request){
        
    }
}
