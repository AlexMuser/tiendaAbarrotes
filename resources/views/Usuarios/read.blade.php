<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Detalle de foto del usuario</title>
    <!-- Agregamos los estilos de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body style="background-color: #e9f2f9;">
    <div class="container">
        <h1 class="text-primary mt-3">Detalle de usuario</h1>
    
        <div class="card mt-3" style="background-color: #c5d9e5;">
            <div class="card-body">
                <h2 class="card-title text-dark">Nombre: {!! $usuario->nombre !!}</h2>
    
                <h2 class="card-title text-dark">Apellido paterno: {!! $usuario->ap_pat !!}</h2>
    
                <h2 class="card-title text-dark">Apellido materno: {!! $usuario->ap_mat !!}</h2>
    
                <h2 class="card-title text-dark">Correo electronico: {!! $usuario->email !!}</h2>

                <h2 class="card-title text-dark">Teléfono: {!! $usuario->telefono !!}</h2>

                <h2 class="card-title text-dark">Dirección: {!! $usuario->direccion !!}</h2>

                <h2 class="card-title text-dark">Usuario: {!! $usuario->username !!}</h2>

                <h2 class="card-title text-dark">Contraseña: {!! $usuario->password !!}</h2>

                <h2 class="card-title text-dark">Tienda: {!! $usuario->tiendas->nombre !!}</h2>

                <h2 class="card-title text-dark">Tipo de usuario: {!! $usuario->tipo_usuarios->nombre !!}</h2>

                <h2 class="card-title text-dark">Status: {!! $usuario->status !!}</h2>
    
                <br />
    
                <a href="{{ url('/usuarios') }}" class="btn btn-primary">Regresar</a>
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