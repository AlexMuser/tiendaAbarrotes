<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reportes</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    @include('includes.navbarVend')
    
    <div class="container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Reporte</th>
                    <th>Ver</th>
                    <th>Descargar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Ver productos ordenados por nombre</td>
                    <td>
                        <a href="{!! asset('productos_nombre/1') !!}" class="btn btn-primary">Ver</a>
                    </td>
                    <td>
                        <a href="{!! asset('productos_nombre/2') !!}" class="btn btn-success">Descargar</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ver ticket:
                        <select id="id_venta" name="id_venta" required="" style="width: 60px">
                            @foreach($ventas as $venta)
                                <option value="{{ $venta->id }}">{{ $venta->id }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <a href="{!! asset('ticket/1/1') !!}" id="verTicketBtn" class="btn btn-primary">Ver</a>
                    </td>
                    <td>
                        <a href="{!! asset('ticket/2/1') !!}" id="descargarBtn" class="btn btn-success">Descargar</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ventas mensuales</td>
                    <td>
                        <a href="{!! asset('ventasMensuales/1') !!}" class="btn btn-primary" target="_blank">Ver</a>
                    </td>
                    <td>
                        <a href="{!! asset('ventasMensuales/2') !!}" class="btn btn-success">Descargar</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            // Actualizar el enlace al cargar la página y cuando cambie el valor del campo de selección
            function updateVerTicketLink() {
                var idVenta = $('#id_venta').val();
                var url = '{!! asset("ticket/1") !!}/' + idVenta;
                $('#verTicketBtn').attr('href', url);
                $('#verTicketBtn').attr('target', '_blank'); // Abrir en una nueva pestaña
            }

            function updateDescargarLink() {
                var idVenta = $('#id_venta').val();
                var url = '{!! asset("ticket/2") !!}/' + idVenta;
                $('#descargarBtn').attr('href', url);
            }

            // Llamar a la función de actualización al cargar la página
            updateVerTicketLink();

            // Llamar a la función de actualización cuando cambie el valor del campo de selección
            $('#id_venta').change(function() {
                updateVerTicketLink();
                updateDescargarLink();
            });
        });
    </script>
    <script src="{{ asset('estilo/bootstrap/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('estilo/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>