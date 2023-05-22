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
                    <th>Tipo de gráfica</th>
                    <th>Ver</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Gráfica de areas de las ventas y ventas pagadas</td>
                    <td>
                        <a href="{!! asset('graficas_areas') !!}" class="btn btn-primary">Ver</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Gráfica de barras del numero de productos existentes</td>
                    <td>
                        <a href="{!! asset('graficas_barras') !!}" class="btn btn-primary">Ver</a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Gráfica de pie de clientes divididos por acreditado o pendiente</td>
                    <td>
                        <a href="{!! asset('graficas_pie') !!}" class="btn btn-primary" >Ver</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script src="{{ asset('estilo/bootstrap/js/bootstrap.min.js') }} "></script>
    <script src="{{ asset('estilo/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>