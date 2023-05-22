<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Detalle_compras;
use App\Models\Compras;
use App\Models\Productos;

class Detalle_comprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalle_compras = Detalle_compras::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Detalle_compras.index')->with('detalle_compras', $detalle_compras);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $compras = Compras::where('status', 1)
                ->select('id')
                ->orderBy('id')->get();
        $productos = Productos::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Detalle_compras.create')
                ->with('compras',$compras)
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

        Detalle_compras::create($datos);
        return redirect('/detalle_compras');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalle_compra = Detalle_compras::find($id);
        return view('Detalle_compras.read')->with('detalle_compra', $detalle_compra);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detalle_compra = Detalle_compras::find($id);
        $compras = Compras::where('status', 1)
                ->select('id')
                ->orderBy('id')->get();
        $productos = Productos::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Detalle_compras.edit')
                ->with('detalle_compra', $detalle_compra)
                ->with('compras',$compras)
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

        $detalle_compra = Detalle_compras::find($id);

        $detalle_compra->update($datos);
        
        return redirect('/detalle_compras');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalle_compra = Detalle_compras::find($id);
        $detalle_compra->status = 0;
        $detalle_compra->save();
        return redirect('/detalle_compras');
    }
}
