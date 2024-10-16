<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor</title>
</head>
<body>
    <form action = "" method = "post">
        <input type = "text" name = "cantidad" placeholder = "Introduce cantidad">
        <input type = "submit" value = "Convertir">
        <br><br>
        <label for = "de">De:</label>
        <select name = "de" id = "de">
            <option value = "euro">Euro</option>
            <option value = "dolar">Dólar</option>
            <option value = "yen">Yen</option>
        </select>
        <label for = "a">A:</label>
        <select name = "a" id = "a">
            <option value = "euro">Euro</option>
            <option value = "dolar">Dólar</option>
            <option value = "yen">Yen</option>
        </select>
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cantidad = $_POST["cantidad"];
        $de = $_POST["de"];
        $a = $_POST["a"];

        $resultado = 0;


        if (($de === "euro") && ($a === "dolar")) $resultado = $cantidad * 1.09;
        else if (($de === "euro") && ($a === "yen")) $resultado = $cantidad * 162.74;
        else if (($de === "dolar") && ($a === "euro")) $resultado = $cantidad * 0.92;
        else if (($de === "dolar") && ($a === "yen")) $resultado = $cantidad * 149.67;
        else if (($de === "yen") && ($a === "euro")) $resultado = $cantidad * 0.0061;
        else if (($de === "yen") && ($a === "dolar")) $resultado = $cantidad * 0.0067;
        else $resultado = $cantidad;

        echo "<p>$cantidad $de = $resultado $a</p>";
    }
    ?>
</body>
</html>