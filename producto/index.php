<?php require '../resources/header.php' ?>
<?php require '../resources/util/databases.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href=".https://spargymproyectofinal-production.up.railway.app/Inicio/inicio.css" />
    <title>Index</title>
</head>
<body style="color:white;">
    <div class="container">
        <br>
        <h1>Listado de productos</h1>
        <div class="row">
            <div class="col-9">
                <a class="btn btn-secondary" href=".https://spargymproyectofinal-production.up.railway.app/Inicio/index.php">Inicio</a>
                <a class="btn btn-warning" href=".https://spargymproyectofinal-production.up.railway.app/usuarios/index.php">Usuarios</a>
                <br><br>
                <table class="table" style="color:white;">
                    <thead class="table-secondary">
                        <tr>
                            <th style="color:black; text-align:center;">Nombre</th>
                            <th></th>
                            <th style="color:black;">Precio</th>
                            <th style="color:black;">Categoría</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //Borrar producto
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $id = $_POST["id"];
                            $sql = "DELETE FROM producto WHERE id = '$id'";
                            if($conexion -> query($sql)){
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Se ha borrado el producto
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                            }else{
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Se ha borrado el producto
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                            }
                        }   
                        ?>    
                        <?php
                            $sql = "SELECT * FROM producto";
                            $resultado = $conexion -> query($sql);
                            if ($resultado -> num_rows > 0) {
                                while ($fila = $resultado -> fetch_assoc()) {
                                    $nombre = $fila["nombre"];
                                    $precio = $fila["precio"];
                                    $categoria = $fila["categoria"];
                                    $imagen = $fila["imagen"]
                                    ?>
                                    <tr>
                                        <td style="font-size:20px; font-weight:bold; text-align:center; vertical-align:middle;"><?php echo $nombre ?></td>
                                        <td><img width="150" heigth="170" src="../<?php echo $imagen ?>"> </td>
                                        <td><?php echo $precio ?></td>
                                        <td><?php echo $categoria ?></td>
                                        <td>
                                            <form action="mostrar_producto.php" method="get">
                                                <button class="btn btn-primary" type="submit">Ver</button>
                                                <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                            </form>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <button class="btn btn-danger" type="submit">Borrar</button>
                                                <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                            </form>
                                        </td>
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