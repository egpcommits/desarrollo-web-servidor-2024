<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action = "" method = "post">
        <input type = "number" name = "numero1" placeholder = "Número 1">
        <input type = "number" name = "numero2" placeholder = "Número 2">
        <input type = "submit" value = "Comprobar primos">
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inicial = $_POST["numero1"];
        $final = $_POST["numero2"];
        $i = 2;
        $es_primo = true;
    
        while($inicial <= $final) {
            $es_primo = true;
            $i = 2;
            while (($i < ($inicial - 1)) && ($es_primo)) {
                if ($inicial % $i == 0) $es_primo = false;
                $i++;
            }
            if ($es_primo) echo "<p>$inicial es primo.</p>";
            $inicial++;
        }
    }
    
    ?>
</body>
</html>