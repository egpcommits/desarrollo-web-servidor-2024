<?php
    $_servidor = "localhost"; // ip del seridor donde esta la base de datos, en este caso localhost o "127.0.0.1" (loopback)
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "animes_bd";

    // Tenemos dos opciones de librerias para crear una coneion con BBDD: Mysqli (más simple) o PDO (más completa).

    try {
        $_conexion = new PDO("mysql:host=$_servidor;dbname=$_base_de_datos", $_usuario,$_contrasena); //solo 2 parametros
        $_conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Conexión fallida: " . $e -> getMessage());
    }