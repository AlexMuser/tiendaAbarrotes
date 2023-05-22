<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ventas</title>
    <link rel="stylesheet" href="{{ asset('estilo/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/css/Font%20Awesome%205%20Brands.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/css/Font%20Awesome%205%20Free.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('estilo/css/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/css/Ludens-Users---25-After-Register.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/css/Navbar-Right-Links-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/css/stylesLogin.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/css/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/css/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('estilo/css/fonts/fontawesome5-overrides.min.css') }}">
    <script src="{{ asset('jquery-3.6.4.min.js') }}"></script>
</head>

<body>
    @include('includes.navbarVend')
    <div class="container-fluid" style="margin-top: 28px;width: 1255.6px;">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-6">
                <h3 class="text-dark mb-4">Ventas</h3>
            </div>
            <div class="col-12 col-sm-6 col-md-6 text-end" style="margin-bottom: 30px;"><a class="btn btn-primary" role="button" href="{!!  asset('ventas/create')   !!}">&nbsp;Agregar venta</a></div>
        </div>
        <div class="card" id="TableSorterCard">
            <div class="card-header py-3">
                <div class="row align-items-center table-topper">
                    <div class="col-12 col-sm-5 col-md-6 text-start" style="margin: 0px;padding: 5px 15px;">
                        <p class="fw-bold text-primary m-0">Ventas registradas</p>
                        <form method="GET" action="" class="form-inline mt-2 mt-md-0">
                            <div class="input-group">
                                <input class="form-control" type="text" name="cliente" placeholder="Buscar por cliente" value="{{ Request::get('cliente') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary" type="submit">Buscar</button>
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table tablesorter" id="ipi-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Total pagado</th>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center">Tipo de pago</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Tienda</th>
                                    <th class="text-center filter-false sorter-false">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    @foreach($ventas as $venta)
                                    @php
                                    $nombreCompleto = $venta->clientes->nombre . ' ' . $venta->clientes->ap_pat . ' ' . $venta->clientes->ap_mat;
                                    $buscarCliente = Request::get('cliente');
                                    $nombreEncontrado = stripos($nombreCompleto, $buscarCliente) !== false;
                                    $apellidosEncontrados = true;
                                    if (strpos($buscarCliente, ' ') !== false) {
                                        $apellidos = explode(' ', $buscarCliente);
                                        $apellidosEncontrados = true;
                                        foreach ($apellidos as $apellido) {
                                            if (stripos($nombreCompleto, $apellido) === false) {
                                                $apellidosEncontrados = false;
                                                break;
                                            }
                                        }
                                    }
                                    @endphp
                                    @if ($buscarCliente && (!$nombreEncontrado || !$apellidosEncontrados))
                                        @continue
                                    @endif
                                    <tr>
                                        <td>{!! $venta->id !!}</td>
                                        <td>{!! $venta->fecha !!}</td>
                                        <td>{!! $venta->total !!}</td>
                                        <td>{!! $venta->total_pagado !!}</td>
                                        <td>{!! $venta->clientes->id . ". " . $nombreCompleto !!}</td>
                                        <td>{!! $venta->tipos_pagos->nombre !!}</td>
                                        <td>{!! $venta->usuarios->id . ". " . $venta->usuarios->nombre . " " . $venta->usuarios->ap_pat . " " . $venta->usuarios->ap_mat !!}</td>
                                        <td>{!! $venta->tiendas->nombre !!}</td>
                                        <td class="text-center align-middle" style="max-height: 60px;height: 60px;">
                                            <a class="btn btnMaterial btn-flat primary semicircle" role="button" href="{!! 'ventas/'.$venta->id !!}"><i class="far fa-eye"></i></a>
                                            <a class="btn btnMaterial btn-flat success semicircle" role="button" href="{!! 'ventas/'.$venta->id.'/edit' !!}"><i class="fas fa-pen"></i></a>
                                            {!! Form::open(['method' => 'DELETE' , 'url' => '/ventas/'.$venta->id]) !!}
                                            {!! Form::submit('Eliminar', ['class' => 'btn btnMaterial btn-flat accent btnNoBorders checkboxHover', 'style' => 'margin-left: 5px;']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('estilo/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('estilo/js/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>