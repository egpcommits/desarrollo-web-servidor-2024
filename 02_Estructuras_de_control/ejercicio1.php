<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
    /**
     * EJERCICIO 1
     * 
     * Calcula la suma de todos los numeros pares del 0 al 20.
    */

    $i = 0;
    $suma = 0;
    while ($i < 21) {
        if ($i % 2 == 0) { //si es par, resultado = 0 (true), si es impar = 1 (false) -> if ($i % 2) {}
            $suma += $i;
        }
        $i++;
    }

    echo "<p>La suma de todos los numeros pares del 0 al 20 es de: $suma</p>";

    /**
     * EJERCICIO 2
     * 
     * (Hay que investigar un poco)
     * 
     * Muestra por pantalla la fecha actual con el siguiente formato:
     * "Miércoles 25 de septiembre de 2024"
     * 
     * 
     */

    /*switch ($dia) {
        case "Monday":
            $dia_espanol = "Lunes";
            break;
        case "Tuesday":
            $dia_espanol = "Martes";
            break;
        case "Wednesday":
            $dia_espanol = "Miércoles";
            break;
        case "Thursday":
            $dia_espanol = "Jueves";
            break;
        case "Friday":
            $dia_espanol = "Viernes";
            break;
        case "Saturday":
            $dia_espanol = "Sábado";
            break;
        case "Sunday":
            $dia_espanol = "Domingo";
            break;
    }

    switch ($mes) {
        case "January":
            $mes_espanol = "Enero";
            break;
        case "February":
            $mes_espanol = "Febrero";
            break;
        case "March":
            $mes_espanol = "Marzo";
            break;
        case "April":
            $mes_espanol = "Abril";
            break;
        case "May":
            $mes_espanol = "Mayo";
            break;
        case "June":
            $mes_espanol = "Junio";
            break;
        case "July":
            $mes_espanol = "Julio";
            break;
        case "August":
            $mes_espanol = "Agosto";
            break;
        case "September":
            $mes_espanol = "Septiembre";
            break;
        case "October":
            $mes_espanol = "Octubre";
            break;
        case "November":
            $mes_espanol = "Noviembre";
            break;
        case "December":
            $mes_espanol = "Diciembre";
            break;
    }; */


    $dia = date('l'); //Dias de la semana completos
    $mes = date('F'); //Mes escrito completo

    $dia = match ($dia) {
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "Domingo"
    };

    $mes = match ($mes) {
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septiembre",
        "October" => "Octubre",
        "November" => "Noviembre",
        "December" => "Diciembre"
    };

    $dia_numero = date('d'); //dia del mes
    $anio = date('Y'); //año con cuatro digitos

    echo "$dia $dia_numero de $mes de $anio";


    /*
        Hacer un bucle que compruebe si un número es primo.
        Bucle desde 2 hasta n-1, si algun resto = 0, no es primo
    */

    $j = 2;
    $number = 15;
    $primo = true;
    while (($j < $number - 1) && ($primo)) {
        if ($number % 2 == 0) {
            $primo = false;
        }
        $j++;
    };

    if ($primo) {
        echo "<p>El número $number es primo.</p>";
    } else {
        echo "<p>El número $number no es primo.</p>";
    };


    /*
        Muestra por pantalla los 50 primeros numeros primos.
    */

    $numero_primo = 10;
    $contador = 0;
    $k = 0;

    echo "<ul>";
    
    while ($contador < 50) {
        $es_primo = true;
        $k = 0;
        while (($k < $numero_primo) && ($es_primo)) {
            if ($numero_primo % $k == 0) {
                $es_primo = false;
            }
            $k++;
        }
        if ($es_primo) {
            echo "<li>$numero_primo</li>";
            $contador++;
        }
        $numero_primo++;
        
    }

    echo "</ul>";



    // Calcular el fibonacci de los 10 primeros números primos

    ?>
</body>
</html>