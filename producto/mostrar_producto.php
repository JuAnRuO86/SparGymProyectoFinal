<?php require 'https://spargymproyectofinal-production.up.railway.app/resources/header.php' ?>
<?php require 'https://spargymproyectofinal-production.up.railway.app/resources/util/databases.php' ?>
<!-- MUESTRA Y EDITA LOS PRODUCTOS -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://spargymproyectofinal-production.up.railway.app/resources/bootstrap.min.css">
    <link rel="stylesheet" href="https://spargymproyectofinal-production.up.railway.app/Inicio/inicio.css">
</head>

<body style="width=100vw; height:100vh;">
   
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];

        $sql = "SELECT * FROM producto where id=$id";
        $resultado = $conexion->query($sql);
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $id = $row["id"];
                $nombre = $row["nombre"];
                $precio = $row["precio"];
                $imagen = $row["imagen"];
                $categoria = $row["categoria"];
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nombre"])) {
            ?>
            <div id="mensaje" class="alert alert-danger cess alert-dismissible fade show" role="alert" style="width: 50%; height: 50%; text-align: center; margin: auto; padding-top: 10%; font-size: 23px;">
                <strong>Modificación Errónea!</strong> ¡El nombre no debe estar vacío!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="window.location.href = 'index.php';"></button>
            </div>
            <?php

            echo '<script>
                setTimeout(function() {
                    document.getElementById("mensaje").style.display = "none"; // Oculta el mensaje después de 3 segundos
                    window.location.href = "index.php"; // Redirecciona a otra página
                }, 3000); // Tiempo en milisegundos
            </script>';
            
            exit;
        }
        elseif (empty($_POST["precio"]) || !is_numeric($_POST["precio"])) {
            ?>
            <div id="mensaje" class="alert alert-danger  cess alert-dismissible fade show" role="alert" style="width: 50%; height: 50%; text-align: center; margin: auto; padding-top: 10%; font-size: 23px;">
                <strong>Modificación Erronea!</strong><br> ¡El precio debe ser numérico y no debe estar vacío!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="window.location.href = 'index.php';"></button>
            </div>
            <?php

            echo '<script>
            setTimeout(function() {
                document.getElementById("mensaje").style.display = "none"; // Oculta el mensaje después de 3 segundos
                window.location.href = "index.php"; // Redirecciona a otra página
            }, 3000); // Tiempo en milisegundos
            </script>';

            exit;
        }else{
            $id2 = $_POST["id"];

            $sql2 = "SELECT imagen FROM producto where id=$id2";
            $resultado2 = $conexion->query($sql2);

            $nombre2 = $_POST["nombre"];
            $precio2 = $_POST["precio"];
            $imagen2 = $_POST["imagen"];
            $categoria2 = $_POST["categoria"];

            $sql3 = "UPDATE producto SET nombre = '$nombre2',
                                    precio = '$precio2',
                                    imagen = '$imagen2',
                                    categoria = '$categoria2'
                                 WHERE id = $id2";

        if ($conexion->query($sql3) == "TRUE") {
            $nombre = $_POST["nombre"];
            $precio = $_POST["precio"];
            $imagen = $_POST["imagen"];
            $categoria = $_POST["categoria"];
        ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Producto Modificado!</strong> El producto ha sido modificado con éxito!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        header("Location: index.php");
        exit;
        }
    }
    
    ?>
    
    <div class="container">
        <div class="row mt-5 ">
            <div class="col-4">
                <p class="list-group">
                <h3>Detalles Del Producto</h3>
                <div class="card" style="width: 18rem;">
                    <img src="<?php echo "../" . $imagen ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre ?></h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php echo "" ?></li>
                            <li class="list-group-item"><?php echo "Precio: " . $precio ."€" ?></li>
                            <li class="list-group-item"><?php echo "Categoría: " . $categoria ?></li>
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
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo$nombre ?>">
                    <br>
                    <label class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio" value="<?php echo$precio?>">
                    <br>
                    <label class="form-label">Categoría</label>
                    <select class="form-select" name="categoria">
                        <option value="NUTRICION">NUTRICION</option>
                        <option value="ROPA">ROPA</option>
                        <option value="VITAMINAS">VITAMINAS</option>
                        <option value="VEGAN">VEGAN</option>
                    </select>
                    <br>
                        <input type="hidden" class="form-control" name="imagen" value="<?php echo$imagen?>">
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-primary" type="submit">Completar</button>
                </form>    
            </div>
        </div>
    </div>

    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>