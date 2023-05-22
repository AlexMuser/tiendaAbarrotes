<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Detalle_mermas;
use App\Models\Mermas;
use App\Models\Productos;

class Detalle_mermasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalle_mermas = Detalle_mermas::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Detalle_mermas.index')->with('detalle_mermas', $detalle_mermas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mermas = Mermas::where('status', 1)
                ->select('id')
                ->orderBy('id')->get();
        $productos = Productos::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Detalle_mermas.create')
                ->with('mermas',$mermas)
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

        Detalle_mermas::create($datos);
        return redirect('/detalle_mermas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detalle_merma = Detalle_mermas::find($id);
        return view('Detalle_mermas.read')->with('detalle_merma', $detalle_merma);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $detalle_merma = Detalle_mermas::find($id);
        $mermas = Mermas::where('status', 1)
                ->select('id')
                ->orderBy('id')->get();
        $productos = Productos::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Detalle_mermas.edit')
                ->with('detalle_merma', $detalle_merma)
                ->with('mermas',$mermas)
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

        $detalle_mermas = Detalle_mermas::find($id);

        $detalle_mermas->update($datos);
        
        return redirect('/detalle_mermas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detalle_mermas = Detalle_mermas::find($id);
        $detalle_mermas->status = 0;
        $detalle_mermas->save();
        return redirect('/detalle_mermas');
    }
}
