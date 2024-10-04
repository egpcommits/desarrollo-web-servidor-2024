<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobuses</title>
    <link href = "estilos.css" rel = "stylesheet">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    //Origen, destino, duracion en minutos, precio en euros
    $autobuses = [
        ["Málaga", "Ronda", 90, 10],
        ["Churriana", "Málaga", 20, 3],
        ["Málaga", "Granada", 120, 15],
        ["Torremolinos", "Málaga", 30, 3.5]
    ];
    ?>

    <!--
        Ejercicio 1: añadir dos lineas de autobús
        Ejercicio 2: ordenar por duración, de más a menos.
        Ejercicio 3: mostrar las líneas en una tabla.
    -->

    <?php
    array_push($autobuses, ["Málaga", "Madrid", 300, 20]); //No hace falta variable intermediaria para meter el array
    array_push($autobuses, ["Cádiz", "Málaga", 120, 7]);
    //array_multisort(array_column($autobuses, 2), SORT_DESC, $autobuses);
    ?>

    <h2>Horario de autobuses - duracion descendiente</h2>
    <table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duracion (min)</th>
            <th>Precio (euros)</th>
        </thead>
        <tbody>
            <?php
            foreach ($autobuses as $autobus) {
                list ($origen, $destino, $duracion, $precio) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$duracion</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>


    <h2>Horario de autobuses - origen ascendente</h2>
    <?php
    
    /*$_origen = array_column($autobuses, 0);
    $_duracion = array_column($autobuses, 2);

    //en el caso de que incluso ordenando por esos dos haya alguno que sea igual, se puede ordenar por un tercer campo (todos los que se quieran)
    $_precio = array_column($autobuses, 3);
    array_multisort($_origen, SORT_ASC, $_duracion, SORT_ASC, $_precio, SORT_ASC, $autobuses);

    unset($autobuses[1]); //se carga la posicion que este en ese momento (despues del sort)*/
    //al hacer un unset, el cajon que se borre queda vacio, pero el resto sigue manteniendo la posicion. El multisort resetea las claves, entonces en ese caso da igual, pero sino hay que borrar las filas teniendo en cuenta el orden original.
    ?>
    <table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duracion (min)</th>
            <th>Precio (euros)</th>
        </thead>
        <tbody>
            <?php
            foreach ($autobuses as $autobus) {
                list ($origen, $destino, $duracion, $precio) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$duracion</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>


        <!--
            Ejercicio 4: insertar 3 autobuses más.

            Ejercicio 5: ordenar, primero por el origen, luego por el destino.

            Ejercicio 6: ordenar, primero por la duración, luego por el precio.
    
        -->

    <?php
    //array_push($autobuses, ["Madrid", "Barcelona", 180, 22]);
    //array_push($autobuses, ["Málaga", "Galicia", 200, 19]);
    //array_push($autobuses, ["Sevilla", "Málaga", 65, 8]);

    //$_origen = array_column($autobuses, 0);
    //$_destino = array_column($autobuses, 1);
    //array_multisort($_origen, SORT_ASC, $_destino, SORT_ASC);
    ?>

    <h2>Horario de autobuses - origen y destino</h2>
    <table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duracion (min)</th>
            <th>Precio (euros)</th>
        </thead>
        <tbody>
            <?php
            foreach ($autobuses as $autobus) {
                list ($origen, $destino, $duracion, $precio) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$duracion</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    //$_duracion = array_column($autobuses, 2);
    //$_precio = array_column($autobuses, 3);
    //array_multisort($_duracion, SORT_ASC, $_precio, SORT_ASC);
    ?>



    <h2>Horario de autobuses - duracion y precio</h2>
    <table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duracion (min)</th>
            <th>Precio (euros)</th>
        </thead>
        <tbody>
            <?php
            foreach ($autobuses as $autobus) {
                list ($origen, $destino, $duracion, $precio) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$duracion</td>";
                echo "<td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>



    

    <?php

    /*
            Si duracion <= 30, corta distancia
            Si duracion > 30 y <= 120, media distancia
            Si duracion > 120, larga distancia
    */

    for ($i = 0; $i < count($autobuses); $i++) { //el count va a devolver cuantos arrays tiene dentro
        //$autobuses[$i][4] = "X";
        /*if ($autobuses[i][2] <= 30) {
            $autobuses[i][4] = "Corta distancia"; //También se puede rellenar aquí mismo.
        }*/
    }
   
    //print_r($autobuses);
    ?>

<h2>Horario de autobuses - una columna más</h2>
    <table>
        <thead>
            <th>Origen</th>
            <th>Destino</th>
            <th>Duracion (min)</th>
            <th>Precio (euros)</th>
            <th>Tipo</th>
        </thead>
        <tbody>
            <?php
            foreach ($autobuses as $autobus) {
                list ($origen, $destino, $duracion, $precio, $tipo) = $autobus;
                echo "<tr>";
                echo "<td>$origen</td>";
                echo "<td>$destino</td>";
                echo "<td>$duracion</td>";
                echo "<td>$precio</td>";
                if ($duracion <= 30) {
                    $tipo = "Corta distancia";
                } else if ($duracion > 30 && $duracion <= 120) {
                    $tipo = "Media distancia";
                } else if ($duracion > 120) {
                    $tipo = "Larga distancia";
                }
                echo "<td>$tipo</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

   
    
</body>
</html>