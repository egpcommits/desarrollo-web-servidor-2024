<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos arrays</title>
    <link href = "estilos.css" rel = "stylesheet">

    <!-- Si intentamos acceder a un cajon del array que no existe, salta este warning. -->
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php

    //Para claves siempre utilizar NUMEROS ENTEROS o STRING.

    $frutas1 = array (
        "Clave 1" => "Manzana",
        "Clave 2" => "Naranja",
        "Clave 3" => "Cereza"
    );

    //echo $frutas1["Clave 3"];

    $frutas2 = array (
        1 => "Manzana",
        2 => "Naranja",
        3 => "Cereza"
    );

    $frutas3 = array ( //Si no se especifica la clave, se asignan numeros automaticamente. Este es el más parecido a JAVA
        "Manzana",
        "Naranja",
        "Cereza"
    );

    

    //echo $frutas3[1];


    /**
     * Crear un array con una lista de personas donde la clave sea DNI y el valor el nombre.
     * 
     * Que haya minimo 3 presonas.
     * 
     * Mostrar el array completo con print_r y a alguna persona individual.
     */

    $array_bleach = array (
        "39563840Z" => "Kuchiki Byakuya",
        "19558654G" => "Urahara Kisuke",
        "69565546E" => "Shihoin Yoruichi"
    );

    print_r($array_bleach);
    echo "<p>" . $array_bleach["39563840Z"] . "</p>";



    $frutas3 = array ( 
        "Manzana",
        "Naranja",
        "Cereza"
    );

    array_push($frutas3, "Mango", "Melocotón");
    $frutas3[] = "Melón";
    $frutas3[7] = "Uva"; //Los cajones que esten en medio no existen
    $frutas3 [] = "Sandía"; //Lo añade al proximo cajon libre

    $frutas3 = array_values($frutas3); //Reordena el cajon en caso de que, por ejemplo, no existan cajones de por medio. Machaca todas las claves que hay y las vuelve a reasignar desde 0.

    unset($frutas3[1]); //Elimina el cajon 1.
    $frutas3 = array_values($frutas3);

    //print_r($frutas3);
    
    /* Eñadir elementos con o sin clave.
    
    Borrar algun elemento.
    
    Probar a resetear las claves. */

    $array_bleach [] = "Kuchiki Rukia";
    $array_bleach ["25874398J"] = "Zaraki Kenpachi"; //Se añade la clave poniendo la clave entre comillas
    unset($array_bleach[0]);
    $array_bleach = array_values($array_bleach);
    print_r($array_bleach);


    $tamano = count($array_bleach);
    echo "<h3>$tamano</h3>";


    //Recorrer array con bucle FOR
    echo "<h3>Mis frutas con FOR</h3>";
    echo "<ol>";
    for ($i = 0; $i < count($frutas3); $i++) {
        echo "<li>" . $frutas3[$i] . "</li>";
    }
    echo "</ol>";


    //Recorrer array con bucle WHILE
    echo "<h3>Mis frutas con WHILE</h3>";
    echo "<ol>";
    $i = 0;
    while ($i < count($frutas3)) {
        echo "<li>" . $frutas3[$i] . "</li>";
        $i++;
    }
    echo "</ol>";


    //Recorrer array con bucle FOREACH
    echo "<h3>Mis frutas con FOREACH</h3>";
    echo "<ol>";
    foreach ($frutas3 as $fruta) {
        echo "<li>$fruta</li>";
    }
    echo "</ol>";

    echo "<h3>Mis frutas con FOREACH y clave incluida</h3>";
    echo "<ol>";
    foreach ($frutas3 as $clave => $fruta) {
        echo "<li>$clave, $fruta</li>";
    }
    echo "</ol>";


    echo "<h3>Personajes de BLEACH con FOREACH</h3>";
    echo "<ol>";
    foreach ($array_bleach as $personajes) {
        echo "<li>$personajes</li>";
    }
    echo "</ol>";

    echo "<h3>Personajes de BLEACH con FOREACH y clave incluida</h3>";
    echo "<ol>";
    foreach ($array_bleach as $clave => $personajes) {
        echo "<li>$clave, $personajes</li>";
    }
    echo "</ol>";
    ?>

    
    <h3>Tabla con FOREACH</h3>
    <table>
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $array_bleach["38592835D"] = "Kyouraku";
            $array_bleach["20385018K"] = "Ukitake";
            //sort($array_bleach);
            //asort($array_bleach); //asociative sort
            //rsort($array_bleach); //reverse sort
            //arsort($array_bleach); //asociative reverse sort
            //ksort($array_bleach); //ordena por la key
            krsort($array_bleach);
            foreach ($array_bleach as $clave => $personajes) {
                echo "<tr><td>$clave</td><td>$personajes</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Tabla con FOREACH (distinto codigo)</h3>
    <table>
        <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($array_bleach as $clave => $personajes) { ?>
                <tr>
                    <td><?php echo $clave ?></td>
                    <td><?php echo $personajes ?></td>
                </tr>
            <?php }
            ?>
        </tbody>
    </table>

    <?php
    $otras_frutas = [
        "Melocoton",
        "Fresa",
        "Albaricoque"
    ];

    if ($frutas3 == $otras_frutas) { //Para que sean iguales LAS CLAVES TIENEN QUE SER IGUAL que en el otro array, además tiene que corresponder EL VALOR
        echo "<h3>Los arrays son iguales</h3>";
    } else {
        echo "<h3>Los arrays no son iguales</h3>";
    }


    $numeros1 = [1, 2, 3, 4, 5];
    $numeros2 = ["1", "2", "3", "4", "5"];

    if ($numeros1 === $numeros2) { //Con el tercer igual que compara tambien el tipo de dato, da que no son iguales. Si se quita, sale que son iguales.
        echo "<h3>Los arrays de números son iguales</h3>";
    } else {
        echo "<h3>Los arrays de números no son iguales</h3>";
    }
    ?>

    <!--
    Desarrollo web servidor => Alejandra
    Desarrollo web cliente => Jaime
    Diseño de interfaces => José
    Despliegue de aplicaciones => Alejandro
    Empresa e iniciativa emprendedora => Gloria
    Inglés => Virginia

    Mostrar en una tabla las asignaturas y sus respectivos profesores.
    
    Luego:
    Mostrar una tabla adicional ordenada por la asignatura en orden alfabetico.

    Mostrar una tabla adicional ordenada por los profesores en orden alfabetico inverso.
    -->

    <?php
    $profesores = array (
        "Desarrollo web servidor" => "Alejandra",
        "Desarrollo web cliente" => "Jaime",
        "Diseño de interfaces" => "José",
        "Despliegue de aplicaciones" => "Alejandro",
        "Empresa e iniciativa emprendedora" => "Gloria",
        "Inglés" => "Virginia"
    )
    ?>


    <h3>Lista de asignaturas y profesores ordenadas por asignatura en orden alfabetico</h3>
    <table>
        <thead>
            <th>Asignaturas</th>
            <th>Profesor</th>
        </thead>
        <tbody>
            <?php
            ksort($profesores);
            foreach ($profesores as $asignaturas => $profes){
                echo "<tr>";
                echo "<td>$asignaturas</td>";
                echo "<td>$profes</td>";
                echo "</tr>";
            }
            
            ?>
        </tbody>
    </table>

    <h3>Lista de asignaturas y profesores ordenadas por los profesores en orden alfabetico inverso</h3>
    <table>
        <thead>
            <th>Asignaturas</th>
            <th>Profesor</th>
        </thead>
        <tbody>
            <?php
            arsort($profesores);
            foreach ($profesores as $asignaturas => $profes) {
                echo "<tr>";
                    echo "<td>$asignaturas</td>";
                    echo "<td>$profes</td>";
                echo "</tr>";
            }
            
            ?>
        </tbody>
    </table>

        <!--

        Tabla que muestre los siguientes datos y en otra celda si estan aprobados o suspensos.
            Guillermo => 3
            Daiana => 5
            Ángel => 8
            Ayoub => 7
            Mateo => 9
            Joaquín => 4

            - Si nota < 5 -> suspenso
            - Si nota < 7 -> aprobado
            - Si nota < 9 -> notable
            - Si nota <= 10 -> sobresaliente

            Y además!   Si el alumno ha aprobado, que su fila este verde.
                        Si el alumno ha suspendido, que su fila este en rojo.

            ordenar por nombre

            si esta aprobado, añadir bien, notable...
        -->

        <?php
        $notas_clase = array (
            "Guillermo" => 3,
            "Daiana" => 5,
            "Ángel" => 8,
            "Ayoub" => 7,
            "Mateo" => 9,
            "Joaquín" => 4
        );
        ?>
            <h3>Estudiantes</h3>
            <table>
            <thead>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Estado</th>
            </thead>
            <tbody>
                <?php
                foreach ($notas_clase as $alumno => $nota) {
                    if ($nota < 5) {
                        echo "<tr class='suspenso'>";
                    } else {
                        echo "<tr class='aprobado'>";
                    }
                    echo "<td>$alumno</td>";
                    echo "<td>$nota</td>";
                        if ($nota < 5) {                            
                            echo "<td>Suspenso</td>";
                        } else if ($nota < 7) {
                            echo "<td>Aprobado</td>";
                        } else if ($nota < 9) {
                            echo "<td>Notable</td>";
                        } else if ($nota <= 10) {
                            echo "<td>Sobresaliente</td>";
                        }
                    echo "</tr>";
                }
                
                ?>
            </tbody>
        </table>


</body>
</html>