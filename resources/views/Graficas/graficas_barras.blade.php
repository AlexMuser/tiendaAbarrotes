<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Highcharts Example</title>

    <style type="text/css">

    </style>

    <style type="text/css">
        /* Estilo del botón */
        .centered-button {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .centered-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
</head>
<body>
<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>
<script src="../../code/modules/export-data.js"></script>

<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>

<div class="centered-button">
    <a href="{!! asset('graficas') !!}">Ir a Gráficas</a>
</div>

<script type="text/javascript">
    var productos = [
        @foreach ($productos as $index => $producto)
            {
                name: '{{ $producto->nombre }}',
                y: {{ $producto->existencia }},
                color: 'rgb({{ ($index * 50) % 255 }}, {{ ($index * 100) % 255 }}, {{ ($index * 150) % 255 }})' // Color personalizado para cada barra
            },
        @endforeach
    ];

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Total de productos'
        },
        subtitle: {
            text: 'Propiedad de tienda osiris'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Existencia'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Existencia: <b>{point.y}</b>'
        },
        series: [{
            name: 'Existencia',
            data: productos,
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y}', // Mostrar existencia sin decimales
                y: 10, // 10 pixels hacia abajo desde la parte superior
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
</script>
</body>
</html>
