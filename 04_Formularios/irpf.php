<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IRPF</title>
</head>
<body>
    <form action = "" method = "post">
        <input type = "text" name = "cantidad" placeholder = "Cantidad">
        <input type = "submit" value = "Calcular IRPF">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cantidad = $_POST["cantidad"];
        $resultado = 0;
        $tramo1 = $cantidad - (12450 * 0.19);
        $tramo2 = $cantidad - ((20200 - 12450) * 0.24);
        $tramo3 = $cantidad - ((35200 - 20200) * 0.3);
        $tramo4 = $cantidad - ((60000 - 35200) * 0.37);
        $tramo5 = $cantidad - ((300000 - 60000) * 0.45);

        if ($cantidad > 0 && $cantidad < 12450) {
            $resultado = $tramo1;
        } else if ($cantidad >= 12450 && $cantidad <= 20199) {
            $tramo1;
        } else if ($cantidad >= 20200 && $cantidad <= 35199) {
            $tramo1;
            $tramo2;
        } else if ($cantidad >= 35200 && $cantidad <= 59999) {
            $tramo1;
            $tramo2;
            $tramo3;
        } else if ($cantidad >= 60000 && $cantidad <= 299999) {
            $tramo1;
            $tramo2;
            $tramo3;
            $tramo4;
        } else if ($cantidad > 300000) {
            $tramo1;
            $tramo2;
            $tramo3;
            $tramo4;
            $tramo5;
            $resultado = $cantidad - 30000;
        }

        echo "<p>$resultado</p>";
    }
    ?>
</body>
</html>