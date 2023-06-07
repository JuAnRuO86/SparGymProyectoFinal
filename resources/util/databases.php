<?php
    $servidor = 'containers-us-west-137.railway.app';
    $usuario = 'root';
    $contrasena = 'FG1bX4UaLfItFp3gAge0';
    $base_de_datos = 'railway';
    $port = '7045'; 
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos, $port) or die("Error en la conexion");
?>