<?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    header("Content-type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];
    $entrada = json_decode(file_get_contents('php://input'), true); //almacena en entrada los parametros

    switch($metodo) {
        case "GET":
            manejarGet($_conexion);
            break;
        case "POST":
            manejarPost($_conexion, $entrada);
            break;
        case "PUT":
            manejarPut($_conexion, $entrada);
            break;
        case "DELETE":
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "Petición no válida."]);
    }

    function manejarGet($_conexion) { //select
        //echo json_encode(["metodo" => "get"]);
        $sql = "SELECT * FROM consolas";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute(); //statement
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }

    function manejarPost($_conexion, $entrada) { //insertar
        //echo json_encode(["metodo" => "post"]);
        $sql = "INSERT INTO consolas (nombre, fabricante, generacion, unidades_vendidas) VALUES (:nombre, :fabricante, :generacion, :unidades_vendidas)";
        //en vez de poner interrogacion, se usan dos puntos y el nombre de la variable correspondiente
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            //pilla la variable (lo que esta entre comillas) de la query y el valor (comillas despues de la flecha) lo pilla del formulario
            "nombre" => $entrada["nombre"],
            "fabricante" => $entrada["fabricante"],            
            "generacion" => $entrada["generacion"],
            "unidades_vendidas" => $entrada["unidades_vendidas"]
        ]);
        
        if ($stmt) { //si se ha ejecutado bien
            echo json_encode(["mensaje" => "La consola se ha creado."]);
        } else {
            echo json_encode(["mensaje" => "Error al crear la consola."]);
        }
    }

    function manejarPut($_conexion, $entrada) {
        echo json_encode(["metodo" => "put"]);
    }

    function manejarDelete($_conexion, $entrada) {
        //echo json_encode(["metodo" => "delete"]);
        $sql = "DELETE FROM animes WHERE id_anime = :id_anime";
        $stmt = $_conexion -> prepare($sql);
        $stmt -> execute([
            "id_anime" => $entrada["id_anime"]
        ]);

        if ($stmt) {
            echo json_encode(["mensaje" => "El anime se ha borrado."]);
        } else {
            echo json_encode(["mensaje" => "Error al borrar el anime."]);
        }
    }
?>