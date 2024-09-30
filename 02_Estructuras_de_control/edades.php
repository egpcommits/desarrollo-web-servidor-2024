<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <?php
    $edad = rand(-10,140);

    /* Con if y con math:
        - Si la persona tiene entre 0 y 4 años, es un BEBÉ.
        - Si la persona yiene entre 5 y 17 años, es MENOR DE EDAD.
        - Si la persona tiene entre 18 y 65 años, es ADULTO.
        - Si la persona tiene entre 66 y 120 años, es JUBILADO.
        - Si la edad está fuera de rango, es ERROR. */

    if ($edad >= 0 && $edad <= 4) {
        echo "<p>La persona tiene $edad años y es un BEBÉ.</p>";
    } else if ($edad >= 5 && $edad <= 17) {
        echo "<p>La persona tiene $edad años y es MENOR DE EDAD.</p>";
    } else if ($edad >= 18 && $edad <=65) {
        echo "<p>La persona tiene $edad años y es ADULTO.</p>";
    } else if ($edad >= 66 && $edad <= 120) {
        echo "<p>La persona tiene $edad años y es JUBILADO.</p>";
    } else {
        echo "<p>Es imposible que una persona tenga $edad años...</p>";
    }

    $resultado = match (true) {
        $edad >= 0 && $edad <= 4 => "<p>La persona tiene $edad años y es un BEBÉ.</p>",
        $edad >= 5 && $edad <= 17 => "<p>La persona tiene $edad años y es MENOR DE EDAD.</p>",
        $edad >= 18 && $edad <= 65 => "<p>La persona tiene $edad años y es ADULTO.</p>",
        $edad >= 66 && $edad <= 120 => "<p>La persona tiene $edad años y es JUBILADO.</p>",
        default => "<p>Es imposible que una persona tenga $edad años...</p>"
    };

    echo $resultado;

    ?>
</body>
</html>