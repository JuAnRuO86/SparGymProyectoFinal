<?php
    //recuperamos la sesion
    session_start();
    //destruimos la sesion y todos los datos que llevas
    session_destroy();
    //Redirigimos al login
    header("location: https://spargymproyectofinal-production.up.railway.app/index.php");
?>