<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Fotos_productos;
use App\Models\Productos;

class Fotos_productosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotos_productos = Fotos_productos::where('status', 1)
                  ->orderBy('id_producto')->get(); 

        return view('Fotos_productos.index')->with('fotos_productos', $fotos_productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productos = Productos::select('id','nombre')
                  ->where('status', 1)
                  ->orderBy('nombre')->get();
        return view('Fotos_productos.create')
            ->with('productos',$productos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $fotoExistente = Fotos_productos::where('id_producto', $datos['id_producto'])
            ->where('status', 1)
            ->first();

        if ($fotoExistente) {
            return redirect('/fotos_productos/create')->with('error', 'Ya existe una foto asociada al producto');
        }

        $hora = date("h:i:s");
        $fecha = date("d-m-Y");

        $prefijo = $fecha . "_" . $hora;

        $prefijo = $fecha . "_" . str_replace(":", "_", $hora);

        $archivo = $request->file('foto');

        $nombre_foto = $prefijo . "_" . $archivo->getClientOriginalName();

        $rl = Storage::disk('fotografias')->put($nombre_foto, \File::get($archivo));

        if ($rl) {
            $datos['ruta'] = $nombre_foto;
            $datos['status'] = "1";
            Fotos_productos::create($datos);
            return redirect('/fotos_productos');
        } else {
            return redirect()->back()->with('error', 'Error al intentar guardar la foto');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $foto_producto = Fotos_productos::find($id);
        return view('Fotos_productos.read')->with('foto_producto', $foto_producto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $foto_producto = Fotos_productos::find($id);
        $productos = Productos::select('id','nombre')
                  ->where('status', 1)
                  ->orderBy('nombre')->get();
        return view('Fotos_productos.edit')
               ->with('foto_producto',$foto_producto)
               ->with('productos',$productos);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();
        $foto_producto = Fotos_productos::find($id);

        $hora = date("h:i:s");
        $fecha = date("d-m-Y");

        $prefijo = $fecha . "_" . $hora;

        $prefijo = $fecha . "_" . str_replace(":", "_", $hora);

        $archivo = $request->file('foto');

        $nombre_foto = $prefijo . "_" . $archivo->getClientOriginalName();

        $rl = Storage::disk('fotografias')->put($nombre_foto, \File::get($archivo));

        if ($rl) {
            $datos['ruta'] = $nombre_foto;
            $datos['status'] = "1";
            $foto_producto->update($datos);
            return redirect('/fotos_productos');
        } else {
            return redirect()->back()->with('error', 'Error al intentar guardar la foto');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $foto_producto = Fotos_productos::find($id);
        $foto_producto->status = 0;
        $foto_producto->save();
        return redirect('/fotos_productos');
    }
}
