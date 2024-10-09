<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Máximo</title>
</head>
<body>
    <!-- 
    Crear array con números a vuestra elección.

    Mostrar dichos números de la forma que más os guste.

    Crear un formulario donde se intente introducir el máximo valor y se compruebe si has acertado.
    -->


    <form action = "" method = "post">
        <label for = "maximo">Máximo</label> <!-- Con el for que indique el id correspondiente, cuando pinchemos en la etiqueta, nos dirigirá al input correspondiente. -->
        <input type = "text" id = "maximo" name = "maximo" placeholder = "Máximo número">
        <input type = "submit" value = "Comprobar">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $maximo = $_POST["maximo"];
        $array = array(21, 9, 11, 2015, 20, 10);
        $mayor = 0;

        foreach($array as $elemento) {
            if ($elemento > $mayor) $mayor = $elemento;
        }

        if ($mayor == $maximo) {
            echo "<p>El mayor número es $mayor y se ha adivinado correctamente ($maximo).</p>";
        } else {
            echo "<p>El mayor número es $mayor y NO se ha adivinado correctamente ($maximo).</p>";
        }
    }
    ?>


</body>
</html>