<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Productos;
use App\Models\Ventas;
use App\Models\Detalle_ventas;

class PdfController extends Controller
{
    public function genera_pdf(){
        $ventas = Ventas::where('status',1)
            ->orderBy('id')->get();
        return view("Pdf.listado_reportes")
            ->with('ventas',$ventas);
    }

    public function crearPDF($datos, $vistaurl, $tipo){
        $data = $datos;
        $date = date('Y-m-d');
        $view = \View::make($vistaurl, compact('data', 'date'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf -> loadHTML($view);

        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf');}
    }

    public function crearPDFventasMensuales($datos, $vistaurl, $tipo){
        $data = $datos;
        $date = date('Y-m-d');
        $view = \View::make($vistaurl, compact('data', 'date'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf -> loadHTML($view);

        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf');}
    }

    public function crearPDFventa($venta, $detalle_venta, $vistaurl, $tipo){
        $data_venta = $venta;
        $data_detalle_venta = $detalle_venta;
        $date = date('Y-m-d');
        $view = \View::make($vistaurl, compact('data_venta', 'data_detalle_venta', 'date'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf -> loadHTML($view);

        if($tipo==1){return $pdf->stream('reporte');}
        if($tipo==2){return $pdf->download('reporte.pdf');}
    }

    public function productos_nombre($tipo){
        $vistaurl = "PDF.reporte_de_productos";
        $productos = Productos::where('status',1)
            ->orderBy('nombre')->get();
        return $this->crearPDF($productos, $vistaurl, $tipo);
    }

    public function ticket($tipo, $id_venta){
        $vistaurl = "PDF.reporte_ticket";
        $venta = Ventas::find($id_venta);
        $detalle_venta = Detalle_ventas::where('id_venta', $venta->id)->get();
        return $this->crearPDFventa($venta, $detalle_venta, $vistaurl, $tipo);
    }

    public function ventasMensuales($tipo){
        $vistaurl = "PDF.reporte_ventas";
        $ventas = Ventas::where('status',1)
            ->orderBy('fecha')->get();
            return $this->crearPDF($ventas, $vistaurl, $tipo);
    }
}
