<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles.css" />
    <title>Nueva Prenda</title>
</head>
<body class="FondosPaginas">
    <?php
        require '../../util/base_de_datos.php';
        require '../../util/control_de_acceso.php';
        require './validacion.php';

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            if (isset($_POST["talla"])) {
                $talla = $_POST["talla"];
            } else {
                $talla = "";
            }
            $precio = depurar ($_POST["precio"]);
            if (isset($_POST["categoria"])) {
                $categoria = $_POST["categoria"];
            } else {
                $categoria = "";
            }
            $file_name = $_FILES["imagen"]["name"];
            $file_temp_name = $_FILES["imagen"]["tmp_name"];
            $path = "../../resources/images/prendas/" . $file_name;

            

            if (!empty($nombre) && !empty($talla) && !empty($precio)) {
                //Subimos la imagen a la carpeta deseada
                if(move_uploaded_file($file_temp_name, $path)){
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Fichero movido con éxito
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }else{
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        No se ha podido mover el fichero
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                }
                 
                //Insertamos la prenda en la base de datos
                $precio = 
                !empty($precio) ? "'$precio'" : "NULL";

                $imagen = "./resources/images/prendas/" . $file_name;
                if (!empty($categoria)) {
                    $sql = "INSERT INTO prenda (nombre, talla, precio, categoria, imagen)
                        VALUES ('$nombre', '$talla', $precio, '$categoria', '$imagen')";
                } else {
                    $sql = "INSERT INTO prenda (nombre, talla, precio, imagen)
                        VALUES ('$nombre', '$talla', $precio, '$imagen')";
            }
                

                if ($conexion -> query($sql) == "TRUE") {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Se ha insertado la prenda
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                    } else {
                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error al insertar
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                }
            }
        ?>

    <div class="container">
        <?php require '../header.php' ?>
        <br>
        <h1>Nueva Prenda</h1> 
        
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3" >
                        <label class="form-label" style="color:white;">Nombre</label>
                        <input class="form-control" type="text" name="nombre">
                        <span class="error" style="color: rgb(253, 53, 53);">
                                * <?php if (isset($err_nombre)) echo $err_nombre ?>
                            </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" style="color:white;">Talla</label>
                        <select class="form-select" name="talla">
                            <option value="" selected disabled hidden>-- Selecciona la talla --</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                        <span class="error" style="color: rgb(253, 53, 53);">
                                * <?php if (isset($err_talla)) echo $err_talla ?>
                            </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" style="color:white;">Precio</label>
                        <input class="form-control" type="text" name="precio">
                        <span class="error" style="color: rgb(253, 53, 53);">
                                * <?php if (isset($err_precio)) echo $err_precio ?>
                            </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" style="color:white;">Categoría</label>
                        <select class="form-select" name="categoria">
                            <option value="" selected disabled hidden>-- Selecciona la categoría --</option>
                            <option value="CAMISETAS">Camisetas</option>
                            <option value="PANTALONES">Pantalones</option>
                            <option value="ACCESORIOS">Accesorios</option>
                        </select>
                        <span class="error" style="color: rgb(253, 53, 53);">
                                * <?php if (isset($err_categoria)) echo $err_categoria ?>
                            </span>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" style="color:white;">Imagen</label>
                        <input class="form-control" type="file" name="imagen">
                    </div>
                    <button class="btn btn-primary" type="submit">Crear</button>
                    <a class="btn btn-secondary" href="index.php">Volver</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>


                                                 -->