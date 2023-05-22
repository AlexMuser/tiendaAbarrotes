<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Punto de venta</title>
    <link rel="stylesheet" href="{{  asset('estilo/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Font%20Awesome%205%20Brands.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Font%20Awesome%205%20Free.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/fonts/font-awesome.min.css') }}">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
    <script>
        function cambiar_ventas(id_cliente) {
            $("#id_venta").empty();
            $("#id_venta").append('<option disabled selected value="">Seleccionar una venta</option>');
            var ruta = "{{ asset('obtenerVentasPorCliente') }}/" + id_cliente;
            $.ajax({
                type: 'GET',
                url: ruta,
                success: function (data) {
                    var ventas = data;
                    console.log(ventas);
                    for (var i = 0; i < ventas.length; i++) {
                        if (ventas[i].total !== ventas[i].total_pagado) {
                            var optionText = ventas[i].fecha + ' - Total: ' + ventas[i].total + ' - Total Pagado: ' + ventas[i].total_pagado;
                            var optionValue = ventas[i].id;
    
                            // Crear la opción y asignar atributos data
                            var option = $('<option value="' + optionValue + '">' + optionText + '</option>');
                            option.attr("data-total", ventas[i].total);
                            option.attr("data-total-pagado", ventas[i].total_pagado);
    
                            $("#id_venta").append(option);
                        }
                    }
    
                    // Agregar evento change al select para asignar valores al seleccionar una venta
                    $("#id_venta").change(function () {
                        var selectedOption = $(this).find("option:selected");
                        var total = selectedOption.attr("data-total");
                        var totalPagado = selectedOption.attr("data-total-pagado");
    
                        // Asignar valores a los input numéricos
                        $("#total").val(total);
                        $("#total_pagado").val(totalPagado);
                    });
                }
            });
        }
    </script> 
</head>

<body> 
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('success') }}'
        });
    </script>
    @endif      
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-md sticky-top bg-white">
            <div class="container-fluid"><a class="navbar-brand" href="{{ url('/puntoDeVenta') }}">Punto de venta</a>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/clientes') }}">Consultar clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/clientes/create') }}">Registrar cliente</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/adeudos') }}">Adeudo</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <section class="clean-block clean-form dark h-100">
        <div class="container" style="margin-top: -59px;">
            <div class="block-heading" style="padding-top: 0px;">
                <h2 class="text-primary" style="margin-top: 100px;">Pagar adeudo</h2>
                <p>Realiza el pago del adeudo del cliente</p>
            </div>
            {!! Form::open(['method' => 'PATCH', 'route' => ['actualizar-total-pagado']]) !!}
            <div class="form-group">
                <label for="cliente">Cliente:</label>
                <select name="id_cliente" id="id_cliente" class="form-control" onchange="cambiar_ventas(this.value)">
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre . ' ' . $cliente->ap_pat . ' ' . $cliente->ap_mat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="ventas">Ventas:</label>
                <select name="id_venta" id="id_venta" class="form-control"></select>
            </div>
            <div class="form-group">
                <label for="total">Total:</label>
                <input type="number" name="total" id="total" class="form-control" readonly>
            </div>
            
            <div class="form-group">
                <label for="total_pagado">Total pagado:</label>
                <input type="number" name="total_pagado" id="total_pagado" class="form-control">
            </div>
            {!! Form::submit('Guardar', ['class' => 'btn btn-primary d-block w-100', 'onclick' => 'pagarAdeudo()']) !!}
            {!! Form::close() !!}
        </div>
    </section>
    <script src="{{  asset('estilo/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{  asset('estilo/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---1-Index-Table-with-Search--Sort-Filters.js') }}"></script>
    <script src="{{  asset('estilo/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---Material-UI-Actions.js') }}"></script>
    <script src="{{  asset('estilo/js/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>