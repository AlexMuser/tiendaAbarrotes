<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .form-control {
            border-radius: 0;
        }

        .btn {
            border-radius: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h1 class="text-center mb-4">Enviar correo electrónico</h1>

                @if (Session::has('error'))
                <div class="alert alert-danger">
                {{ Session::get('error') }}
                </div>
                @else
                <div class="alert alert-success">
                {{ Session::get('success') }}
                </div>
                @endif

                {!!  Form::open(['url' => '/enviar_correo', 'role'=>'form', 'method' => 'post']) !!}

                <div class="form-group">
                    {!! Form::label('destinatario', 'Para:', ['class' => 'font-weight-bold']) !!}
                    {!! Form::email('destinatario', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la dirección de destino', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('asunto', 'Asunto:', ['class' => 'font-weight-bold']) !!}
                    {!! Form::text('asunto', null, ['class' => 'form-control', 'placeholder' => 'Asunto', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('contenido_mail', 'Contenido:', ['class' => 'font-weight-bold']) !!}
                    {!! Form::textarea('contenido_mail', null, ['class' => 'form-control', 'placeholder' => 'Contenido', 'rows' => '5', 'required' , 'style' => 'resize: none']) !!}
                </div>

                <div class="form-group text-center">
                    {!! Form::submit('Enviar correo', ['class' => 'btn btn-primary btn-lg']) !!}
                </div>

                <div class="form-group text-center">
                    {!! Form::button('Cancelar', ['class' => 'btn btn-outline-secondary btn-lg', 'onclick' => 'window.history.back();']) !!}
                </div>                

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script
