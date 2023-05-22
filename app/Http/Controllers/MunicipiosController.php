<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Municipios;
use App\Models\Entidades;
use App\Models\Paises;

class MunicipiosController extends Controller
{
    public function index()
    {
        $municipios = Municipios::where('status', 1)
                  ->orderBy('id_entidad')
                  ->orderBy('nombre')->get();          
        return view('Municipios.index')->with('municipios', $municipios);
    }
    
    
    public function create()
    {
        $entidades = Entidades::where('status', 1)
            ->select('id','nombre')
            ->orderBy('nombre')->get();
        $paises = Paises::where('status', 1)
            ->select('id','nombre')
            ->orderBy('nombre')->get();          
        return view('Municipios.create')
                ->with('entidades',$entidades)
                ->with('paises',$paises);
    }
    
    
    public function store(Request $request)
    {
        $datos = $request->all();

        $datos['status'] = "1";
        
        Municipios::create($datos);
        return redirect('/municipios');
    }
    
    
    public function show($id)
    {
        $municipio = Municipios::find($id);
        return view('Municipios.read')->with('municipio', $municipio);
    }
    
    
    public function edit($id)
    {
        $municipio = Municipios::find($id);
        $entidades = Entidades::select('id','nombre')
                  ->orderBy('nombre')->get();
        $paises = Paises::select('id','nombre')
                  ->orderBy('nombre')->get();           
        return view('Municipios.edit')
               ->with('municipio', $municipio)
               ->with('entidades',$entidades)
               ->with('paises',$paises);
    }
    
    
    public function update(Request $request, $id)
    {
        $datos = $request->all();
        $municipio = Municipios::find($id);
        $municipio->update($datos);
        return redirect('/municipios');
    }
    
    
    public function destroy($id)
    {
        $municipio = Municipios::find($id);
        $municipio->status = 0;
        $municipio->save();
        return redirect('/municipios');
    }

    /* AJAX PARA EL COMBO */
    public function cambia_combo($id_pais)
    {
        $entidades = Entidades::select('id','nombre')
            ->where('status', 1)
            ->where('id_pais', $id_pais)
            ->orderBy('nombre')
            ->get();
        return $entidades;
    }

    public function cambia_combo_2($id_entidad)
    {
        $municipios = Municipios::select('id','nombre')
            ->where('status', 1)
            ->where('id_entidad', $id_entidad)
            ->orderBy('nombre')
            ->get();
        return $municipios;
    }
}
