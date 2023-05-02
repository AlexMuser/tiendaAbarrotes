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
    <section class="clean-block clean-form dark h-100">
        <div class="container" style="margin-top: -59px;">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Registrar usuarios</h2>
                <p>Realiza el registro de productos llenando los siguientes datos</p>
            </div>
            {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/usuarios/'.$usuario->id]) !!}
                <div class="form-group mb-3">{!! Form::label ('ap_pat','Apellido Paterno', ['class' => 'form-label']) !!}{!! Form::text('ap_pat', $usuario->ap_pat, ['class' => 'form-control', 'placeholder' => 'Ingresa apellido paterno', 'required' => 'required', 'title' => 'Debes ingresar el apellido paterno']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('ap_mat','Apellido Materno', ['class' => 'form-label']) !!}{!! Form::text('ap_mat', $usuario->ap_mat, ['class' => 'form-control', 'placeholder' => 'Ingresa apellido materno', 'required' => 'required', 'title' => 'Debes ingresar el apellido materno']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('nombre','Nombre', ['class' => 'form-label']) !!}{!! Form::text('nombre', $usuario->nombre, ['class' => 'form-control', 'placeholder' => 'Ingresa el nombre', 'required' => 'required', 'title' => 'Debes ingresar el nombre']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('telefono','Teléfono', ['class' => 'form-label']) !!}{!! Form::tel('telefono', $usuario->telefono, ['class' => 'form-control', 'placeholder' => 'Ingresa el teléfono', 'required' => 'required', 'title' => 'Debes de ingresar un numero de teléfono']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('email','Correo electronico', ['class' => 'form-label']) !!}{!! Form::email('email', $usuario->email, ['class' => 'form-control', 'placeholder' => 'Ingresa el correo', 'required' => 'required', 'title' => 'Debes de ingresar un correo electronico']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('direccion','Dirección', ['class' => 'form-label']) !!}{!! Form::text('direccion', $usuario->direccion, ['class' => 'form-control', 'placeholder' => 'Ingresa la dirección', 'required' => 'required', 'title' => 'Debes de ingresar una dirección']) !!}</div>
                <div class="form-group mb-3">{!! Form::label ('username','Usuario', ['class' => 'form-label']) !!}{!! Form::text('username', $usuario->username, ['class' => 'form-control', 'placeholder' => 'Ingresa el usuario', 'required' => 'required', 'title' => 'Debes de ingresar un nombre de usuario']) !!}</div>
                <div class="form-group mb-3">
                    {!! Form::label ('password','Contraseña', ['class' => 'form-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ingresa la contraseña', 'required' => 'required', 'title' => 'Debes de ingresar la contraseña', 'id' => 'password']) !!}
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="tienda">Tienda</label>
                    <select class="form-select states order-alpha" id="tienda" name="id_tienda" required="">
                        @foreach($tiendas as $tienda)
                        <option value="{{ $tienda->id }}" @if($tienda->id == $usuario->id_tienda) selected @endif>{{ $tienda->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="tienda">Tipo de usuario</label>
                    <select class="form-select states order-alpha" id="tienda" name="id_tipo_usu" required="">
                        @foreach($tipo_usuarios as $tipo_usuario)
                            <option value="{{ $tipo_usuario->id }}">{{ $tipo_usuario->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3">&nbsp;{!! Form::submit('Editar usuario', ['class' => 'btn btn-primary d-block w-100']) !!}</div>
                <a href="{{ url('/usuarios') }}" class="btn btn-primary d-block w-100" style="background: rgb(237,38,38);">Cancelar</a>
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