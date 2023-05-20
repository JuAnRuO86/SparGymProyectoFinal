<?php
    $servidor = 'containers-us-west-141.railway.app';
    $usuario = 'root';
    $contrasena = 'Syhksl3FPwKjLcuaOUER';
    $base_de_datos = 'railway';


    
    //MySQLi

    //creamos la variable con la conexion a la bd 
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos) or die("Error en la conexion");
    

?>