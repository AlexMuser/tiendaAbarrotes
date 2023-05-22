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
<script src="{!! asset('code/highcharts.js') !!}"></script>
<script src="{!! asset('code/modules/exporting.js') !!}"></script>
<script src="{!! asset('code/modules/export-data.js') !!}"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<div class="centered-button">
    <a href="{!! asset('graficas') !!}">Ir a Gráficas</a>
</div>

<script type="text/javascript">
    // Obtener los datos del array y formatearlos
    var mesesAnios = [];
    var datosVentas = [];
    var datosVentasPagadas = [];

    @foreach ($ventas as $venta)
        var fecha = '{{ date('Y-m', strtotime($venta->fecha)) }}';
        mesesAnios.push(fecha);
        datosVentas.push({{ $venta->total }});
        datosVentasPagadas.push({{ $venta->total_pagado }});
    @endforeach

    Highcharts.chart('container', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Ventas mensuales'
        },
        xAxis: {
            categories: mesesAnios,
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        yAxis: {
            title: {
                text: 'Ventas'
            },
            labels: {
                formatter: function () {
                    return '$' + Highcharts.numberFormat(this.value, 0, ',', '.');
                }
            }
        },
        tooltip: {
            pointFormat: 'Ventas: <b>${point.y:,.0f}</b><br/>Fecha: {point.category}'
        },
        plotOptions: {
            area: {
                marker: {
                    enabled: false,
                    symbol: 'circle',
                    radius: 2,
                    states: {
                        hover: {
                            enabled: true
                        }
                    }
                }
            }
        },
        series: [{
            name: 'Ventas',
            data: datosVentas
        }, {
            name: 'Ventas Pagadas',
            data: datosVentasPagadas
        }]
    });
</script>
</body>
</html>
