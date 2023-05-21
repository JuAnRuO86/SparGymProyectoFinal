<?php
session_start();
$rol = $_SESSION["rol"];
if ($rol == "administrador") {
?>
    <div style="background-color:rgba(90, 19, 19);">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand">🔱SPARGYM🔱</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../Inicio">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../producto">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../usuarios">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../compras">Listado de compras</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../compras/comprar_producto.php">Comprar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../compras/usuario_compras.php">Mis compras</a>
                            </li>
                        </ul>
                    </div>
                    <a href="./cerrarSesion/cerrarSesion.php"><img src="../resources/img/logout.png" style="width: 30px;"></a>
                    <?php
                    //comprobamos si hay sesion
                    if (!isset($_SESSION["usuario"])) { // si no hay sesion nos redirige todo el rato al login
                        header("location: ../index.php");
                    } else {
                        echo "<a>" . $_SESSION["usuario"] . "</a>"; // si hay sesion pues mostramos el echo en la pagina destino 
                    }
                    ?>
                </div>
            </nav>
        </div>
    </div>
<?php
} else {
?>
    <div style="background-color:rgba(90, 19, 19);">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand">🔱SPARGYM🔱</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="../Inicio">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../compras/comprar_producto.php">Comprar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="../compras/usuario_compras.php">Mis compras</a>
                            </li>
                        </ul>
                    </div>
                    <a href="./cerrarSesion/cerrarSesion.php"><img src="../resources//img/logout.png" style="width: 30px;"></a>
                    <?php
                    //comprobamos si hay sesion
                    if (!isset($_SESSION["usuario"])) { // si no hay sesion nos redirige todo el rato al login
                        header("location: ../index.php");
                    } else {
                        echo "<a>" . $_SESSION["usuario"] . "</a>"; // si hay sesion pues mostramos el echo en la pagina destino 
                    }
                    ?>
                </div>
            </nav>
        </div>
    </div>
<?php
}
?>