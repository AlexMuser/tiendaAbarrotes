<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Crear municipio</title>
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
    <script src="{{ asset('jquery-3.6.4.min.js') }}"></script>
</head>
<body>
    <script>
        function cambiar_combo(id_pais){
            $("#id_entidad").empty();
            var ruta = "{{ asset('combo_entidad_muni') }}/"+id_pais;
            $.ajax({
                type: 'GET',
                url: ruta,

                success:function(data){
                    var entidades = data;
                    $("#id_entidad").append('<option value="Seleccionar ..."></option>');

                    for (var i = 0; i < entidades.length; i++) {
                        $("#id_entidad").append('<option value="' + entidades[i].id + '">' + entidades[i].nombre + '</option>');
                    }
                }
            });
        }
    </script>
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
                <h2 class="text-primary" style="margin-top: 100px;">Registrar municipios</h2>
                <p>Realiza el registro llenando los siguientes datos</p>
            </div>
            {!! Form::open([ 'method' => 'PATCH' , 'url'=>'/municipios/'.$municipio->id]) !!}
                <div class="form-group mb-3">
                    {!! Form::label('id_pais', 'Pais:', ['class'=>'form-label']) !!}
                    {!! Form::select('id_pais', $paises->pluck('nombre','id')->all(), $municipio->nombre, ['class'=>'form-select states order-alpha', 'placeholder'=>'Seleccionar ...', 'onchange'=>'cambiar_combo(this.value);', 'required'=>'required']) !!}
                </div>
                <div class="form-group mb-3">
                    {!! Form::label('id_entidad', 'Entidad:', ['class'=>'form-label']) !!}
                    {!! Form::select('id_entidad', [], $municipio->nombre, ['class'=>'form-select', 'placeholder'=>'Seleccionar ...', 'required'=>'required']) !!}
                </div>
                <div class="form-group mb-3">
                    {!! Form::label('nombre', 'Nombre del municipio:', ['class'=>'form-label']) !!}
                    {!! Form::text('nombre', $municipio->nombre, ['class'=>'form-control', 'placeholder'=>'Ingresa el nombre del municipio', 'required'=>'required', 'title'=>'Debes ingresar el nombre']) !!}
                </div>
                <hr style="margin-top: 30px;margin-bottom: 10px;">
                <div class="form-group mb-3">
                    {!! Form::submit('Guardar Municipio', ['class' => 'btn btn-primary d-block w-100']) !!}
                </div>
                <a href="{{ url('/municipios') }}" class="btn btn-primary d-block w-100" style="background: rgb(237,38,38);">Cancelar</a>
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