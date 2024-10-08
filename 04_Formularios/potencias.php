<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
</head>
<body>
<!-- 
    Crear un formulario que reciba dos números: base y exponente.
    Se mostrará el resultado de elevar la base al exponente.

    Ejemplos:
    2 ^ 3 = 8
    3 ^ 2 = 9
    2 ^ 0 = 1
-->

    <form action = "" method = "post">
        <input type = "text" name = "base" placeholder = "base">
        <input type = "text" name = "exponente" placeholder = "exponente">
        <input type = "submit" value = "Calcular">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $base = (int)$_POST["base"];
        $exponente = (int)$_POST["exponente"];
        $tmp = $base;

        if ($exponente != 0) {
        for ($i = 1; $i < $exponente; $i++) {
            $tmp *= $base;
        }
    } else {
        $tmp = 1;
    }
    echo "<p>El resultado de elevar $base a $exponente: $tmp</p>";
    }
    ?>
</body>
</html>