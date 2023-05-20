<?php
    $servidor = 'containers-us-west-141.railway.app';
    $usuario = 'root';
    $contrasena = 'Syhksl3FPwKjLcuaOUER';
    $base_de_datos = 'railway';
    $port = '6783';

    
    //MySQLi

    //creamos la variable con la conexion a la bd 
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos, $port) or die("Error en la conexion");
    

?>