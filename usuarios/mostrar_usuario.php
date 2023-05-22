<?php require '../resources/header.php' ?>
<?php require '../resources/util/databases.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
    <link rel="stylesheet" href="../Inicio/inicio.css">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];

        $sql = "SELECT * FROM usuarios where id=$id";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $id = $row["id"];
                $usuario = $row["usuario"];
                $nombre = $row["nombre"];
                $apellido1 = $row["primer_apellido"];
                $apellido2 = $row["segundo_apellido"];
                $fechaNacimiento = $row["fecha_nacimiento"];
                $rol = $row["rol"];
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id2 = $_POST["id"];

        $sql2 = "SELECT * FROM usuarios where id=$id2";
        $resultado2 = $conexion->query($sql2);

        $usuario2 = $_POST["usuario"];
        $nombre2 = $_POST["nombre"];
        $apellido12 = $_POST["primer_apellido"];
        $apellido22 = $_POST["segundo_apellido"];
        $fechaNacimiento2 = $_POST["fecha_nacimiento"];

        $sql3 = "UPDATE usuarios SET  usuario = '$usuario2', 
                                    nombre = '$nombre2',
                                    primer_apellido = '$apellido12',
                                    segundo_apellido = '$apellido22',
                                    fecha_nacimiento = '$fechaNacimiento2'
                                 WHERE id = '$id2'";

        if ($conexion->query($sql3) == "TRUE") {
            $usuario = $_POST["usuario"];
            $nombre = $_POST["nombre"];
            $apellido1 = $_POST["primer_apellido"];
            $apellido2 = $_POST["segundo_apellido"];
            $fechaNacimiento = $_POST["fecha_nacimiento"];
    ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Usuario Modificado!</strong> El usuario ha sido modificada con éxito!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                <strong>Modificación Erronea!</strong>Se ha producido un error a la hora de modificar el usuario!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php
        }
    }

    ?>

    <div class="container">
        <div class="row mt-5 ">
            <div class="col-4">
                <p class="list-group">
                <h3>Detalles Del Usuario</h3>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo "../resources/img/usuarios/usuario.png" ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo $usuario ?></li>
                            <li class="list-group-item"><?php echo $nombre ." ". $apellido1 ." ".  $apellido2 ?></li>
                            <li class="list-group-item"><?php echo $fechaNacimiento ?></li>
                        </ul>
                    </div>
                    <div class="card-body mx-auto">
                        <form action="" method="POST">
                            <button type="button" class="btn btn-primary" data-bs-target="#form" data-bs-toggle="collapse">Editar</button>
                            <a class="btn btn-secondary" href="index.php">Volver</a>
                        </form>
                    </div>
                </div>
                </p>
            </div>

            <div class="collapse col-8" id="form">
                <form action="" method="POST" enctype="multipart/form-data">
                    <label class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" value="<?php echo$usuario ?>">
                    <br>
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo$nombre ?>">
                    <br>
                    <label class="form-label">Apellido 1</label>
                    <input type="text" class="form-control" name="primer_apellido" value="<?php echo$apellido1 ?>">
                    <br>
                    <label class="form-label">Apellido 2</label>
                    <input type="text" class="form-control" name="segundo_apellido" value="<?php echo$apellido2 ?>">
                    <br>
                    <label class="form-label">Fecha Nacimiento</label>
                    <input type="date" class=" form-control sm-form-control" name="fecha_nacimiento" value="<?php echo$fechaNacimiento ?>">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-primary" type="submit">Editar</button>
                    <a class="btn btn-secondary" href="index.php">Volver</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>