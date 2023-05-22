<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Entidades;
use App\Models\Paises;

class EntidadesController extends Controller
{
    public function index()
    {
        $entidades = Entidades::where('status', 1)
                  ->orderBy('id_pais')
                  ->orderBy('nombre')->get();          
        return view('Entidades.index')->with('entidades', $entidades);
    }
    
    
    public function create()
    {
        $paises = Paises::where('status', 1)
            ->select('id','nombre')
            ->orderBy('nombre')->get();
        return view('Entidades.create')
                ->with('paises',$paises);
    }
    
    
    public function store(Request $request)
    {
        $datos = $request->all();
        
        $datos['status'] = "1";

        Entidades::create($datos);
        return redirect('/entidades');
    }
    
    
    
    public function show($id)
    {
        $entidad = Entidades::find($id);
        return view('Entidades.read')->with('entidad', $entidad);
    }
    
    
    public function edit($id)
    {
        $entidad = Entidades::find($id);
        $paises = Paises::select('id','nombre')
                  ->orderBy('nombre')->get();
        return view('Entidades.edit')
               ->with('entidad', $entidad)
               ->with('paises',$paises);
    }
    
    
    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $entidad = Entidades::find($id);
        $entidad->update($datos);
        return redirect('/entidades');
    }
    
    
    public function destroy($id)
    {
        $entidad = Entidades::find($id);
        $entidad->status = 0;
        $entidad->save();
        return redirect('/entidades');
    }
}
