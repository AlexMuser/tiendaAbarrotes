<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mermas;
use App\Models\Usuarios;
use App\Models\Tiendas;

class MermasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mermas = Mermas::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Mermas.index')->with('mermas', $mermas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Usuarios::where('status', 1)
                ->select('id','nombre', 'ap_pat', 'ap_mat')
                ->orderBy('nombre')->get();
        $tiendas = Tiendas::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Mermas.create')
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

        Mermas::create($datos);
        return redirect('/mermas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $merma = Mermas::find($id);
        return view('Mermas.read')->with('merma', $merma);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $merma = Mermas::find($id);
        $usuarios = Usuarios::where('status', 1)
                ->select('id','nombre', 'ap_pat', 'ap_mat')
                ->orderBy('nombre')->get();
        $tiendas = Tiendas::where('status', 1)
                ->select('id','nombre')
                ->orderBy('nombre')->get();
        return view('Mermas.edit')
                ->with('merma', $merma)
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

        $merma = Mermas::find($id);

        $merma->update($datos);
        
        return redirect('/mermas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $merma = Mermas::find($id);
        $merma->status = 0;
        $merma->save();
        return redirect('/mermas');
    }
}
