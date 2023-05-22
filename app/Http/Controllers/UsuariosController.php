<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuarios;
use App\Models\Tiendas;
use App\Models\Tipo_usuarios;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuarios::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Usuarios.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiendas = Tiendas::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        $tipo_usuarios = Tipo_usuarios::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Usuarios.create')
                ->with('tiendas',$tiendas)
                ->with('tipo_usuarios',$tipo_usuarios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $datos['password'] = bcrypt($datos['password']);

        $datos['id_tienda'] = intval($datos['id_tienda']);

        $validatedData = $request->validate([
            'username' => 'required|unique:usuarios,username,NULL,id,status,1',
        ], [
            'username.unique' => 'El usuario ya se encuentra registrado',
        ]);

        $datos['status'] = "1";

        //dd($datos);

        Usuarios::create($datos);
        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuarios::find($id);
        return view('Usuarios.read')->with('usuario', $usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuarios::find($id);
        $tiendas = Tiendas::select('id','nombre')
                  ->orderBy('nombre')->get();
        $tipo_usuarios = Tipo_usuarios::select('id','nombre')
                  ->orderBy('nombre')->get();
        return view('Usuarios.edit')
               ->with('usuario', $usuario)
               ->with('tiendas',$tiendas)
               ->with('tipo_usuarios',$tipo_usuarios);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $datos['password'] = bcrypt($datos['password']);

        $datos['id_tienda'] = intval($datos['id_tienda']);

        $datos['status'] = "1";

        //dd($datos);

        $usuario = Usuarios::find($id);

        $usuario->update($datos);
        
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Borrado fisico
        //$cliente = Clientes::find($id);
        //$cliente->destroy($id);
        
        //Borrado lógico
        $usuario = Usuarios::find($id);
        $usuario->status = 0;
        $usuario->save();
        return redirect('/usuarios');
    }
}
