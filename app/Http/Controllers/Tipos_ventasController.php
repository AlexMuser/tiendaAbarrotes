<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tipos_ventas;

class Tipos_ventasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_ventas = Tipos_ventas::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Tipos_ventas.index')->with('tipos_ventas', $tipos_ventas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tipos_ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $validatedData = $request->validate([
            'nombre' => 'required|unique:tipos_ventas,nombre,NULL,id,status,1',
        ], [
            'nombre.unique' => 'El tipo de venta ya se encuentra registrado',
        ]);

        $datos['status'] = "1";

        Tipos_ventas::create($datos);
        return redirect('/tipos_ventas');
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
        $tipo_venta = Tipos_ventas::find($id);
        
        return view('tipos_ventas.edit')
               ->with('tipo_venta', $tipo_venta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $validatedData = $request->validate([
            'nombre' => 'required|unique:tipos_ventas,nombre,NULL,id,status,1',
        ], [
            'nombre.unique' => 'El tipo de venta ya se encuentra registrado',
        ]);

        $datos['status'] = "1";

        $tipo_venta = Tipos_ventas::find($id);

        $tipo_venta->update($datos);

        return redirect('/tipos_ventas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo_venta = Tipos_ventas::find($id);
        $tipo_venta->status = 0;
        $tipo_venta->save();
        return redirect('/tipos_ventas');
    }
}
