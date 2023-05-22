<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TiendasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\Tipo_usuariosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\Tipos_ventasController;
use App\Http\Controllers\Tipos_pagosController;
use App\Http\Controllers\Fotos_productosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CorreoController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\Detalle_ventasController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\Detalle_comprasController;
use App\Http\Controllers\MermasController;
use App\Http\Controllers\Detalle_mermasController;
use App\Http\Controllers\PaisesController;
use App\Http\Controllers\EntidadesController;
use App\Http\Controllers\MunicipiosController;
use App\Http\Controllers\PuntoDeVentaController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\GraficasController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'role:4'])->group(function () {
    Route::resource('tiendas', TiendasController::class);
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('categorias', CategoriasController::class);
    Route::resource('tipo_usuarios', Tipo_usuariosController::class);
    Route::resource('proveedores', ProveedoresController::class);
    Route::resource('tipos_ventas', Tipos_ventasController::class);
    Route::resource('tipos_pagos', Tipos_pagosController::class);
    Route::resource('fotos_productos', Fotos_productosController::class);
    Route::resource('productos', ProductosController::class);
    Route::resource('paises', PaisesController::class);
    Route::resource('entidades', EntidadesController::class);
    Route::resource('municipios', MunicipiosController::class);
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::resource('clientes', ClientesController::class);
    Route::resource('ventas', VentasController::class);
    Route::resource('puntoDeVenta', PuntoDeVentaController::class);
    Route::resource('detalle_ventas', Detalle_ventasController::class);
    Route::resource('compras', ComprasController::class);
    Route::resource('detalle_compras', Detalle_comprasController::class);
    Route::resource('mermas', MermasController::class);
    Route::resource('detalle_mermas', Detalle_mermasController::class);
    Route::get('adeudos',[PuntoDeVentaController::class,'adeudo']);
    Route::patch('/actualizar-total-pagado', [PuntoDeVentaController::class, 'actualizarTotalPagado'])->name('actualizar-total-pagado');

    //PDF
    Route::get('genera_pdf',[PdfController::class,'genera_pdf']);
    Route::get('productos_nombre/{tipo}',[PdfController::class,'productos_nombre']);
    Route::get('ticket/{tipo}/{id_venta}',[PdfController::class,'ticket']);
    Route::get('ventasMensuales/{tipo}',[PdfController::class,'ventasMensuales']);

    //Graficas
    Route::get('graficas',[GraficasController::class,'graficas']);
    Route::get('graficas_areas',[GraficasController::class,'graficas_areas']);
    Route::get('graficas_barras',[GraficasController::class,'graficas_barras']);
    Route::get('graficas_pie',[GraficasController::class,'graficas_pie']);
});

// Rutas agregadas para realizar la aunteticación
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Correo electronico
Route::get('form_enviar_correo', [CorreoController::class, 'formulario_correo'])->name('form_enviar_correo');
Route::post('enviar_correo', [CorreoController::class, 'enviar']);

//AJAX para municipios y entidades
Route::get('combo_entidad_muni/{id_pais}', [MunicipiosController::class, 'cambia_combo']);
Route::get('combo_municipio/{id_entidad}', [MunicipiosController::class, 'cambia_combo_2']);

//AJAX para punto de venta
Route::get('busquedaProducto/{codigo_producto}', [PuntoDeVentaController::class, 'busquedaDelProducto']);
Route::get('busquedaTipoVenta/{id_tipo_venta}', [PuntoDeVentaController::class, 'busquedaDelTipo_venta']);
Route::get('busquedaFotoProducto/{id_producto}', [PuntoDeVentaController::class, 'busquedaDeFotoProducto']);

Route::get('/obtenerVentasPorCliente/{id_cliente}',  [PuntoDeVentaController::class, 'obtenerVentasPorCliente']);
Route::get('/obtenerDatosVenta/{id_venta}',  [PuntoDeVentaController::class, 'obtenerDatosVenta']);