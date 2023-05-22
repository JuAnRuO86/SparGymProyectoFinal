<?php require '../resources/header.php' ?>
<?php require '../resources/util/databases.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Inicio/inicio.css" />
    <title>Document</title>
</head>
<body style="color:white;">    
    <?php 
    if(!empty($_GET["usuario"])){
        $usuario = $_GET["usuario"];
    }else{
        $usuario = $_SESSION["usuario"];
    }
    ?>
    <?php  
        if(isset($_POST['eliminar'])) {
            $usuario_producto_id = $_POST['eliminar'];
            $sql = "DELETE FROM usuarios_productos WHERE id = '$usuario_producto_id'";
            $resultado = $conexion -> query($sql);
        
            if ($resultado) {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Se ha eliminado la compra seleccionada correctamente
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            } else {
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Error al eliminar la compra seleccionada
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
        }
        

    ?>  
          
    <div class="container">
        <h1>Compras de <?php echo $usuario ?></h1>
        <a class="btn btn-warning" href="./comprar_producto.php">Comprar</a>
        <a class="btn btn-secondary" href="../Inicio/index.php">Inicio</a><br><br>

        <div class="row">
            <div class="col-9">
                <table class="table">
                    <thead class="table table-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Subtotal</th>
                            <th>Fecha</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody style="color:white;">
                        <?php
                        $sql = "SELECT * FROM vw_usuarios_productos
                                    WHERE usuario = '$usuario'";
                        
                        $resultado = $conexion -> query($sql);
                        $precio_total = 0;

                        if ($resultado -> num_rows > 0) {
                            while($fila = $resultado -> fetch_assoc()) {
                                $producto = $fila["producto"];
                                $cantidad = $fila["cantidad"];
                                $precio_unitario = $fila["precio_unitario"];
                                $fecha = $fila["fecha"];
                                $precio_total += ($precio_unitario * $cantidad);
                                ?>
                                <tr>
                                    <td><?php echo $producto ?></td>
                                    <td><?php echo $cantidad?></td>
                                    <td><?php echo $precio_unitario . "€" ?></td>
                                    <td><?php echo $precio_unitario*$cantidad . "€" ?></td>
                                    <td><?php echo $fecha ?></td>
                                    <td>
                                        <form method="POST" action="">                    
                                            <button class="btn btn-danger" type="submit" name="eliminar" value="<?php echo $fila["id"] ?>">
                                                Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <h4><span class="badge bg-success">Total: <?php echo $precio_total ?>€</span></h4><hr><br>
                <!-- Mandamos los datos del producto comprado por get a la factura -->
                <form action="../factura/invoice.php" target="_blank" method="POST" class="badge bg-info" style="font-size:20px;">
                                                <a>
                                                    <strong>Ver Factura</strong>
                                                    <button class="btn  btn-secondary" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z" />
                                                        </svg>
                                                    </button>
                                                </a>
                                                <input type="hidden" name="usuario" value="<?php echo $usuario ?>">
                                                <input type="hidden" name="producto" value="<?php echo $producto ?>">
                                                <input type="hidden" name="precio_unitario" value="<?php echo $precio_unitario ?>">
                                                <input type="hidden" name="cantidad" value="<?php echo $cantidad ?>">
                                                <input type="hidden" name="fecha" value="<?php echo $fecha ?>">
                                            </form>
            </div>
        </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>