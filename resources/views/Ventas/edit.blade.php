<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Proyecto</title>
    <link rel="stylesheet" href="{{  asset('estilo/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Font%20Awesome%205%20Brands.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Font%20Awesome%205%20Free.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{  asset('estilo/css/Ludens---1-Index-Table-with-Search--Sort-Filters-v20.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Ludens-Users---25-After-Register.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Navbar-Right-Links-icons.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/stylesLogin.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/fonts/fontawesome5-overrides.min.css') }}">
</head>

<body>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <section class="clean-block clean-form dark h-100">
        <div class="container" style="margin-top: -59px;">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Registrar usuarios</h2>
                <p>Realiza el registro llenando los siguientes datos</p>
            </div>
            {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/ventas/'.$venta->id]) !!}
                <div class="form-group mb-3">{!! Form::label ('fecha','Fecha', ['class' => 'form-label']) !!}{!! Form::date('fecha', $venta->fecha, ['class' => 'form-control', 'placeholder' => 'Ingresa Fecha', 'required' => 'required', 'title' => 'Debes ingresar el Fecha']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('total','Total', ['class' => 'form-label']) !!}{!! Form::number('total', $venta->total, ['class' => 'form-control', 'placeholder' => 'Ingresa Total', 'required' => 'required', 'title' => 'Debes ingresar el Total']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('total_pagado','Total pagado', ['class' => 'form-label']) !!}{!! Form::number('total_pagado', $venta->total_pagado, ['class' => 'form-control', 'placeholder' => 'Ingresa el total_pagado', 'required' => 'required', 'title' => 'Debes ingresar el total_pagado']) !!}</div>
                <div class="form-group mb-3">
                    <label class="form-label" for="cliente">Cliente</label>
                    <select class="form-select states order-alpha" id="cliente" name="id_cliente" required="">
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ ($cliente->nombre . " " .  $cliente->ap_pat . " " . $cliente->ap_mat)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="tipo_pago">Tipo de pago</label>
                    <select class="form-select states order-alpha" id="tipo_pago" name="id_tipo_pago" required="">
                        @foreach($tipos_pagos as $tipos_pago)
                            <option value="{{ $tipos_pago->id }}" @if($tipos_pago->id == $venta->id_tipo_pago) selected @endif >{{ $tipos_pago->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="usuario">Usuario</label>
                    <select class="form-select states order-alpha" id="usuario" name="id_usuario" required="">
                        @foreach($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" @if($usuario->id == $venta->id_usuario) selected @endif >{{ $usuario->nombre . " " .  $usuario->ap_pat . " " . $usuario->ap_mat}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="tienda">Tienda</label>
                    <select class="form-select states order-alpha" id="tienda" name="id_tienda" required="">
                        @foreach($tiendas as $tienda)
                            <option value="{{ $tienda->id }}" @if($tienda->id == $venta->id_tienda) selected @endif >{{ $tienda->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3">&nbsp;{!! Form::submit('Editar venta', ['class' => 'btn btn-primary d-block w-100']) !!}</div>
                <a href="{{ url('/ventas') }}" class="btn btn-primary d-block w-100" style="background: rgb(237,38,38);">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </section>
    <script src="{{  asset('estilo/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="{{  asset('estilo/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---1-Index-Table-with-Search--Sort-Filters.js') }}"></script>
    <script src="{{  asset('estilo/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---Material-UI-Actions.js') }}"></script>
    <script src="{{  asset('estilo/js/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>