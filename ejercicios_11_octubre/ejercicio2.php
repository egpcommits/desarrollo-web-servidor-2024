<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action = "" method = "post">
        <input type = "number" name = "a" placeholder = "a">
        <input type = "number" name = "b" placeholder = "b">
        <input type = "number" name = "c" placeholder = "c">
        <input type = "submit" value = "Mostrar multiplos">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];

        $inicio = $a;
        $final = $b;

        echo "<p>Los multiplos de $c entre $a y $b son: </p>";
        echo "<ul>";
        while ($inicio <= $final) {
            if ($inicio % $c == 0) {
                echo "<li>$inicio </li>";
            }
            $inicio++;
        }
        echo "</ul>";
    }
    ?>
</body>
</html>