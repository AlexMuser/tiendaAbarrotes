<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

use App\Models\Clientes;
use App\Models\Tipos_pagos;
use App\Models\Productos;
use App\Models\Tipos_ventas;
use App\Models\Fotos_productos;

use App\Models\Ventas;
use App\Models\Detalle_ventas;

use Illuminate\Support\Facades\Log;

class PuntoDeVentaController extends Controller
{
    public function index()
    {
        // Mostrar la lista de puntos de venta
        $usuario = Auth::user();
        $clientes = Clientes::where('status', 1)
            ->select('id','nombre', 'ap_pat', 'ap_mat')
            ->orderBy('nombre')->get();
        $tipos_pagos = Tipos_pagos::where('status', 1)
            ->select('id','nombre')
            ->orderBy('nombre')->get();

        return view('Ventas.puntoVenta')
            ->with('usuario', $usuario)
            ->with('clientes', $clientes)
            ->with('tipos_pagos', $tipos_pagos);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
    
            // Validar los datos 
            $validatedData = $request->validate([
                'total' => 'required|numeric|not_in:0',
                'total_pagado' => 'required|numeric|min:0',
                'id_cliente' => 'required|exists:clientes,id',
                'id_tipo_pago' => 'required|exists:tipos_pagos,id',
                'id_usuario' => 'required|exists:usuarios,id',
                'id_tienda' => 'required|exists:tiendas,id',
            ]);
    
            // Obtener la fecha actual
            $fecha = Carbon::now();
    
            // Crear una nueva instancia de Ventas y asignar los datos necesarios
            $venta = new Ventas();
            $venta->fecha = $fecha;
            $venta->total = $validatedData['total'];
            $venta->total_pagado = $validatedData['total_pagado'];
            $venta->id_cliente = $validatedData['id_cliente'];
            $venta->id_tipo_pago = $validatedData['id_tipo_pago'];
            $venta->id_usuario = $validatedData['id_usuario'];
            $venta->id_tienda = $validatedData['id_tienda'];
            $venta->status = 1;
    
            // Guardar la venta en la base de datos
            $venta->save();
    
            // Obtener el ID de la venta recién creada
            $idVenta = $venta->id;
    
            // Crear los detalles de venta
            $detalleVentas = json_decode($request->input('detalleVentas'), true);
    
            foreach ($detalleVentas as $detalle) {
                $detalleVenta = new Detalle_ventas();
                $detalleVenta->cantidad = $detalle[0];
                $detalleVenta->precio_compra = $detalle[1];
                $detalleVenta->precio_venta = $detalle[2];
                $detalleVenta->id_venta = $idVenta;
                $detalleVenta->id_producto = $detalle[3];
                $detalleVenta->status = 1;
                $detalleVenta->save();

                $producto = Productos::find($detalleVenta->id_producto);
                $producto->stock -= $detalleVenta->cantidad;
                $producto->existencia -= $detalleVenta->cantidad;
                $producto->save();
            }
    
            $cliente = Clientes::find($venta->id_cliente);
            if ($venta->total != $venta->total_pagado) {
                $cliente->estadoPago = 'Pendiente';
            }
            $cliente->save();
    
            return redirect('/puntoDeVenta')->with('success', 'Venta realizada!')->with('id_venta', $idVenta);
        } catch (\Exception $e) {
            // Ocurrió un error, puedes registrar el error, mostrar un mensaje de error o realizar alguna otra acción
            return redirect('/puntoDeVenta')->with('error', 'Se produjo un error al realizar la venta.');
        }
    }

    //AJAX para regresar valores para el producto

    public function busquedaDelProducto($codigo_producto)
    {

        $producto = Productos::where('status', 1)
            ->where('codigo', $codigo_producto)
            ->first();
    
        return $producto;
    }

    public function busquedaDelTipo_venta($id_tipo_venta)
    {
        $id_tipo_venta = intval($id_tipo_venta);

        $tipo_venta = Tipos_ventas::where('status', 1)
            ->where('id', $id_tipo_venta)
            ->first();
    
        return $tipo_venta;
    }
    
    public function busquedaDeFotoProducto($id_producto)
    {
        $id_producto = intval($id_producto);

        $foto_producto = Fotos_productos::where('status', 1)
            ->where('id_producto', $id_producto)
            ->first();
    
        return $foto_producto;
    }

    public function adeudo()
    {
        $clientes = Clientes::where('status', 1)
            ->where('estadoPago', 'Pendiente')
            ->orderBy('nombre')->get();
        return view('Ventas.adeudo')->with('clientes',$clientes);
    }

    public function obtenerVentasPorCliente($id_cliente)
    {
        $ventas = Ventas::where('id_cliente', $id_cliente)->get();
        return $ventas;
    }    

    public function actualizarTotalPagado(Request $request)
    {
        $datos = $request->all();
        
        $venta = Ventas::find($datos['id_venta']);
        $venta->total_pagado = $datos['total_pagado'];
        $venta->save();

        if ($datos['total_pagado'] >= $datos['total']) {
            $cliente = Clientes::find($datos['id_cliente']);
            $cliente->estadoPago = 'Acreditado';
            $cliente->save();
        }
        
        return redirect()->back()->with('success', 'Tareas realizadas exitosamente');
    }
}
