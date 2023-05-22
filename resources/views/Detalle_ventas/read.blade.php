<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle de foto del detalle de venta</title>
    <!-- Agregamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body style="background-color: #e9f2f9;">
    <div class="container">
        <h1 class="text-primary mt-3">Detalle del detalle de venta</h1>
    
        <div class="card mt-3" style="background-color: #c5d9e5;">
            <div class="card-body">
                <h2 class="card-title text-dark">Cantidad: {!! $detalle_venta->cantidad !!}</h2>
    
                <h2 class="card-title text-dark">Precio de compra: {!! "$ " . $detalle_venta->precio_compra !!}</h2>
    
                <h2 class="card-title text-dark">Precio de venta: {!! "$ " . $detalle_venta->precio_venta !!}</h2>
    
                <h2 class="card-title text-dark">Venta: {!! $detalle_venta->ventas->id !!}</h2>

                <h2 class="card-title text-dark">Producto: {!! $detalle_venta->productos->nombre !!}</h2>

                <h2 class="card-title text-dark">Status: {!! $detalle_venta->status !!}</h2>
    
                <br />
    
                <a href="{{ url('/detalle_ventas') }}" class="btn btn-primary">Regresar</a>
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