

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Inicio/inicio.css" />
    <title>Comprar producto</title>
</head>
<body style="color:white;">
    <?php require '../resources/header.php' ?>
    <?php require '../resources/util/databases.php' ?>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $producto_id = $_POST["producto"];
            $cantidad = $_POST["cantidad"];
            //$cliente_id = 10;
            $fecha = date('Y-m-d H:i:s');   //  2022-11-15 09:25

            //  Buscar el id del cliente que ha iniciado sesión
            $usuario = $_SESSION["usuario"];

            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

            $resultado = $conexion -> query($sql);

            if ($resultado -> num_rows > 0) {
                while ($fila = $resultado -> fetch_assoc()) {
                    $usuario_id = $fila["id"];
                }
            }
            //  Fin de la búsqueda del cliente


            $sql = "INSERT INTO usuarios_productos 
                (usuario_id, producto_id, cantidad, fecha) 
                VALUES 
                ('$usuario_id', '$producto_id', '$cantidad', '$fecha')";

            if ($conexion -> query($sql) == "TRUE") {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Compra realizada
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al comprar
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
        }
    ?>

    <div class="container" >
        <h1>Comprar producto</h1>
        <a class="btn btn-warning" href="../Inicio/index.php">Listado de compras</a>
        <a class="btn btn-secondary" href="../Inicio/index.php">Inicio</a>
        <a class="btn btn-warning" href="./usuario_compras.php">Mis compras</a><br><br>

        <div class="row">
            <div class="col-9">
                <table class="table" style="color:white;">
                    <thead class="table-secondary">
                        <tr>
                            <th>Producto</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM producto";
                        $resultado = $conexion -> query($sql);

                        if ($resultado -> num_rows > 0) {
                            while ($fila = $resultado -> fetch_assoc()) {
                            ?>
                                <form action="" method="post">
                                    <tr>
                                        <td><?php echo $fila["nombre"] ?></td>
                                        <td>
                                            <img width="50" height="60" src="../<?php echo $fila["imagen"] ?>"> <!-- imagen=resources/img/productos/foto1.png -->
                                        </td>
                                        <td><?php echo $fila["precio"] ?>€</td>
                                        <td>
                                            <select class="form-select" name="cantidad">
                                                <option value="1" selected>1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="5">6</option>
                                                <option value="5">7</option>
                                                <option value="5">8</option>
                                                <option value="5">9</option>
                                                <option value="5">10</option>

                                            </select>
                                        </td>
                                        <td>
                                            <input type="hidden" name="producto" value="<?php echo $fila["id"] ?>">
                                            <button class="btn btn-success" type="submit">
                                                Comprar
                                            </button>
                                        </td>
                                    </tr>
                                </form>
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


