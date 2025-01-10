<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <style>
        th, td {
            border: 1px solid black;
            padding: 5px;
        }
    </style> -->
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require('conexion.php');

    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("location: usuario/iniciar_sesion.php"); //Control de acceso. Si nohay usuario logeado, te va a mandar directamente a iniciar sesion.php
        exit;
    }
    ?>
    <!--
    <style>
        .table-primary {
            --bs-table-bg: #C1D88A;
        }
    </style>-->
</head>
<body>
    <div class="container">
        <h2>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h2>
        <a class="btn btn-danger" href="usuario/cerrar_sesion.php">Cerrar sesión</a>
        <h1>Listado de animes</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_anime = $_POST["id_anime"];
            //echo "<h1>$id_anime</h1>";
            /*$sql = "DELETE FROM animes WHERE id_anime = '$id_anime'";
            $_conexion -> query($sql);*/

            /*
            PREPARED STATEMENT (SENTENCIAS PREPARADAS): Evita inyecciones de consultas sql. Tienen 3 fases de preparacion.
            1. Preparación (prepare)
            2. Enlazado (binding)
            3. Ejecución (execute)
            */

            # 1. PREPARACION (Definimos la estructura de la sentencia)
            $sql = $_conexion -> prepare("DELETE FROM animes WHERE id_anime = ?");

            # 2. ENLAZADO (Vinculamos las interrogaciones con variables y tipos)
            $sql -> bind_param("i", $id_anime); //le estamos diciendo que la interrogacion de arriba equivale a idanime, que es un int (i)

            # 3. EJECUCION
            $sql -> execute();
        }

        $sql = "SELECT * FROM animes";
        $resultado = $_conexion -> query($sql);
        //Ejecuta la consulta que hemos hecho en la conexion creada. Devuelve algo parecido a un array (en caso de que vaya bien) o falso.
        ?>
        <a class="btn btn-secondary" href="nuevo_anime.php">Nuevo anime</a>
        <a href="nuevo_estudio.php">Nuevo estudio</a>
        <table class ="table table-striped"> <!--table-primary y se puede cambiar el color arriba-->
            <thead class = "table-dark">
                <tr>
                    <th>Título</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Número de temporadas</th>
                    <th>Imagen</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //trata este objeto como si fuese un array asociativo, y va a ir creando filas
                    while ($fila = $resultado -> fetch_assoc()) {
                        // ["titulo"=>"Frieren, "nombre_estudio"="Pierrot"...]
                        //va a coger el nombre de las columnas que se usa en la bbdd
                        echo "<tr>";
                        echo "<td>" . $fila["titulo"] . "</td>";
                        echo "<td>" . $fila["nombre_estudio"] . "</td>";
                        echo "<td>" . $fila["anno_estreno"] . "</td>";
                        echo "<td>" . $fila["num_temporadas"] . "</td>";
                        ?>
                        <td>
                            <img width="100" height="160" src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="editar_anime.php?id_anime=<?php echo $fila['id_anime'] ?>">Editar</a>
                        </td>
                        <td>
                            <form action ="" method ="post">
                                <input type="hidden" name="id_anime" value="<?php echo $fila['id_anime']; ?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                        <?php
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>