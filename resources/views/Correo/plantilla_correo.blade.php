<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Correo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <style>
        .card {
            border: none;
            box-shadow: 0 0 1rem rgba(0, 0, 0, .1);
            margin-top: 2rem;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
        }
        .card-body {
            background-color: #fff;
        }
        .card-footer {
            background-color: #fff;
            border-top: none;
        }
        .footer-title {
            color: #007bff;
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .footer-text {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        hr {
            border-top: 1px solid #007bff;
            margin: 1rem 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Este es un mensaje enviado desde ITToluca</div>
                    <div class="card-body">
                        <div class="p-3">
                            <?= $contenido; ?>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="footer-title">Saludos</div>
                        <div class="footer-text">ALU. Noel Jenaro Ortega Aguilar</div>
                        <hr>
                        <div class="footer-text">Tecnológico Nacional de México</div>
                        <div class="footer-text">Instituto Tecnológico de Toluca</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
