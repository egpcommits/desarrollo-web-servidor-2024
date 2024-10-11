<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action = "" method = "post">
        <input type = "number" name = "numero1" placeholder = "Número 1">
        <input type = "number" name = "numero2" placeholder = "Número 2">
        <input type = "number" name = "numero3" placeholder = "Número 3">
        <input type = "submit" value = "Comprobar el mayor">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero1 = $_POST["numero1"];
        $numero2 = $_POST["numero2"];
        $numero3 = $_POST["numero3"];

        $mayor = 0;
        $i = 0;

        if ($numero1 > $numero2) $mayor = $numero1;
        if ($numero2 > $numero3) $mayor = $numero2;
        if ($numero3 > $numero1) $mayor = $numero3;
            

        echo "<p>El mayor número es $mayor</p>";
    }
    ?>
</body>
</html>