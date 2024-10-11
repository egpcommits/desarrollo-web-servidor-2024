<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    
</head>
<body>
    <form action = "" method = "post">
        <input type = "text" name = "temperatura" placeholder = "Temperatura">
        <br><br>
        <label for = "de">De:</label>
        <select name = "de" id = "de">
            <option value = "celsius">Celsius</option>
            <option value = "kelvin">Kelvin</option>
            <option value = "fahrenheit">Fahrenheit</option>            
        </select>
        <label for = "a">A:</label>
        <select name = "a" id = "a">
            <option value = "celsius">Celsius</option>
            <option value = "kelvin">Kelvin</option>
            <option value = "fahrenheit">Fahrenheit</option>            
        </select>
        <br><br>
        <input type = "submit" value = "Calcular conversión">
    </form>

    <!--
    fahrenheit - fahrenheit
    fahrenheit - celsius
    fahrenheit - kelvin
    -->

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $de = $_POST["de"];
        $a = $_POST["a"];
        $temperatura = $_POST["temperatura"];
        $resultado = 0;

        if (($de == "celsius") && ($a == "kelvin")) $temperatura + 273.15;
        else if (($de == "celsius") && ($a == "fahrenheit")) $resultado = ($temperatura * 9 / 5) + 32;
        else if (($de == "kelvin") && ($a == "celsius")) $resultado = $temperatura - 273.15;
        else if (($de == "kelvin") && ($a == "fahrenheit")) $resultado = ($temperatura - 273.15) * (9 / 5) + 32;
        else if (($de == "fahrenheit") && ($a == "celsius")) $resultado = ($temperatura - 32) * (5 / 9);
        else if (($de == "fahrenheit") && ($a == "kelvin")) $resultado = ($temperatura - 32) * (5 / 9) + 273.15;
        else $resultado = $temperatura;

        echo "<p>$temperatura $de = $resultado $a</p>";
    }
    ?>
</body>
</html>