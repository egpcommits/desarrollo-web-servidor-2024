<!DOCTYPE html>
<html lang="en">
<head>
    <title>Notas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        td, th {
            border: 1px solid black;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            border: 1px solid black;
        }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php

    $notas = [
        ["Paco", "Desarrollo web servidor"],
        ["Paco", "Desarrollo web cliente"],
        ["Manu", "Desarrollo web servidor"],
        ["Manu", "Desarrollo web cliente"]        
    ];

    /*
        Ejercicio 1: añadir al array 4 estudiantes con sus asignaturas.

        Ejercicio 2: eliminar un estudiante y su asignatura a libre elección.

        Ejercicio 3: añadir una tercera columna que será la nota, obtenida aleatoriamente entre 1 y 10.

        Ejercicio 4: añadir una cuarta columna que indique APTO o NO APTO dependiendo de si la nota es igual o superior a 5 o no.

        Ejercicio 5: ordenar alfabeticamente por los alumnos, y luego por nota. Si hay varios filas con el mismo nombre y la misma nota, ordenar por la asignatura alfabeticamente.

        Ejercicio 6: mostrarlo todo en una tabla.
    */

    //Ejercicio 1:
    array_push($notas, ["Luis", "Diseño de interfaces"]);
    array_push($notas, ["Dani", "Bases de datos"]);
    array_push($notas, ["Jaime", "Programación"]);
    array_push($notas, ["Alejandra", "Sistemas informáticos"]);


    //Ejercicio 2:
    unset($notas[rand(0, count($notas))]);
    $notas = array_values($notas); //Para reordenar el array y que no de problemas al sacarlo por pantalla.
    

    // Ejercicio 3:
    $i = 0;
    while ($i < count($notas)) {
        $notas[$i][2] = rand(0, 10);
        $i++;
    }

    for ($i=0; $i < count($notas); $i++) { 
        $nota = $notas[$i][2];
        if ($nota < 5) $notas[$i][3] = "No apto";
        else $notas[$i][3] = "Apto";
    }

    

    // Ejercicio 5:
    $_nombre = array_column($notas, 0);
    $_nota = array_column($notas, 2);
    $_asignatura = array_column($notas, 1);
    array_multisort($_nombre, SORT_ASC, $_nota, SORT_ASC, $_asignatura, SORT_ASC, $notas);
    ?>


    <!-- Ejercicio 4 y 6: -->
    <h3>Notas</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($notas as $estudiante) {
                    list($nombre, $asignatura, $nota, $calificacion) = $estudiante;                    
                    echo "<tr>";
                        echo "<td>$nombre</td>";
                        echo "<td>$asignatura</td>";
                        echo "<td>$nota</td>";
                        echo "<td>$calificacion</td>";
                    echo "</tr>";
                }                
            ?>
        </tbody>
    </table>

    <!--
        foreach($notas as $estudiante) {
            echo "<tr>";
                echo "<td>$notas[0]</td>";
                echo "<td>$notas[1]</td>";
                echo "<td>$notas[2]</td>";                        
                if ($notas[2] < 5) $notas[4] = "No apto";
                else $notas[4] = "Apto";
                echo "<td>$notas[4]</td>";
            echo "</tr>";
        }
    -->
    
</body>
</html>