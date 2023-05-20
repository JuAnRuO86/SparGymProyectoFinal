<?php
    $servidor = 'localhost';
    $usuario = 'Ruiz';
    $contrasena = 'Ruiz';
    $base_de_datos = 'db_spargym';


    
    //MySQLi

    //creamos la variable con la conexion a la bd 
    $conexion = new mysqli($servidor, $usuario, $contrasena, $base_de_datos) or die("Error en la conexion");
    

?>