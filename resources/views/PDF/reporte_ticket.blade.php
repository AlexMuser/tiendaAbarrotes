<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de productos</title>
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
                <h4 class="card-title">
                    Fecha de impresión : <?= $date; ?> <br />
                    Venta numero : <?= $data_venta->id ?>
                </h4>
            </div>
            <div class="card-body">
                <h6>Tienda Osiris</h6>
                <h6>
                    Nombre del cliente: <?= $data_venta->clientes->nombre . ' ' . $data_venta->clientes->ap_pat . ' ' . $data_venta->clientes->ap_mat ?>
                </h6>
                <h6>
                    Ubicación: <?= $data_venta->clientes->tiendas->ubicacion. ', ' . $data_venta->clientes->tiendas->municipios->nombre . ', ' . $data_venta->clientes->tiendas->entidades->nombre ?>
                </h6>
                <h6>
                    Fecha en que se realizo la venta: <?=  $data_venta->fecha?>
                </h6>
                <table class = "table table-bordered">
                    <tr>
                        <td>Cantidad</td>
                        <td>Precio por unidad</td>
                        <td>Producto</td>
                        <td>Subtotal</td>
                    </tr>
                <?php foreach ($data_detalle_venta as $deta) { ?>
                    <tr>
                        <td><?= $deta->cantidad ?></td>
                        <td><?= $deta->precio_venta ?></td>
                        <td><?= $deta->productos->nombre ?></td>
                        <td>$<?= $deta->cantidad*$deta->precio_venta ?></td>
                    </tr>
                <?php } ?>
                </table>
                <h5 style = "text-align: right; margin-right: 30px" >Total $<?= $data_venta->total ?></h5>
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
