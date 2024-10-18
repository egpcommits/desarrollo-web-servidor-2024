<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA</title>
    <?php


    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );


    //Declaración de variables constantes
    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);
    ?>
</head>
<body>
    <!--
        4% superreducido x1,04
        10% reducido x1,10
        21% general x2,1
    -->

    <form action = "" method = "get">
    <label for = "precio">Precio</label>
    <input type = "number" name = "precio" id = "precio"><br><br>
    <label for = "iva">IVA</label>
    <select name = "iva" id = "iva">
        <option value = "general">General</option>
        <option value = "reducido">Reducido</option>
        <option value = "superreducido">Superreducido</option>
    </select><br><br>
    <input type = "submit" value = "Calcular PVP">
    </form>


    
    <?php
    //El metodo get se va a activar cada vez que se recarga la pagina web. Si se va a ejecutar siempre, no hace falta poner requestmethod....
    
    //isset (is set) - comprobar si se ha introducido o seleccionado algo en el formulario.
    //devuelve true si se han pasado parametros, sino devuelve false
    if ((isset($_GET["precio"])) && (isset($_GET["iva"]))) {
        //Aqui solo entra si se le da al boton, haya o no datos. ((NO VALE SI SIMPLEMENTE SE HA RECARGADO LA PAGINA))
        $iva = $_GET["iva"];
        $precio = $_GET["precio"];

        if ($precio != '' && $iva != '') {
            //Aqui solo entra si se le ha dado al boton y ademas se han introducido datos.
            $pvp = match ($iva) {
                "general" => GENERAL * $precio,
                "reducido" => REDUCIDO * $precio,
                "superreducido" => SUPERREDUCIDO * $precio
            };
    
            echo "<p>El PVP es $pvp</p>";
        } else {
            echo "<p>Por favor, rellena todos los datos.</p>";
        }

        
    }
        
    ?>
</body>
</html>