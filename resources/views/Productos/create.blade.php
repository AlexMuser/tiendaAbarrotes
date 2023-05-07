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
                <h2 class="text-primary" style="margin-top: 100px;">Registrar productos</h2>
                <p>Realiza el registro llenando los siguientes datos</p>
            </div>
            {!! Form::open(['url'=>'/productos']) !!}
                <div class="form-group mb-3">{!! Form::label ('nombre','Nombre', ['class' => 'form-label']) !!}{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre', 'required' => 'required', 'title' => 'Debes ingresar el nombre']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('descripcion','Descripción', ['class' => 'form-label']) !!}{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la descripción', 'required' => 'required', 'title' => 'Debes ingresar la descripción']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('codigo','Codigo', ['class' => 'form-label']) !!}{!! Form::number('codigo', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el codigo', 'required' => 'required', 'title' => 'Debes ingresar el codigo']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('existencia','Numero de existencias', ['class' => 'form-label']) !!}{!! Form::number('existencia', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el numero de existencias', 'required' => 'required', 'title' => 'Debes ingresar el numero de existencias']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('precio_compra','Precio de compra $', ['class' => 'form-label']) !!}{!! Form::number('precio_compra', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el precio de compra', 'required' => 'required', 'title' => 'Debes ingresar el precio de compra']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('precio_venta','Precio de venta $', ['class' => 'form-label']) !!}{!! Form::number('precio_venta', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el precio de venta', 'required' => 'required', 'title' => 'Debes ingresar el precio de venta']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('stock','Cantidad en stock', ['class' => 'form-label']) !!}{!! Form::number('stock', null, ['class' => 'form-control', 'placeholder' => 'Ingresa el stock', 'required' => 'required', 'title' => 'Debes ingresar el stock']) !!}</div>
                <div class="form-group mb-3">
                    <label class="form-label" for="tipos_ventas">Tipo de venta</label>
                    <select class="form-select states order-alpha" id="tipos_ventas" name="id_tipo_venta" required="">
                        @foreach($tipos_ventas as $tipo_venta)
                            <option value="{{ $tipo_venta->id }}">{{ $tipo_venta->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="categorias"> Categoria</label>
                    <select class="form-select states order-alpha" id="id_categoria" name="id_categoria" required="">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="proveedores"> Proveedor</label>
                    <select class="form-select states order-alpha" id="id_proveedor" name="id_proveedor" required="">
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="tiendas"> Tienda</label>
                    <select class="form-select states order-alpha" id="id_tienda" name="id_tienda" required="">
                        @foreach($tiendas as $tienda)
                            <option value="{{ $tienda->id }}">{{ $tienda->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3">&nbsp;{!! Form::submit('Guardar producto', ['class' => 'btn btn-primary d-block w-100']) !!}</div>
                <a href="{{ url('/productos') }}" class="btn btn-primary d-block w-100" style="background: rgb(237,38,38);">Cancelar</a>
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