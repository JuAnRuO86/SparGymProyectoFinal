<?php require '../resources/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../resources/bootstrap.min.css">
    <link rel="stylesheet" href="inicio.css">
</head>
<body>
    <hr><div>
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false" style="display: flex; justify-content: center; min-height: 55vh;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner" style="width:35%;">
                <div class="carousel-item active">
                    <img src="../resources/img/LogoSP.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../resources/img/espartanosinicio2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container ">
        <div class="row mt-5 mx-auto justify-content-center">
            <div class="col-8">
                <p class="list-group">
                <H1 style="text-align:center;">¡Te esperamos!</H1>
                </p>
            </div>
        </div>
        <?php
        //cogemos el rol del sesion que esta en el header que lometemeos con un require
        $rol = $_SESSION["rol"];
        if ($rol == "administrador") {
        ?>
            <div class="row mt-5 pb-5">
                <div class="col-4">
                    <div class="card">
                        <h1 style="text-align:center;">ADMIN</h1>
                        <img class="card-img-top" src="../resources/img/productos/productos.webp" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Productos</h5>
                            <p class="card-text">
                                En este apartado podrás ver el listado de productos y eliminar productos de la lista.
                                
                            </p>
                            <a href="../producto/index.php" class="btn btn-outline-info">Ir</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <h1 style="text-align:center;">ADMIN</h1>
                        <img class="card-img-top" src="../resources/img/usuarios/usuario.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                            <p class="card-text">
                                En este apartado podrás ver los usuarios registrados.<hr>
                                Podrás eliminar a los usuarios y ver su información.              
                            </p>
                            <a href="../usuarios/index.php" class="btn btn-outline-info">Ir</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <h1 style="text-align:center;">ADMIN</h1>
                        <img class="card-img-top" src="../resources/img/listacompras.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Compras</h5>
                            <p class="card-text">
                                En este apartado podrás un listado de las compras realizadas por los distintos usuarios.<hr>
                                Podrás acceder a las compras individuales de cada usuario.
                            </p>
                            <a href="../compras/usuario_compras.php" class="btn btn-outline-info">Ir</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="row mt-5 pb-5">
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="../resources/img/Ropa1.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Comprar</h5>
                            <p class="card-text">
                                En este apartado podrás ver los productos a la venta.<hr>
                                Podrás comprar cuanto desees.
                            </p>
                            <a href="../compras/comprar_producto.php" class="btn btn-outline-info">Ir</a>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <img class="card-img-top" src="../resources/img/carrito.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Mis compras</h5>
                            <p class="card-text">
                                En este apartado podrás ver los productos que tienes en el carrito.<hr>
                                Podrás eliminar si algo no te convence.
                            </p>
                            <a href="../compras/usuario_compras.php" class="btn btn-outline-info">Ir</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>