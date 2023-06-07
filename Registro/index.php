<?php
    require '../resources/util/databases.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["name"];
        $primer_apellido = $_POST["primer_apellido"];
        $segundo_apellido = $_POST["segundo_apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $usuario = $_POST["username"];
        $contrasena = $_POST["contrasena"];
        $contrasenaConfirm = $_POST["confirm"];
        $rol = $_POST["rol"];
        // if(empty($rol)){
        //     $rol = 'usuario';
        // }else{
        //     $rol = 'administrador';
        // }
        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        if (!empty($nombre) && !empty($usuario) && !empty($contrasena) && !empty($contrasenaConfirm)) {
            //creamos la sentencia SQL
            if ($contrasena == $contrasenaConfirm) {
                $sql = "INSERT INTO usuarios (contrasena, usuario, nombre, primer_apellido, segundo_apellido, fecha_nacimiento, rol)
                VALUES('$hash_contrasena', '$usuario','$nombre','$primer_apellido','$segundo_apellido','$fecha_nacimiento', '$rol')";

                //si la sentencia se ejecuta correctamente mostramos ok si no pues no
                if ($conexion->query($sql) == "TRUE") {
                    header("location: ../index.php");
                    exit;
                } else {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Error al insertar
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                No coinciden las contraseñas
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
        }
    }
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Registro Usuario</title>
</head>

<body>
    <div class="container">
    <h2 id="spargymLogin">🔱SPARGYM🔱</h2>

        <div class="row main">
            <div class="main-login main-center">
                <h4 style="text-align:center;">Registro De Inicio De Sesión</h4><hr>
                <form class="" method="post" action="#">

                    <div class="form-group">
                        <label for="name" class="cols-sm-2 control-label">Nombre</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Introduce tu nombre" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="primer_apellido" class="cols-sm-2 control-label">Primer Apellido</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="primer_apellido" id="primer_apellido" placeholder="Introduce tu primer apellido" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="segundo_apellido" class="cols-sm-2 control-label">Segundo Apellido</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="segundo_apellido" id="segundo_apellido" placeholder="Introduce tu segundo apellido" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fecha_nacimiento" class="cols-sm-2 control-label">Fecha de nacimiento</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" placeholder="Introduce tu fecha de nacimiento" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="cols-sm-2 control-label">Username</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username" placeholder="Introduce tu nombre de usuario" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="contrasena" class="cols-sm-2 control-label">Contrasena</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="contrasena" id="contrasena" placeholder="Introduce constrasena" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm" class="cols-sm-2 control-label">Confirmar Contrasena</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="confirm" id="confirm" placeholder="Confirmar Contrasena" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="rol" class="cols-sm-2 control-label">Rol</label>
                        <div class="cols-sm-10">
                            <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <select name="rol" class="form-control">
                                <option value="usuario">Usuario</option>
                                <option value="administrador">Administrador</option>
                            </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group ">
                        <button href="" type="submit" id="button" class="btn btn-primary btn-lg btn-block login-button">Registrar</button>
                    </div>
                    <div class="form-group ">
                        <a href="../index.php" class="btn btn-warning btn-lg btn-block login-button">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>