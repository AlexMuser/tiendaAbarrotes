<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tipos_pagos;

class Tipos_pagosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_pagos = Tipos_pagos::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Tipos_pagos.index')->with('tipos_pagos', $tipos_pagos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tipos_pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $validatedData = $request->validate([
            'nombre' => 'required|unique:tipos_pagos,nombre,NULL,id,status,1',
        ], [
            'nombre.unique' => 'El tipo de venta ya se encuentra registrado',
        ]);

        $datos['status'] = "1";

        Tipos_pagos::create($datos);
        return redirect('/tipos_pagos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tipos_pago = Tipos_pagos::find($id);
        return view('Tipos_pagos.read')->with('tipos_pago', $tipos_pago);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo_pago = Tipos_pagos::find($id);
        
        return view('tipos_pagos.edit')
               ->with('tipo_pago', $tipo_pago);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $validatedData = $request->validate([
            'nombre' => 'required|unique:tipos_pagos,nombre,NULL,id,status,1',
        ], [
            'nombre.unique' => 'El tipo de pago ya se encuentra registrado',
        ]);

        $datos['status'] = "1";

        $tipo_pago = Tipos_pagos::find($id);

        $tipo_pago->update($datos);

        return redirect('/tipos_pagos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo_pago = Tipos_pagos::find($id);
        $tipo_pago->status = 0;
        $tipo_pago->save();
        return redirect('/tipos_pagos');
    }
}
