<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require('../util/conexion.php');
    ?>
</head>
<body>
    <div class="container">
        <h1>Listado de categorías</h1>
        <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $sql = "DELETE FROM categorias WHERE nombre = '$nombre'";
            $_conexion -> query($sql);
        }

        $sql = "SELECT * FROM categorias";
        $resultado = $_conexion -> query($sql);
        //Ejecuta la consulta que hemos hecho en la conexion creada. Devuelve algo parecido a un array (en caso de que vaya bien) o falso.
        ?>
        <a class="btn btn-light btn-sm" href="../productos/index.php">Cambiar a productos</a>
        <a class="btn btn-dark btn-sm" href="nueva_categoria.php">Nueva categoria</a><br><br>
        <table class ="table table-striped"> <!--table-primary y se puede cambiar el color arriba-->
            <thead class = "table-dark">
                <tr>
                    <th>Nombre</th><!-- disabled a la hora de editar, en disabled no se va a mandar en el formulario. HAbra que mandarlo con un campo oculto -->
                    <th>Descripción</th> 
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
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["descripcion"] . "</td>";
                        ?>
                        <!--<td>
                            <img width="100" height="160" src="">
                        </td>-->
                        <td>
                        <a class="btn btn-primary" href="editar_categoria.php?nombre=<?php echo $fila['nombre'] ?>">Editar</a>
                        </td>
                        <td>
                            <form action ="" method ="post">
                                <input type="hidden" name="nombre" value="<?php echo $fila['nombre']; ?>">
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