<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de ventas</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f8f8;
        }

        .page-container {
            max-width: 8.5in; /* Tamaño carta: 8.5in x 11in */
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .title {
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 24px;
            font-weight: bold;
            margin-left: 10px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .logo {
            max-width: 50px; /* Ajusta el valor según tus necesidades */
        }
    </style>
</head>
<body>
    <div class="page-container">
        <div class="header">
            <h1 class="title"><img src="estilo/img/logo.png" alt="Logo de Tienda Osiris" class="logo">Tienda Osiris</h1>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Reporte de ventas - <?= $date; ?></h3>
            </div>
            <div class="card-body">
                <?php
                $monthNames = [
                    1 => 'Enero',
                    2 => 'Febrero',
                    3 => 'Marzo',
                    4 => 'Abril',
                    5 => 'Mayo',
                    6 => 'Junio',
                    7 => 'Julio',
                    8 => 'Agosto',
                    9 => 'Septiembre',
                    10 => 'Octubre',
                    11 => 'Noviembre',
                    12 => 'Diciembre'
                ];

                $monthYearData = []; // Arreglo para clasificar ventas por mes y año
                foreach ($data as $venta) {
                    $month = date('n', strtotime($venta->fecha)); // Obtener el número de mes
                    $year = date('Y', strtotime($venta->fecha)); // Obtener el año

                    $monthYear = $monthNames[$month] . ' ' . $year; // Combinar el nombre del mes y el año en español

                    if (!isset($monthYearData[$monthYear])) {
                        $monthYearData[$monthYear] = [
                            'ventas' => [],
                            'total' => 0,
                            'total_pagado' => 0
                        ];
                    }
                    $monthYearData[$monthYear]['ventas'][] = $venta;
                    $monthYearData[$monthYear]['total'] += $venta->total;
                    $monthYearData[$monthYear]['total_pagado'] += $venta->total_pagado;
                }

                // Ordenar los datos para mostrar primero los registros con diferentes valores para total y total pagado
                uasort($monthYearData, function($a, $b) {
                    $diff = $b['total'] - $b['total_pagado'] - ($a['total'] - $a['total_pagado']);
                    return ($diff !== 0) ? $diff : strcmp($a, $b);
                });

                foreach ($monthYearData as $monthYear => $datos) {
                ?>
                    <h4><?= $monthYear; ?></h4>
                    <p>Total de ventas: $<?= $datos['total']; ?></p>
                    <p>Total de ventas pagadas: $<?= $datos['total_pagado']; ?></p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Total</th>
                                <th>Total pagado</th>
                                <th>Cliente</th>
                                <th>Tipo de pago</th>
                                <th>Tienda</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos['ventas'] as $venta) { ?>
                                <tr>
                                    <td><?= $venta->id; ?></td>
                                    <td><?= $venta->total; ?></td>
                                    <td><?= $venta->total_pagado; ?></td>
                                    <td><?= $venta->clientes->nombre; ?></td>
                                    <td><?= $venta->tipos_pagos->nombre; ?></td>
                                    <td><?= $venta->tiendas->nombre; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>

        <div class="footer">
            Perteneciente a la tienda Osiris
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
