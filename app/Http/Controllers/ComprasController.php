<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Compras;
use App\Models\Proveedores;
use App\Models\Usuarios;
use App\Models\Tiendas;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compras = Compras::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Compras.index')->with('compras', $compras);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = Proveedores::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        $usuarios = Usuarios::where('status', 1)
                ->select('id','nombre', 'ap_pat', 'ap_mat')
                ->orderBy('nombre')->get();
        $tiendas = Tiendas::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Compras.create')
                ->with('proveedores',$proveedores)
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

        Compras::create($datos);
        return redirect('/compras');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $compra = Compras::find($id);
        return view('Compras.read')->with('compra', $compra);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $compra = Compras::find($id);
        $proveedores = Proveedores::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        $usuarios = Usuarios::where('status', 1)
                ->select('id','nombre', 'ap_pat', 'ap_mat')
                ->orderBy('nombre')->get();
        $tiendas = Tiendas::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Compras.edit')
                ->with('compra', $compra)
                ->with('proveedores',$proveedores)
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

        $compra = Compras::find($id);

        $compra->update($datos);
        
        return redirect('/compras');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $compra = Compras::find($id);
        $compra->status = 0;
        $compra->save();
        return redirect('/compras');
    }
}
