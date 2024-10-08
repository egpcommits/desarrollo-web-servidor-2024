<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <!--
    Crear un formulario que reciba dos valores: el nombre y la edad de una persona.

    Si la persona tiene:

        < de 18 años, se mostrará "X es menor de edad" (X es el nombre).
        >= 18 && < 65, se mostrará "X es mayor de edad.
        >= 65, se mostrará "X se ha jubilado".

    Hacer la lógica con la estructura MATCH.
    -->

    <form action = "" method = "post">
        <input type = "text" name = "nombre" placeholder = "nombre">
        <input type = "text" name = "edad" placeholder = "edad">
        <input type = "submit" value = "Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $edad = (int)$_POST["edad"];

        $resultado = match (true) {
            $edad < 18 => "es menor de edad.",
            $edad >= 18 && $edad <65 => "es mayor de edad.",
            $edad >= 65 => "está jubilado."
        };

        echo "<p>$nombre, con $edad años, $resultado</p>";
    }
    ?>
</body>
</html>