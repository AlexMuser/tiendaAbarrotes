<nav class="navbar navbar-light navbar-expand-md py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span>Consultas</span></a><button data-bs-toggle="collapse" data-bs-target="#navcol-2" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-2">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/categorias') }}">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/tiendas') }}">Tiendas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/productos') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/fotos_productos') }}">Fotos productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/usuarios') }}">Usuarios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/proveedores') }}">Proveedores</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/tipo_usuarios') }}">Tipo usuarios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/tipos_ventas') }}">Tipo ventas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/tipos_pagos') }}">Tipo pagos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/paises') }}">Pais</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/entidades') }}">Entidad</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/municipios') }}">Municipio</a></li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary ms-md-2">Salir</button>
            </form>
        </div>
    </div>
</nav>