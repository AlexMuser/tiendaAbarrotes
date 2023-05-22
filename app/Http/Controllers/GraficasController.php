<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Ventas;
use App\Models\Clientes;

class GraficasController extends Controller
{
    public function graficas(){
        return view('Graficas.listado_graficas');
    }

    public function graficas_areas(){
        $ventas = Ventas::where('status',1)
            ->orderBy('fecha')->get();
        //dd($ventas);
        return view('Graficas.graficas_areas')->with('ventas',$ventas);
    }

    public function graficas_barras(){
        $productos = Productos::where('status',1)
            ->orderBy('nombre')->get();
        return view('Graficas.graficas_barras')->with('productos',$productos);
    }

    public function graficas_pie(){
        $clientes = Clientes::where('status',1)
            ->orderBy('nombre')->get();
        return view('Graficas.graficas_pie')->with('clientes',$clientes);
    }
}
