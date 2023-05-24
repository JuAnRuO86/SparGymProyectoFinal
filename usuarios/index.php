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
    <title>Index</title>
</head>
<body style="color:white;">
    
    <div class="container">
      
        <br>
        <h1 >Listado de usuarios</h1>

        <div class="row">
            <div class="col-9">
                <a class="btn btn-warning" href="../producto/index.php">Productos</a> 
                <a class="btn btn-secondary" href="../Inicio/index.php">Inicio</a> 
                <a class="btn btn-warning" href="../compras/index.php">Listado de compras</a> <br><br>

                <br>
                <a class="btn btn-primary" href="./insertar_usuario.php">Nuevo usuario</a> 
                <br><br><br>
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Rol</th>
                            <th></th>
                            <th>Usuario </th>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Fecha de nacimiento</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //Borrar cliente
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $id = $_POST["id"];

                            $sql = "DELETE FROM usuarios WHERE id = '$id'";

                            if($conexion -> query($sql)){
                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Se ha borrado el usuario
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php
                            }else{
                                ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Error al borrar usuario
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                            }
                        }   
                        ?>
                        


    
                        <?php
                            $sql = "SELECT * FROM usuarios";
                            $resultado = $conexion -> query($sql);

                            if ($resultado -> num_rows > 0) {
                                while ($fila = $resultado -> fetch_assoc()) {
                                    $usuario = $fila["usuario"];
                                    $contrasena = $fila["contrasena"];
                                    $nombre = $fila["nombre"];
                                    $primer_apellido = $fila["primer_apellido"];
                                    $segundo_apellido = $fila["segundo_apellido"];
                                    $fecha_nacimiento = $fila["fecha_nacimiento"];
                                    $rol = $fila["rol"];
                                    $imagen = "../resources/img/usuarios/usuario.png";
                                    ?>
                                    <tr>
                                        <td style="color:white; font-weight: bold;"><?php echo $rol ?></td>
                                        <td><img width="50" heigth="70" src=<?php echo $imagen ?>> </td>    
                                        <td style="color:white;"><?php echo $usuario ?></td>
                                        <td style="color:white;"><?php echo $nombre ?></td>
                                        <td style="color:white;"><?php echo $primer_apellido ?></td>
                                        <td style="color:white;"><?php echo $segundo_apellido ?></td>
                                        <td style="color:white;"><?php echo $fecha_nacimiento ?></td>
                                        <td>
                                            <form action="mostrar_usuario.php" method="get">
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