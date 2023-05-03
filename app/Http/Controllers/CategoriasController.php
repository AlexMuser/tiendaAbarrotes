<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categorias;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Categorias.index')->with('categorias', $categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $validatedData = $request->validate([
            'nombre' => 'required|unique:categorias,nombre,NULL,id,status,1',
        ], [
            'nombre.unique' => 'La categoria ya se encuentra registrada',
        ]);

        $datos['status'] = "1";

        //dd($datos);

        Categorias::create($datos);
        return redirect('/categorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categorias::find($id);
        
        return view('categorias.edit')
               ->with('categoria', $categoria);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $datos['status'] = "1";

        $categoria = Categorias::find($id);

        $categoria->update($datos);

        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categorias::find($id);
        $categoria->status = 0;
        $categoria->save();
        return redirect('/categorias');
    }
}
