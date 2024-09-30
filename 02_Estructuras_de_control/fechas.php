<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
        echo date("l"); //Imprime el dia de la semana

        echo date("j"); //Imprime el dia en numero

        $dia = date("j");

        if ($dia % 2 == 0) {
            echo "<p>El día es par</p>";
        } else {
            echo "<p>El día es impar</p>";
        }
    ?>
</body>
</html>