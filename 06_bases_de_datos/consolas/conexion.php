<?php
    $_servidor = "localhost"; // ip del seridor donde esta la base de datos, en este caso localhost o "127.0.0.1" (loopback)
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "consolas_bd";

    // Tenemos dos opciones de librerias para crear una coneion con BBDD: Mysqli (más simple) o PDO (más completa).
    $_conexion = new Mysqli($_servidor, $_usuario, $_contrasena, $_base_de_datos) //Objeto de tipo Mysqli
        or die("Error de conexión"); //Por si no consigue conectarse o crear el objeto.
?>