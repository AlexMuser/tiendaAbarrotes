<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Tipos_ventas;
use App\Models\Categorias;
use App\Models\Proveedores;
use App\Models\Tiendas;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_ventas = Tipos_ventas::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $categorias = Categorias::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $proveedores = Proveedores::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $tiendas = Tiendas::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $productos = Productos::where('status', 1)
                  ->orderBy('id')->get(); 

        return view('Productos.index')
            ->with('tipos_ventas', $tipos_ventas)
            ->with('categorias', $categorias)
            ->with('proveedores', $proveedores)
            ->with('tiendas', $tiendas)
            ->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipos_ventas = Tipos_ventas::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $categorias = Categorias::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $proveedores = Proveedores::select('nombre', \DB::raw('MIN(id) as id'))
            ->where('status', 1)
            ->groupBy('nombre')
            ->orderBy('nombre')
            ->get();
        $tiendas = Tiendas::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $productos = Productos::where('status', 1)
                  ->orderBy('id')->get();
        return view('Productos.create')
                ->with('tipos_ventas',$tipos_ventas)
                ->with('categorias',$categorias)
                ->with('proveedores',$proveedores)
                ->with('tiendas',$tiendas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->all();

        $datos['id_tienda'] = intval($datos['id_tienda']);

        $validatedData = $request->validate([
            'codigo' => 'required|unique:productos,codigo,NULL,id,id_tienda,'.$datos['id_tienda'].',status,1',
            'id_tienda' => 'required',
        ], [
            'codigo.unique' => 'Ya existe un producto con ese codigo en la tienda seleccionada',
        ]);
    
        $datos['status'] = "1";

        //dd($datos);

        Productos::create($datos);
        return redirect('/productos');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Productos::find($id);
        return view('Productos.read')->with('producto', $producto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Productos::find($id);
        $tipos_ventas = Tipos_ventas::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $categorias = Categorias::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $proveedores = Proveedores::select('nombre', \DB::raw('MIN(id) as id'))
            ->where('status', 1)
            ->groupBy('nombre')
            ->orderBy('nombre')
            ->get();
        $tiendas = Tiendas::select('id','nombre')
            ->where('status', 1)
            ->orderBy('id')->get();
        $productos = Productos::where('status', 1)
                  ->orderBy('id')->get();
        return view('Productos.edit')
                  ->with('tipos_ventas',$tipos_ventas)
                  ->with('categorias',$categorias)
                  ->with('proveedores',$proveedores)
                  ->with('tiendas',$tiendas)
                  ->with('producto',$producto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datos = $request->all();

        $datos['id_tienda'] = intval($datos['id_tienda']);

        $datos['status'] = "1";

        //dd($datos);

        $producto = Productos::find($id);

        $producto->update($datos);
        
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = productos::find($id);
        $producto->status = 0;
        $producto->save();
        return redirect('/productos');
    }
}
