<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clientes;
use App\Models\Tiendas;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Clientes::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Clientes.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiendas = Tiendas::select('id','nombre')
                  ->orderBy('nombre')->get();
        return view('Clientes.create')
                ->with('tiendas',$tiendas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $datos['estadoPago'] = 'Acreditado';
        $datos['status'] = "1";

        //dd($datos);

        Clientes::create($datos);
        return redirect('/clientes');
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
        $cliente = Clientes::find($id);
        $tiendas = Tiendas::select('id','nombre')
                  ->orderBy('nombre')->get();
        return view('Clientes.edit')
               ->with('cliente', $cliente)
               ->with('tiendas',$tiendas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $datos['estadoPago'] = 'Acreditado';
        $datos['status'] = "1";

        $cliente = Clientes::find($id);

        $cliente->update($datos);

        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Borrado fisico
        $cliente = Clientes::find($id);
        $cliente->destroy($id);
        
        //Borrado lógico
        //$cliente = Clientes::find($id);
        //$cliente->status = 0;
        //$cliente->save();
        return redirect('/clientes');
    }
}
