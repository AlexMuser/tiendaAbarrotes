<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Highcharts Example</title>

    <style type="text/css">

    </style>

    <style type="text/css">
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        #container {
            min-width: 310px;
            height: 400px;
            max-width: 600px;
            margin: 20px auto;
        }

        .list-container {
            display: flex;
            justify-content: space-around;
            margin: 20px auto;
        }

        .list {
            text-align: center;
            margin: 0 10px;
        }

        .list h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .list ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .list li {
            margin-bottom: 5px;
        }
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
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="../../code/highcharts.js"></script>
<script src="../../code/modules/exporting.js"></script>
<script src="../../code/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

<div id="acreditado-list"></div>
<div id="pendiente-list"></div>

<div class="centered-button">
    <a href="{!! asset('graficas') !!}">Ir a Gráficas</a>
</div>

<script type="text/javascript">
// Sample data using PHP array
var clientes = <?php echo json_encode($clientes); ?>;

// Create separate arrays for 'Acreditado' and 'Pendiente' clients
var acreditadoClientes = clientes.filter(function(cliente) {
    return cliente.estadoPago === 'Acreditado';
});

var pendienteClientes = clientes.filter(function(cliente) {
    return cliente.estadoPago === 'Pendiente';
});

// Create the chart
Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Estado de pagos de los clientes'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Estado de pago',
        colorByPoint: true,
        data: [{
            name: 'Acreditado',
            y: acreditadoClientes.length
        }, {
            name: 'Pendiente',
            y: pendienteClientes.length
        }]
    }]
});

// Display 'Acreditado' clients in a list
var acreditadoList = "<h2>Clientes con estado Acreditado:</h2><ul>";
acreditadoClientes.forEach(function(cliente) {
    acreditadoList += "<li> ID: " + cliente.id + " Nombre: " + cliente.nombre + " " + cliente.ap_pat + " " + cliente.ap_mat + "</li>";
});
acreditadoList += "</ul>";
document.getElementById('acreditado-list').innerHTML = acreditadoList;

// Display 'Pendiente' clients in a list
var pendienteList = "<h2>Clientes con estado Pendiente:</h2><ul>";
pendienteClientes.forEach(function(cliente) {
    pendienteList += "<li> ID: " + cliente.id + " Nombre: " + cliente.nombre + " " + cliente.ap_pat + " " + cliente.ap_mat + "</li>";
});
pendienteList += "</ul>";
document.getElementById('pendiente-list').innerHTML = pendienteList;
</script>
</body>
</html>
