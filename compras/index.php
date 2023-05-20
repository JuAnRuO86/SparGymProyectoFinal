<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Inicio/inicio.css" />
    <title>Listado de Compras</title>
</head>
<body style="color:white;">
    <?php require '../resources/header.php' ?>
    <?php require '../resources/util/databases.php' ?>

    <div class="container">
    <h1>Listado de compras</h1>
    <a class="btn btn-warning" href="../usuarios/index.php">Usuarios</a>
    <a class="btn btn-secondary" href="../Inicio/index.php">Inicio</a>
    <a class="btn btn-warning" href="./comprar_producto.php">Comprar</a><br><br>


        <div class="row">
            <div class="col-9">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th></th>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM vw_usuarios_productos";
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
                                    <td><img width="50" heigth="70" src=<?php echo "../resources/img/usuarios/usuario.png" ?>> </td>    
                                    <td><a href="./usuario_compras.php?usuario=<?php echo $usuario ?>"><?php echo $usuario ?></a></td>
                                    <td style="color:white;"><?php echo $producto ?></td>
                                    <td style="color:white;"><?php echo $cantidad ?></td>
                                    <td style="color:white;"><?php echo $precio_unitario ?></td>
                                    <td style="color:white;"><?php echo $fecha ?></td>
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

