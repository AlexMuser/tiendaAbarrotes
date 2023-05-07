<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tiendas;

class TiendasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiendas = Tiendas::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Tiendas.index')->with('tiendas', $tiendas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tiendas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $validatedData = $request->validate([
            'nombre' => 'required|unique:tiendas,nombre,NULL,id,status,1',
        ], [
            'nombre.unique' => 'El tipo de usuario ya se encuentra registrado',
        ]);

        $datos['status'] = "1";

        Tiendas::create($datos);
        return redirect('/tiendas');
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
        $tienda = Tiendas::find($id);
        
        return view('tiendas.edit')
               ->with('tienda', $tienda);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $datos['status'] = "1";

        $tienda = Tiendas::find($id);

        $tienda->update($datos);

        return redirect('/tiendas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tienda = Tiendas::find($id);
        $tienda->status = 0;
        $tienda->save();
        return redirect('/tiendas');
    }
}
