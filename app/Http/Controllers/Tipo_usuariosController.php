<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tipo_usuarios;

class Tipo_usuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipo_usuarios = Tipo_usuarios::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Tipo_usuarios.index')->with('tipo_usuarios', $tipo_usuarios);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tipo_usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $validatedData = $request->validate([
            'nombre' => 'required|unique:tipo_usuarios,nombre,NULL,id,status,1',
        ], [
            'nombre.unique' => 'El tipo de usuario ya se encuentra registrado',
        ]);

        $datos['status'] = "1";

        Tipo_usuarios::create($datos);
        return redirect('/tipo_usuarios');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipo_usuario = Tipo_usuarios::find($id);
        return view('Tipo_usuarios.read')->with('tipo_usuario', $tipo_usuario);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo_usuario = Tipo_usuarios::find($id);
        
        return view('tipo_usuarios.edit')
               ->with('tipo_usuario', $tipo_usuario);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $datos['status'] = "1";

        $tipo_usuario = Tipo_usuarios::find($id);

        $tipo_usuario->update($datos);

        return redirect('/tipo_usuarios');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo_usuario = Tipo_usuarios::find($id);
        $tipo_usuario->status = 0;
        $tipo_usuario->save();
        return redirect('/tipo_usuarios');
    }
}
