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
                <h3 class="card-title">Reporte de productos - <?= $date; ?></h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Proveedor</th>
                            <th>Producto</th>
                            <th>Existencia</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $producto) { ?>
                            <tr>
                                <td><?= $producto->id; ?></td>
                                <td><?= $producto->proveedores->nombre; ?></td>
                                <td><?= $producto->nombre; ?></td>
                                <td><span class="badge badge-danger"><?= $producto->existencia; ?></span></td>
                                <td><?= $producto->precio_compra; ?></td>
                                <td><?= $producto->precio_venta; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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
