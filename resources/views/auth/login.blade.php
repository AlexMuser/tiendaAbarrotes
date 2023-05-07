<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Proyecto</title>
    <link rel="stylesheet" href="{{  asset('estilo/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Font%20Awesome%205%20Brands.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Font%20Awesome%205%20Free.css') }}">
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
</head>

<body>
    <div class="d-flex d-xl-flex align-items-center align-items-xl-center" style="width: 100%;height: 100%;"></div>
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 text-center d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;durvill_logo.jpg&quot;);"><img width="421" height="370" src="estilo/img/20230501_170030.jpg"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Bienvenido</h4>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username">Nombre de usuario</label>
                                        <input type="text" name="username" id="username" required autofocus class="form-control form-control-user" placeholder="Ingresa Usuario...">
                                    </div> 
                                    <div class="mb-3">
                                        <label for="password">Contraseña</label>
                                        <input type="password" name="password" id="password" required class="form-control form-control-user" placeholder="Contraseña...">
                                    </div>
                                    <div class="mb-3">
                                        <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                        <label for="remember" class="custom-control-label">Recordarme</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary d-block btn-user w-100" style="background: var(--bs-btn-border-color);">Iniciar sesión</button>
                                </form>
                                <hr>
                                <div class="text-center"><a class="small" href="" style="color: #01703E;">Enviar correo electronico</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{  asset('estilo/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://geodata.solutions/includes/countrystate.js"></script>
    <script src="{{  asset('estilo/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---1-Index-Table-with-Search--Sort-Filters.js') }}"></script>
    <script src="{{  asset('estilo/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---Material-UI-Actions.js') }}"></script>
    <script src="{{  asset('estilo/js/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>