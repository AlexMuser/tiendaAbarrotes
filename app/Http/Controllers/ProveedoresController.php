<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Proveedores;
use App\Models\Tiendas;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedores::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Proveedores.index')->with('proveedores', $proveedores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiendas = Tiendas::select('id','nombre')->where('status', 1)
                  ->orderBy('nombre')->get();
        return view('Proveedores.create')
                ->with('tiendas',$tiendas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $datos['id_tienda'] = intval($datos['id_tienda']);

        $validatedData = $request->validate([
            'nombre' => 'required|unique:proveedores,nombre,NULL,id,id_tienda,'.$request->input('id_tienda').',dia_visita,'.$request->input('dia_visita'),
            'dia_visita' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes|unique:proveedores,dia_visita,NULL,id,id_tienda,'.$request->input('id_tienda').',nombre,'.$request->input('nombre'),
        ], [
            'nombre.unique' => 'Ya existe un proveedor con el mismo nombre, día de visita y tienda.',
        ]);
        

        $datos['status'] = "1";

        //dd($datos);

        Proveedores::create($datos);
        return redirect('/proveedores');
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
        $proveedor = Proveedores::find($id);
        $tiendas = Tiendas::select('id','nombre')
                  ->where('status', 1)
                  ->orderBy('nombre')->get();
        return view('Proveedores.edit')
               ->with('proveedor', $proveedor)
               ->with('tiendas',$tiendas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $datos['status'] = "1";

        $validatedData = $request->validate([
            'nombre' => 'required|unique:proveedores,nombre,NULL,id,id_tienda,'.$request->input('id_tienda').',dia_visita,'.$request->input('dia_visita'),
            'dia_visita' => 'required|in:Lunes,Martes,Miércoles,Jueves,Viernes|unique:proveedores,dia_visita,NULL,id,id_tienda,'.$request->input('id_tienda').',nombre,'.$request->input('nombre'),
        ], [
            'nombre.unique' => 'Ya existe un proveedor con el mismo nombre, día de visita y tienda.',
        ]);

        $proveedor = Proveedores::find($id);

        $proveedor->update($datos);

        return redirect('/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proveedor = Proveedores::find($id);
        $proveedor->status = 0;
        $proveedor->save();
        return redirect('/proveedores');
    }
}
