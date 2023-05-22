<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle de foto del venta</title>
    <!-- Agregamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body style="background-color: #e9f2f9;">
    <div class="container">
        <h1 class="text-primary mt-3">Detalle de venta</h1>
    
        <div class="card mt-3" style="background-color: #c5d9e5;">
            <div class="card-body">
                <h2 class="card-title text-dark">ID: {!! $venta->id !!}</h2>
    
                <h2 class="card-title text-dark">Fecha: {!! $venta->fecha !!}</h2>
    
                <h2 class="card-title text-dark">Total: {!! "$ " . $venta->total !!}</h2>
    
                <h2 class="card-title text-dark">Total pagado: {!! "$ " . $venta->total_pagado !!}</h2>

                <h2 class="card-title text-dark">Cliente: {!! $venta->clientes->nombre . " " . $venta->clientes->ap_pat . " " . $venta->clientes->ap_mat !!}</h2>

                <h2 class="card-title text-dark">Tipo de pago: {!! $venta->tipos_pagos->nombre !!}</h2>

                <h2 class="card-title text-dark">Usuario que atendio: {!! $venta->usuarios->nombre . " " . $venta->usuarios->ap_pat . " " . $venta->usuarios->ap_mat !!}</h2>

                <h2 class="card-title text-dark">Tienda: {!! $venta->tiendas->nombre !!}</h2>
    
                <br />
    
                <a href="{{ url('/ventas') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>

    <br />
    
    <!-- Agregamos los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>    