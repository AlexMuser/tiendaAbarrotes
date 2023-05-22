<nav class="navbar navbar-light navbar-expand-md py-3">
    <div class="container"><a class="navbar-brand d-flex align-items-center" href="#"><span>Consultas</span></a><button data-bs-toggle="collapse" data-bs-target="#navcol-2" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-2">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/puntoDeVenta') }}">Punto de venta</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/genera_pdf') }}">Reportes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/graficas') }}">Graficas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/clientes') }}">Clientes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/ventas') }}">Ventas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/detalle_ventas') }}">Detalle ventas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/mermas') }}">Mermas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/detalle_mermas') }}">Detalle mermas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/compras') }}">Compras</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/detalle_compras') }}">Detalle compras</a></li>
            </ul>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary ms-md-2">Salir</button>
            </form>
        </div>
    </div>
</nav>