<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
</head>
<body>
    <?php
    /*
    SINGLE PAGE FORM - toda la informacion se procesa en la misma página.

    MULTI PAGE FORM - reenvian a otra página.
    */
    ?>

    <!-- action - a que fichero nos va a dirigir el formulario cuando hagamos click. Si se pone vacío, se va a quedar en esa misma página. -->
    <form action = "" method = "post"> 
        <input type = "text" name = "mensaje" placeholder = "mensaje">
        <input type = "text" name = "numero" placeholder = "numero">
        <!-- Name - identificador -->
        <input type = "submit" value = "Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        /*
        El servidor ejecutará este bloque de código cuando reciba una petición a través del método POST.
        ((Este post siempre se escribe en mayuscula, pero el del form da igual.))
        ((Realmente es un array con su clave.))
        */

        /*$mensaje = $_POST["mensaje"];
        echo "<h1>$mensaje</h1>";*/

        //Todo lo que se recibe de un formulario es STRING.
        
        /*
        Modificar el formulario anterior para que se pueda introducir tambien un número.

        El mensaje se mostrará tantas veces como indique el número.
        */

        $mensaje = $_POST["mensaje"];
        $numero = $_POST["numero"];
        $i = 0;
        while ($i < $numero) {
            echo "<p>$mensaje</p>";
            $i++;
        }

    }
    ?>
</body>
</html>