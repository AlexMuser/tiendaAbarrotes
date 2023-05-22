<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Detalle_ventas;
use App\Models\Ventas;
use App\Models\Productos;

class Detalle_ventasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalle_ventas = Detalle_ventas::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Detalle_ventas.index')->with('detalle_ventas', $detalle_ventas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ventas = Ventas::where('status', 1)
                ->select('id')
                ->orderBy('id')->get();
        $productos = Productos::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Detalle_ventas.create')
                ->with('ventas',$ventas)
                ->with('productos',$productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $datos['status'] = "1";

        //dd($datos);

        Detalle_ventas::create($datos);
        return redirect('/detalle_ventas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalle_venta = Detalle_ventas::find($id);
        return view('Detalle_ventas.read')->with('detalle_venta', $detalle_venta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detalle_venta = Detalle_ventas::find($id);
        $ventas = Ventas::where('status', 1)
                ->select('id')
                ->orderBy('id')->get();
        $productos = Productos::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Detalle_ventas.edit')
                ->with('detalle_venta', $detalle_venta)
                ->with('ventas',$ventas)
                ->with('productos',$productos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $datos['status'] = "1";

        //dd($datos);

        $detalle_venta = Detalle_ventas::find($id);

        $detalle_venta->update($datos);
        
        return redirect('/detalle_ventas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalle_venta = Detalle_ventas::find($id);
        $detalle_venta->status = 0;
        $detalle_venta->save();
        return redirect('/detalle_ventas');
    }
}
