<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
        $var = "hola mundo";
        //echo $var;
        var_dump($var); //Para que te muestre el tipo de dato de la variable
        
        $var = 3; //Para los booleanos, 0 es falso, y cualquier otro caso es verdadero
        var_dump($var); //Se le cambia el tipo

        define("EDAD", 25);
        echo EDAD;

        echo "<br>"; //Para hacer salto de linea

        echo "<h2 style='color: orange'>La variable es $var</h2>"; //El echo imprime, pero no da salto de linea

        $frase1 = "hola";
        $frase2 = "mundo";

        echo "<p>$frase1" . " $frase2</p>";
        echo $frase1 . $frase2;
    ?>
    <br>
    $var = 1;  <!--Si está fuera de la etiqueta php, se va a tratar como texto plano, porque esta en html-->
</body>
</html>