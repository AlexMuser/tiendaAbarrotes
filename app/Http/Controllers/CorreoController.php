<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use App\Models\CorreoEnviado;

class CorreoController extends Controller
{
    public function formulario_correo(){
        return view("Correo.form_mail");
    }

    public function enviar(Request $request){
        $destinatario=$request->input("destinatario");
        $asunto=$request->input("asunto");
        $contenido=$request->input("contenido_mail");

        $data = array('contenido' => $contenido);

        $r = Mail::send(
            'Correo.plantilla_correo', $data, function ($message) use ($asunto, $destinatario)
            {
                $message->from('nortegaa@toluca.tecnm.mx', 'ALU Noel Jenaro');
                $message->to($destinatario)->subject($asunto);
            }
        );

        if (!$r) {
            Session::flash('error', 'Error al enviar el correo electrónico');
        } else {
            $correo_enviado = new CorreoEnviado;
            $correo_enviado->correo_electronico = $destinatario;
            $correo_enviado->asunto = $asunto;
            $correo_enviado->mensaje = $contenido;
            $correo_enviado->save(); 
            Session::flash('success', 'Correo electrónico enviado');
        }

        return redirect()->route('form_enviar_correo');
        
    }
}
