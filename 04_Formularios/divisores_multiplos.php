<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divisores</title>
</head>
<body>
    <form action = "" method = "post">
        <input type = "text" name = "numero">
        <input type = "submit" value = "Calcular divisores">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];

        echo "<h2>Divisores</h2>";

        for ($i = 1; $i <= $numero; $i++) {
            if ($numero % $i == 0) echo "<p>$i es divisor</p>";
        }

        echo "<h2>Multiplos</h2>";

        for ($i = 1; $i <= 100; $i++) {
            if ($i % $numero == 0) echo "<p>$i es multiplo</p>";
        }
    }
    ?>
</body>
</html>