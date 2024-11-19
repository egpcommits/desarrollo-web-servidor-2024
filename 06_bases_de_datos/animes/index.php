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
        <?php
        $sql = "SELECT * FROM animes";
        $resultado = $_conexion -> query($sql);
        //Ejecuta la consulta que hemos hecho en la conexion creada. Devuelve algo parecido a un array (en caso de que vaya bien) o falso.
        ?>
        <a href="nuevo_anime.php">Nuevo anime</a>
        <a href="nuevo_estudio.php">Nuevo estudio</a>
        <table class ="table table-striped"> <!--table-primary y se puede cambiar el color arriba-->
            <thead class = "table-dark">
                <tr>
                    <th>Título</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Número de temporadas</th>
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
                        echo "<td>";
                        ?>
                        <td>
                            <img src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <?php
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>