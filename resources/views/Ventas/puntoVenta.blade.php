<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Punto de venta</title>
    <link rel="stylesheet" href="{{  asset('estilo/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Font%20Awesome%205%20Brands.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/css/Font%20Awesome%205%20Free.css') }}">
    <link rel="stylesheet" href="{{  asset('estilo/fonts/font-awesome.min.css') }}">
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
    <script src="{{ asset('jquery-3.6.4.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    {!! Form::open(['route' => 'puntoDeVenta.store', 'method' => 'POST', 'id' => 'miFormulario', 'onsubmit' => 'asignarDetalleVentas()']) !!}
    <script>
        //Almacenara el detalle venta lo siguiente [cantidad, precio_venta, precio_compra, id_producto]
        var detalleVentas = [];
        var producto;
        var totalAcumulado = 0;
    
        function buscarProducto() {
            var dato = document.getElementById("producto_busqueda").value;
            var ruta = "{{ asset('busquedaProducto') }}/" + dato;
            var data = null;
    
            $.ajax({
                url: ruta,
                type: 'GET',
                success: function(response) {
                    data = response;
                    if (data) {
                        producto = data;
                        var nombreProducto = data.nombre;
                        var descProducto = data.descripcion;
                        var precioVentaProducto = data.precio_venta;
                        $('#nombreProducto').text(nombreProducto);
                        $('#descProducto').text(descProducto);
                        $('#precioVenta').text("$" + precioVentaProducto);
                        buscarTipoVenta();
                        buscarFotoProducto();
                    } else {
                        $('#nombreProducto').text('Producto no encontrado');
                        $('#descProducto').text('Producto no encontrado');
                        $('#precioVenta').text('Producto no encontrado');
                        $('#nomTipoVenta').text('Producto no encontrado');
                        $('#fotoProducto').attr('src', "{{ asset('storage/fotografias/') }}/productoNoEncontrado.png");
                    }
                },
                error: function() {
                    $('#nombreProducto').text('Producto no encontrado');
                    $('#descProducto').text('Producto no encontrado');
                    $('#precioVenta').text('Producto no encontrado');
                    $('#nomTipoVenta').text('Producto no encontrado');
                    $('#fotoProducto').attr('src', "{{ asset('storage/fotografias/') }}/productoNoEncontrado.png");
                }
            });
        }
    
        function buscarTipoVenta() {
            var dato = producto.id_tipo_venta;
            var ruta = "{{ asset('busquedaTipoVenta') }}/" + dato;
            var data = null;
    
            $.ajax({
                url: ruta,
                type: 'GET',
                success: function(response) {
                    data = response;
                    if (data) {
                        var nombreTipoVenta = data.nombre;
                        $('#nomTipoVenta').text(nombreTipoVenta);
                    } else {
                        $('#nomTipoVenta').text('Tipo de venta no funcionó');
                    }
                },
                error: function() {
                    $('#nomTipoVenta').text('Tipo de venta no encontrado');
                }
            });
        }

        function buscarFotoProducto() {
            var dato = producto.id;
            var ruta = "{{ asset('busquedaFotoProducto') }}/" + dato;
            var data = null;
    
            $.ajax({
                url: ruta,
                type: 'GET',
                success: function(response) {
                    data = response;
                    if (data) {
                        var rutaFotoProducto = data.ruta;
                        $('#fotoProducto').attr('src', "{{ asset('storage/fotografias/') }}/" + rutaFotoProducto);
                    } else {
                        $('#fotoProducto').attr('src', "{{ asset('storage/fotografias/') }}/productoNoEncontrado.png");
                    }
                },
                error: function() {
                    $('#fotoProducto').attr('src', "{{ asset('storage/fotografias/') }}/productoNoEncontrado.png");
                }
            });
        }

    

        var contadorProductos = 0;
        var productosAgregados = new Set();

        function agregarProducto() {
            var nombreProducto = producto.nombre;
            var precioProducto = producto.precio_venta;
            var precioCompraProd = producto.precio_compra;
            var idProducto = producto.id;
            var maxProducto = producto.stock;
    
            // Verificar si el nombre del producto es "Producto no encontrado"
            if ($('#nombreProducto').text() == 'Producto no encontrado') {
                alert('No se puede agregar el producto debido a que no se encontró.');
                return;
            }

            // Verificar si el producto ya fue agregado
            if (productosAgregados.has(idProducto)) {
                alert('El producto ya ha sido agregado anteriormente.');
                return;
            }

            //Verificar si hay stock
            if (maxProducto === 0) {
                alert('No se puede agregar el producto porque el stock es 0.');
                return;
            }
    
            contadorProductos++;
    
            var html = '<div class="row">' +
                            '<div class="col">' +
                                '<p>' + nombreProducto + '</p>' +
                            '</div>' +
                            '<div class="col" style="text-align: right;">' +
                                '<p id="precioProducto' + idProducto + '">$' + precioProducto + '</p>' +
                            '</div>' +
                            '<div class="col-xxl-4 offset-xxl-0" style="text-align: right;">' +
                                '<input class="form-control-sm cantidadProducto" id="cantidadProducto' + idProducto + '" type="number" style="width: 90.6px; text-align: right;" value="1" min="1" max="' + maxProducto + '" required="" oninput="validarCantidad(event)">' +
                                '<button class="btn btn-sm btn-danger eliminarProducto" data-id="' + idProducto + '"><i class="fas fa-trash-alt"></i></button>' +
                            '</div>' +
                        '</div>';

            $('#productosContainer').append(html);
            totalAcumulado+=precioProducto;

            //Guarda una venta a detalle ventas
            var detalleUnaVenta = [];
            detalleUnaVenta.push(1, precioCompraProd, precioProducto, idProducto);
            detalleVentas.push(detalleUnaVenta);

            document.getElementById('totalDeProductos').innerHTML = '<em style="font-size: 30px;">TOTAL: ' + totalAcumulado.toFixed(2) + '</em>';
    
            $('#total').val(totalAcumulado.toFixed(2));
            $('#totalPagado').val(totalAcumulado.toFixed(2));

            // Agregar el identificador del producto al conjunto de productos agregados
            productosAgregados.add(idProducto);
    
            $(document).on('change', '.cantidadProducto', function() {
                var idProducto = $(this).attr('id').replace('cantidadProducto', '');
                actualizarPrecio(idProducto);
            });

    
            // Agregar evento click al botón de eliminar
            $('.eliminarProducto[data-id="' + idProducto + '"]').click(function() {
                eliminarProducto(idProducto);
            });
        }

        function actualizarPrecio(idProducto) {
            var cantidad = parseInt($('#cantidadProducto' + idProducto).val());
            var precioUnitario = parseFloat(producto.precio_venta);
            var precioTotal = cantidad * precioUnitario;

            // Restar el precio del producto previamente agregado
            totalAcumulado -= parseFloat($('#precioProducto' + idProducto).text().replace('$', ''));

            // Actualizar el precio total del producto actual
            $('#precioProducto' + idProducto).text('$' + precioTotal.toFixed(2));

            // Sumar el precio del producto actualizado al total acumulado
            totalAcumulado += precioTotal;
        
            for (var i = 0; i < detalleVentas.length; i++) {
                if (detalleVentas[i][3] == idProducto) {
                    detalleVentas[i][0] = cantidad;
                    break;
                }
            }

            // Actualizar el elemento HTML que muestra el total acumulado
            $('#totalAcumulado').text('$' + totalAcumulado.toFixed(2));
            $('#total').val(totalAcumulado.toFixed(2));

            // Actualizar el valor del campo total_pagado
            $('#totalPagado').val(totalAcumulado.toFixed(2));

            document.getElementById('totalDeProductos').innerHTML = '<em style="font-size: 30px;">TOTAL: ' + totalAcumulado.toFixed(2) + '</em>';
        
        }

        function eliminarProducto(idProducto) {
            // Obtener el precio del producto a eliminar
            var precioProducto = parseFloat($('#precioProducto' + idProducto).text().replace('$', ''));

            // Restar el precio del producto eliminado del total acumulado
            totalAcumulado -= precioProducto;

            // Eliminar el producto del contenedor
            $('#productosContainer').find('.row').each(function() {
                var producto = $(this);
                var dataId = producto.find('.eliminarProducto').data('id');
                if (dataId === idProducto) {
                producto.remove();
                return false; // Salir del bucle each
            }
            });

            // Buscar y eliminar el detalle de venta correspondiente al producto
            for (var i = 0; i < detalleVentas.length; i++) {
                if (detalleVentas[i][3] === idProducto) {
                    detalleVentas.splice(i, 1);
                    break;
                }
            }

            // Eliminar el identificador del producto del conjunto de productos agregados
            productosAgregados.delete(idProducto);

            // Actualizar el elemento HTML que muestra el total acumulado
            $('#totalAcumulado').text('$' + totalAcumulado.toFixed(2));
            $('#total').val(totalAcumulado.toFixed(2));

            $('#totalPagado').val(totalAcumulado.toFixed(2));

            document.getElementById('totalDeProductos').innerHTML = '<em style="font-size: 30px;">TOTAL: ' + totalAcumulado.toFixed(2) + '</em>';
        }

        function validarCantidad(event) {
            var input = event.target;
            var max = parseFloat(input.getAttribute('max'));

            if (input.value > max) {
                input.value = max;
            }
        }

        function asignarDetalleVentas() {
            var detalleVentasInput = document.getElementById('detalleVentasInput');
            detalleVentasInput.value = JSON.stringify(detalleVentas);
        }

        $(document).ready(function() {
            $('#totalPagado').on('input', function() {
                var totalPagado = parseFloat($(this).val());
                if (totalPagado > totalAcumulado) {
                    $(this).val(totalAcumulado.toFixed(2));
                }
            });
        });


    </script>        
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-md sticky-top bg-white">
            <div class="container-fluid"><a class="navbar-brand" href="{{ url('/puntoDeVenta') }}">Punto de venta</a>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/clientes') }}">Consultas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/clientes/create') }}">Registrar cliente</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/adeudos') }}">Adeudo</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" style="text-align: center;">
        <div class="row">
            <div class="col">
                <p style="font-style: italic;">Nombre de la tienda: {{ $usuario->tiendas->nombre }}</p>
            </div>
            <div class="col">
                <p style="font-style: italic;">Empleado: {{ $usuario->nombre . " " . $usuario->ap_pat . " " . $usuario->ap_mat }}</p>
            </div>
            <div class="col">
                <p id="tiempo"></p>
            </div>
        </div>
    </div>
    <div class="container" style="background: var(--bs-gray-200);width: 1180px;">
        <div class="row">
            <div class="col-md-6">
                <div style="margin-top: 23px;">
                    <div class="card">
                        <div class="card-body" style="height: 370px;overflow: scroll;">
                            <h4 class="card-title">Resumen</h4>
                            <div class="container" style="margin-top: 25px;">
                                <div class="row">
                                    <div class="col">
                                        <p style="font-style: italic;">Producto</p>
                                    </div>
                                    <div class="col" style="text-align: right;">
                                        <p style="font-style: italic;">Precio</p>
                                    </div>
                                    <div class="col" style="text-align: right;">
                                        <p style="font-style: italic;">Cantidad</p>
                                    </div>
                                </div>
                                <div id="productosContainer"><div class="row">
                                    
                                </div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" style="margin-top: 57px;">
                        <div class="col">
                            <p>Código</p><input type="text" id="producto_busqueda" maxlength="13" style="font-size: 30px;width: 368px;height: 65px;margin-top: -14px;text-align: center;">
                        </div>
                        <div class="col" style="text-align: left;"><button onclick="buscarProducto();" class="btn btn-primary" type="button" style="width: 130px;height: 65px;margin-top: 24px;">Buscar</button></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="margin-top: 23px;"><img id="fotoProducto" class="card-img-top w-100 d-block" src="{{ asset('storage/fotografias/') }}/productoNoEncontrado.png" style="max-width: 290px;margin-right: 0px;margin-left: 130px;" width="290" height="290">
                    <div class="card-body">
                        <h4 id="nombreProducto" class="card-title" style="text-align: center;"></h4>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-3">
                                    <p>Descripción:</p>
                                </div>
                                <div class="col">
                                    <p id="descProducto" style="text-align: right;margin-right: 14px;">breve descripcion&nbsp;</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-4">
                                    <p>Tipo de venta:</p>
                                </div>
                                <div class="col">
                                    <p id="nomTipoVenta" style="text-align: right;margin-right: 14px;">tipo de venta</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p>Precio:</p>
                                </div>
                                <div class="col">
                                    <p id="precioVenta" style="text-align: right;margin-right: 14px;">precio de venta</p>
                                </div>
                            </div>
                        </div><button onclick="agregarProducto()" class="btn btn-primary" type="button" style="background: rgb(30,162,27);">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-right: 0.8px;margin-top: 25px;">
        <div class="row" style=" margin-top: -10px;">
            <div class="col">
                <div style="display: inline;">
                    {!! Form::label('id_cliente', 'Cliente:', ['class'=>'form-label']) !!}
                    @php
                        $optionsClientes = [];
                        foreach ($clientes as $cliente) {
                            $nombreCompleto = $cliente['nombre'] . ' ' . $cliente['ap_pat'] . ' ' . $cliente['ap_mat'];
                            $optionsClientes[$cliente['id']] = $nombreCompleto;
                        }
                        $clientePredeterminado = $clientes->firstWhere('id', 10);
                        $valPredClie = $clientePredeterminado ? $clientePredeterminado['id'] : null;
                    @endphp
                    {!! Form::select('id_cliente', $optionsClientes, $valPredClie, ['class'=>'form-select states order-alpha', 'placeholder'=>'Seleccionar ...', 'required'=>'required', 'style' => 'width: 300px; display: inline;']) !!}
                </div>
                <br />               
                <div style="display: inline;">
                    {!! Form::label('id_tipo_pago', 'Tipo de pago:', ['class'=>'form-label']) !!}
                    @php
                        $optionsPagos = [];
                        foreach ($tipos_pagos as $tipo_pago) {
                            $nombrePago = $tipo_pago['nombre'];
                            $optionsPagos[$tipo_pago['id']] = $nombrePago;
                        }
                        $pagoPredeterminado = $tipos_pagos->firstWhere('id', 1);
                        $valPredPago = $pagoPredeterminado ? $pagoPredeterminado['id'] : null;
                    @endphp
                    {!! Form::select('id_tipo_pago', $optionsPagos, $valPredPago, ['class'=>'form-select states order-alpha', 'placeholder'=>'Seleccionar ...', 'required'=>'required', 'style' => 'width: 200px; display: inline;']) !!}
                </div>   
            </div>
            <div class="col">
                <strong id="totalDeProductos" style="font-size: 24px;"><em style="font-size: 30px;">TOTAL: 0</em></strong>
                <p>
                    Cantidad a pagar: &nbsp; &nbsp; &nbsp; &nbsp;
                    {!! Form::number('total_pagado', 0, ['id' => 'totalPagado', 'step' => '0.50', 'min' => '0']) !!}
                </p>
            </div>
            {{ Form::hidden('detalleVentas', null, ['id' => 'detalleVentasInput']) }}
            {{ Form::hidden('total', null, ['id' => 'total']) }}
            {{ Form::hidden('id_usuario', $usuario->id) }}
            {{ Form::hidden('id_tienda', $usuario->tiendas->id) }}
            <div class="col" style=" margin-top: 10px; margin-left: -90px;">
                {!! Form::submit('Realizar venta', ['class' => 'btn btn-primary', 'style' => 'width: 173.2px; height: 75px; font-size: 22px; background: rgb(248,1,105); margin-top: -15px; margin-right: 0px; margin-bottom: -1px; margin-left: 109px;']) !!}
            </div>
        </div>
    </div>
    <script>
        // Función para obtener la fecha y hora actual
        function obtenerFechaHoraActual() {
          var fecha = new Date();
          var horas = fecha.getHours();
          var minutos = fecha.getMinutes();
          var segundos = fecha.getSeconds();
          var dia = fecha.getDate();
          var mes = fecha.getMonth() + 1; // Los meses comienzan en 0, por lo que se suma 1
          var año = fecha.getFullYear();
      
          // Ajustar el formato de las horas
          var periodo = "a.m.";
          if (horas >= 12) {
            periodo = "p.m.";
            if (horas > 12) {
              horas -= 12;
            }
          }
          if (horas === 0) {
            horas = 12;
          }
      
          // Ajustar el formato de los minutos y segundos
          if (minutos < 10) {
            minutos = "0" + minutos;
          }
          if (segundos < 10) {
            segundos = "0" + segundos;
          }
      
          // Ajustar el formato del día y mes
          if (dia < 10) {
            dia = "0" + dia;
          }
          if (mes < 10) {
            mes = "0" + mes;
          }
      
          // Actualizar el contenido del elemento HTML con la fecha y hora actual
          document.getElementById("tiempo").innerHTML = horas + ":" + minutos + ":" + segundos + " " + periodo + "&nbsp;&nbsp;" + dia + "/" + mes + "/" + año;
      
          // Actualizar la fecha y hora cada segundo
          setTimeout(obtenerFechaHoraActual, 1000);
        }
      
        // Llamar a la función para iniciar la actualización de la fecha y hora
        obtenerFechaHoraActual();
    </script>
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                    title: '¿Desea imprimir el ticket?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Sí',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.value) {
                        var id_venta = '{{ session('id_venta') }}'; // Obtener el ID de la venta desde la sesión
                        if (id_venta) {
                            window.open('/ticket/1/' + id_venta, '_blank');
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'ID de venta no proporcionado',
                                text: 'No se ha proporcionado el ID de venta'
                            });
                        }
                    } else {
                        window.location.href = '/puntoDeVenta';
                    }
                });
                }

            });
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}'
            }).then((result) => {
                if (result.value) {
                    window.location.href = '/puntoDeVenta';
                }
            });
        });
    </script>
    @endif
    <style>
        #abeja {
            position: fixed;
            top: 0;
            left: 0;
            transform: translate(-50%, -50%);
        }
    
        .flip-horizontal {
            transform: scaleX(-1);
        }
    </style>
    
    <div id="abeja" style="position: fixed; top: 0; left: 0;">
        <img src="{{ asset('storage/fotografias/') }}/abeja.webp" alt="Abeja volando" width="50" height="50">
    </div>
    
    <script>
        var abejaElement = document.getElementById('abeja');
        var abejaImg = abejaElement.querySelector('img');
        var posX = Math.random() * window.innerWidth;
        var posY = Math.random() * window.innerHeight;
        var velocidadX = (Math.random() - 0.5) * 4;
        var velocidadY = (Math.random() - 0.5) * 4;
    
        function moverAbeja() {
            posX += velocidadX;
            posY += velocidadY;
    
            // Verifica si la abeja ha alcanzado los límites de la pantalla
            if (posX < 0 || posX > window.innerWidth) {
                velocidadX *= -1; // Invierte la dirección horizontal
                if (velocidadX > 0) {
                    abejaImg.classList.add('flip-horizontal');
                } else {
                    abejaImg.classList.remove('flip-horizontal');
                }
            }
            if (posY < 0 || posY > window.innerHeight) {
                velocidadY *= -1; // Invierte la dirección vertical
            }
    
            abejaElement.style.transform = 'translate(' + posX + 'px, ' + posY + 'px)';
    
            requestAnimationFrame(moverAbeja);
        }
    
        window.onload = function () {
            moverAbeja();
        };
    </script>
        
    <script src="{{  asset('estilo/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/jquery.tablesorter.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-filter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/js/widgets/widget-storage.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{  asset('estilo/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---1-Index-Table-with-Search--Sort-Filters.js') }}"></script>
    <script src="{{  asset('estilo/js/Ludens---1-Index-Table-with-Search--Sort-Filters-v20-Ludens---Material-UI-Actions.js') }}"></script>
    <script src="{{  asset('estilo/js/bootstrap/js/bootstrap.min.js') }}"></script>
    {!! Form::close() !!}
</body>

</html>