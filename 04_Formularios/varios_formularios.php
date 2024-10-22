<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varios formularios</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    require('../05_Funciones/edades.php');
    require('../05_Funciones/potencias.php');
    ?>
</head>
<body>
    <h1>Formulario edades</h1>
    <form action = "" method = "post">
        <input type = "text" name = "nombre" placeholder = "nombre">
        <input type = "text" name = "edad" placeholder = "edad">
        <input type = "hidden" name = "accion" value = "formulario_edad">
        <!--El usuario no lo ve pero se manda en el formulario-->
        <input type = "submit" value = "Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_edad") {
            $nombre = $_POST["nombre"];
            $edad = $_POST["edad"];

            comprobarEdad($nombre, $edad);
        }
    }
    ?>

    <br><br>
    <h1>Formulario potencias</h1>
    <form action = "" method = "post">
        <input type = "text" name = "base" placeholder = "base">
        <input type = "text" name = "exponente" placeholder = "exponente">
        <input type = "hidden" name = "accion" value = "formulario_potencia">
        <input type = "submit" value = "Calcular">
    </form>

    <!--
    
    Depende del value de accion, se hace una cosa u otra en el codigo
    
    Puede tener el nombre que sea, pero todos los formularios tendran el mismo nombre (aqui 'accion').
    -->

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_potencia") {
            $tmp_base = $_POST["base"]; //tmp para comprbar que no se ha metido nada "raro"
            $tmp_exponente = $_POST["exponente"];

            //validacion de la base
            if ($tmp_base != ''){
                if (is_numeric($tmp_base)) {
                    if ($tmp_base > 0) {
                        $base = $tmp_base;
                    } else {
                        echo "<p>La base debe ser mayor a 0.</p>";
                    }
                } else {
                    echo "<p>La base debe ser un número.</p>";
                }
            } else {
                echo "<p>La base es obligatoria</p>";
            }

            //validacion de la exponente
            if ($tmp_exponente != ''){
                if (is_numeric($tmp_exponente)) {
                    if ($tmp_exponente > 0) {
                        $exponente = $tmp_exponente;
                    } else {
                        echo "<p>El exponente debe ser mayor a 0.</p>";
                    }
                } else {
                    echo "<p>El exponente debe ser un número.</p>";
                }
            } else {
                echo "<p>El exponente es obligatorio.</p>";
            }

            if ((isset($base)) && (isset($exponente))) $resultado = calcularPotencia($base, $exponente);

            
        }
    }
    ?>
</body>
</html>