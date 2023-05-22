<?php
require './resources/util/databases.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
    if (!empty($usuario) && !empty($contrasena)) {
        //creamos la sentencia SQL
        $sql = " SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $hash_contrasena = $row["contrasena"];
                $rol = $row["rol"];
            }
            $acceso_valido = password_verify($contrasena, $hash_contrasena);
            if ($acceso_valido == TRUE) {
                //creamos la sesion y mandamos el usuarios
                session_start();
                $_SESSION["usuario"] = $usuario;
                $_SESSION["rol"] = $rol;
                header("location: ./Inicio/index.php");
            } else {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                Contraseña Incorrecta!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
            }
        }
    }
}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesion</title>
    <meta http-equiv=”Expires” content=”0″>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
    <div class="container h-100">
        <h2 id="spargymLogin">🔱SPARGYM🔱</h2>
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="./resources/img/LogoSP.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form action="#" method="POST">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="usuario" class="form-control input_user" placeholder="Usuario">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="contrasena" class="form-control input_pass" placeholder="Contrasena">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline">Recordar</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-3 login_container">
                            <button type="submit" name="button" class="btn login_btn">Login</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4">
                    <div class="d-flex justify-content-center links">
                        ¡Regístrate ya! <a href="./Registro/index.php" class="ml-2">Registrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>