<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../style.css" />
    <title>Compras</title>
</head>
<body class="FondosPaginas">
    <?php require '../../util/control_de_acceso.php' ?>
    <?php require '../../util/base_de_datos.php' ?>
    <?php require '../header.php' ?>

    <div class="container">
    <h1>Listado de compras</h1>
    <a class="btn btn-secondary" href="../index.php">Inicio</a><br><br>

        <div class="row">
            <div class="col-9">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM vw_clientes_prendas";
                        $resultado = $conexion -> query($sql);

                        if ($resultado -> num_rows > 0) {
                            while ($fila = $resultado -> fetch_assoc()) {
                                $usuario = $fila["usuario"];
                                $producto = $fila["producto"];
                                $cantidad = $fila["cantidad"];
                                $precio_unitario = $fila["precio_unitario"];
                                $fecha = $fila["fecha"];
                                ?>
                                <tr>
                                    <td><a href="./cliente_compras.php?usuario=<?php echo $usuario ?>"><?php echo $usuario ?></a></td>
                                    <td><?php echo $producto ?></td>
                                    <td><?php echo $cantidad ?></td>
                                    <td><?php echo $precio_unitario ?></td>
                                    <td><?php echo $fecha ?></td>
                                </tr>
                                <?php

                                
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

