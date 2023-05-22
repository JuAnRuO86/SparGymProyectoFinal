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
    <title>Nuevo Usuario</title>
</head>
<body style="color:white;">
    <?php 
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["usuario"];
            $contrasena = $_POST["contrasena"];
            $nombre = $_POST["nombre"];
            $primer_apellido = $_POST["primer_apellido"];
            $segundo_apellido = $_POST["segundo_apellido"];
            $fecha_nacimiento = $_POST["fecha_nacimiento"];
            $rol = $_POST["rol"];


            if (!empty($usuario) && !empty($nombre) && 
                !empty($contrasena) && !empty($primer_apellido) && 
                !empty($fecha_nacimiento)) {

                $segundo_apellido = 
                    !empty($segundo_apellido) ? "'$segundo_apellido'" : "NULL";
    

                $sql = "INSERT INTO usuarios (usuario, contrasena, nombre, 
                    primer_apellido, segundo_apellido, 
                    fecha_nacimiento, rol) VALUES ('$usuario', '$contrasena', '$nombre',
                    '$primer_apellido', $segundo_apellido,
                    '$fecha_nacimiento', '$rol')";

                if ($conexion -> query($sql) == "TRUE") {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Usuario Creado!</strong> El usuario ha sido creado con éxito!.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                } else {
                ?>
                    <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                        <strong>Usuario no creado correctamente!</strong> Se ha producido un error a la hora de crear al usuario!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
            } else {
                ?>
                    <div class="alert alert-danger  cess alert-dismissible fade show" role="alert">
                        <strong>Usuario no creado correctamente!</strong> Se ha producido un error a la hora de crear al usuario!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
        }
    ?>

    <div class="container">
        <hr><h1 style="text-align:center;">Nuevo usuario</h1><hr>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label class="form-label" style="color:white;">Usuario</label>
                        <input class="form-control" type="text" name="usuario">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" style="color:white;">Contraseña</label>
                        <input class="form-control" type="password" name="contrasena">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" style="color:white;">Nombre</label>
                        <input class="form-control" type="text" name="nombre">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" style="color:white;">Primer apellido</label>
                        <input class="form-control" type="text" name="primer_apellido">
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" style="color:white;">Segundo apellido</label>
                        <input class="form-control" type="text" name="segundo_apellido">
                    </div>
                    <div class="form-group mb-4" >
                        <label class="form-label" style="color:white;">Fecha de nacimiento</label>
                        <input class="form-control" type="date" name="fecha_nacimiento">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label class="form-label">Rol</label>
                        <select class="form-select" name="rol">
                            <option value="usuario">Usuario</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>

                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a class="btn btn-secondary" href="./index.php">Volver</a>
                </form><hr>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>