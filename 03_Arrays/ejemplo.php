<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos arrays</title>

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

    //print_r($frutas3);
    
    /* Eñadir elementos con o sin clave.
    
    Borrar algun elemento.
    
    Probar a resetear las claves. */

    $array_bleach [] = "Kuchiki Rukia";
    $array_bleach ["25874398J"] = "Zaraki Kenpachi"; //Se añade la clave poniendo la clave entre comillas
    unset($array_bleach[0]);
    $array_bleach = array_values($array_bleach);
    print_r($array_bleach);
    

    ?>
</body>
</html>