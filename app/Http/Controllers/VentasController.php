<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ventas;
use App\Models\Clientes;
use App\Models\Tipos_pagos;
use App\Models\Usuarios;
use App\Models\Tiendas;

class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ventas = Ventas::where('status', 1)
                ->orderByDesc('fecha')
                ->get();
        $clientes = Clientes::where('status', 1)
                  ->orderBy('nombre')->get();

        return view('Ventas.index')->with('ventas', $ventas)->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Clientes::where('status', 1)
                ->select('id','nombre', 'ap_pat', 'ap_mat')
                ->orderBy('nombre')->get();
        $tipos_pagos = Tipos_pagos::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        $usuarios = Usuarios::where('status', 1)
                ->select('id','nombre', 'ap_pat', 'ap_mat')
                ->orderBy('nombre')->get();
        $tiendas = Tiendas::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Ventas.create')
                ->with('clientes',$clientes)
                ->with('tipos_pagos',$tipos_pagos)
                ->with('usuarios',$usuarios)
                ->with('tiendas',$tiendas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $datos['status'] = "1";

        //dd($datos);

        Ventas::create($datos);
        return redirect('/ventas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venta = Ventas::find($id);
        return view('Ventas.read')->with('venta', $venta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $venta = Ventas::find($id);
        $clientes = Clientes::where('status', 1)
                ->select('id','nombre', 'ap_pat', 'ap_mat')
                ->orderBy('nombre')->get();
        $tipos_pagos = Tipos_pagos::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        $usuarios = Usuarios::where('status', 1)
                ->select('id','nombre','ap_pat', 'ap_mat')
                ->orderBy('nombre')->get();
        $tiendas = Tiendas::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Ventas.edit')
                ->with('venta', $venta)
                ->with('clientes',$clientes)
                ->with('tipos_pagos',$tipos_pagos)
                ->with('usuarios',$usuarios)
                ->with('tiendas',$tiendas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $datos['status'] = "1";

        //dd($datos);

        $venta = Ventas::find($id);

        $venta->update($datos);
        
        return redirect('/ventas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venta = Ventas::find($id);
        $venta->status = 0;
        $venta->save();
        return redirect('/ventas');
    }
}
