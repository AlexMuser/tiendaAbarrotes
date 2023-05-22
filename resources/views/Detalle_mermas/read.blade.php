<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle de foto del detalle de merma</title>
    <!-- Agregamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body style="background-color: #e9f2f9;">
    <div class="container">
        <h1 class="text-primary mt-3">Detalle del detalle de merma</h1>
    
        <div class="card mt-3" style="background-color: #c5d9e5;">
            <div class="card-body">
                <h2 class="card-title text-dark">Cantidad: {!! $detalle_merma->cantidad !!}</h2>
    
                <h2 class="card-title text-dark">Precio de merma: {!! "$ " . $detalle_merma->precio_merma !!}</h2>
    
                <h2 class="card-title text-dark">Precio de venta: {!! "$ " . $detalle_merma->precio_venta !!}</h2>
    
                <h2 class="card-title text-dark">Merma: {!! $detalle_merma->mermas->id !!}</h2>

                <h2 class="card-title text-dark">Producto: {!! $detalle_merma->productos->nombre !!}</h2>

                <h2 class="card-title text-dark">Status: {!! $detalle_merma->status !!}</h2>
    
                <br />
    
                <a href="{{ url('/detalle_mermas') }}" class="btn btn-primary">Regresar</a>
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