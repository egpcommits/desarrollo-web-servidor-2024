<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>
    <form action = "" method = "post">
        <input type = "number" name = "numero1" placeholder = "Número 1">
        <input type = "number" name = "numero2" placeholder = "Número 2">
        <input type = "submit" value = "Comprobar primos">
    </form>


    <?php
    $inicial = $_POST["numero1"];
    $final = $_POST["numero2"];
    $i = 2;
    $es_primo = true;

    while($inicial < $final) {
        $es_primo = true;
        while (($i < $inicial - 1) && ($es_primo)) {
            if ($inicial % 2 == 0) {
                $es_primo = false;
            }
            $i++;
        }
        if ($es_primo) echo "<p>$inicial es primo.</p>";
        $inicial++;
    }
    ?>
</body>
</html>