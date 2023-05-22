<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle de foto del producto</title>
    <!-- Agregamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body style="background-color: #e9f2f9;">
    <div class="container">
        <h1 class="text-primary mt-3">Detalle de fotos de producto</h1>
    
        <div class="card mt-3" style="background-color: #c5d9e5;">
            <div class="card-body">
                <h2 class="card-title text-dark">ID: {!! $foto_producto->id !!}</h2>
    
                <h2 class="card-title text-dark">Ruta: {!! $foto_producto->ruta !!}</h2>
    
                <h2 class="card-title text-dark">Producto: {!! $foto_producto->productos->nombre !!}</h2>

                <h2 class="card-title text-dark"><img src="{{ asset('storage/fotografias/' . $foto_producto->ruta) }}" alt="Producto" width="250"></h2>
    
                <h2 class="card-title text-dark">Status: {!! $foto_producto->status !!}</h2>
    
                <br />
    
                <a href="{{ url('/fotos_productos') }}" class="btn btn-primary">Regresar</a>
            </div>
        </div>
    </div>
    
    <!-- Agregamos los scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>    