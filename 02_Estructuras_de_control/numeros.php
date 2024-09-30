<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros</title>
</head>
<body>
    <?php

    $numero = 0;

    /*
    if ($numero > 0) { 
        echo "<p>El número $numero es positivo</p>";
    } else if ($numero < 0) {
        echo "<p>El número $numero no es positivo </p>";
    } else {
        echo "<p>El número es cero </p>";
    }
    
    //Si la instruccion es de una sola linea, se pueden quitar los parentesis, como en java.
    if ($numero > 0) echo "<p>El número $numero es positivo</p>"; 
    else if ($numero < 0) echo "<p>El número $numero no es positivo </p>";
    else echo "<p>El número es cero </p>";

    if ($numero > 0): //Como en plsql
        echo "<p>El número $numero es positivo</p>";
    elseif ($numero < 0):
        echo "<p>El número $numero no es positivo </p>";
    else:
        echo "<p>El número es cero </p>";
    endif;*/

    $numero = 3;

    //   Rangos: [-10,0), [0,10], (10,20]
    if ($numero >= -10 && $numero < 0) { //Se puede usar ampersand
        echo "El numero $numero está en el rango [-10,0)";
    } else if ($numero >= 0 and $numero <= 10) { //Se puede usar and
        echo "El numero $numero está en el rango [0,10]";
    } elseif ($numero > 10 && $numero <= 20) {
        echo "El numero $numero está en el rango (10,20]";
    } else {
        echo "El numero no está en ningun rango";
    }

    echo "<br>";

    if ($numero >= -10 && $numero < 0): //Se puede usar ampersand
        echo "El numero $numero está en el rango [-10,0)";
    elseif ($numero >= 0 and $numero <= 10): //Se puede usar and
        echo "El numero $numero está en el rango [0,10]";
    elseif ($numero > 10 && $numero <= 20):
        echo "El numero $numero está en el rango (10,20]";
    else:
        echo "El numero no está en ningun rango";
    endif;

    echo "<br>";

    /*
        $numero1 = 3;
        $numero2 = 4;

        Escribir un if que decida cual de los dos numeros es mayor, o si son iguales.
        Hacerlo de dos dormas diferentes.
    */

    $numero1 = 20;
    $numero2 = 20;

    if ($numero1 > $numero2) {
        echo "<p>$numero1 es mayor que $numero2</p>";
    } else if ($numero2 > $numero1) {
        echo "<p>$numero2 es mayor que $numero1</p>";
    } else {
        echo "<p>Los numeros son iguales.</p>";
    }

    if ($numero1 > $numero2) echo "<p>$numero1 es mayor que $numero2</p>";
    else if ($numero2 > $numero1) echo "<p>$numero2 es mayor que $numero1</p>";
    else echo "<p>Los numeros son iguales.</p>";


    //   Rangos: [-10,0), [0,10], (10,20]
    $numero = rand(-10,20);
    $resultado = match(true) {
        $numero >= -10 && $numero <0 => "El número $numero está en el rango [-10,0)",
        $numero >= 0 && $numero <= 10 => "El número $numero está en el rango [0,10]",
        $numero > 10 && $numero <= 20 => "El número $numero está en el rango (10,20]"
    };
    echo $resultado;

    ?>
</body>
</html>