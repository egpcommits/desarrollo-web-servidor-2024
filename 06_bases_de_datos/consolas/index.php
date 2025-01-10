<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require('conexion.php');
    ?>
</head>
<body>
<div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_consola = $_POST["id_consola"];
            echo "<h1>$id_consola</h1>";
            /*$sql = "DELETE FROM consolas WHERE id_consola = '$id_consola'";
            $_conexion -> query($sql);*/

            #1. Prepare
            $sql = $_conexion -> prepare("DELETE FROM consolas WHERE id_consola = ?");

            #2. Binding
            $sql -> bind_param("i", $id_consola);

            #3. Execute
            $sql -> execute();
        }


        $sql = "SELECT * FROM consolas";
        $resultado = $_conexion -> query($sql);
        //Ejecuta la consulta que hemos hecho en la conexion creada. Devuelve algo parecido a un array (en caso de que vaya bien) o falso.
        ?>
        <a href="nueva_consola.php">Nueva consola</a>
        <a href="nuevo_fabricante.php">Nuevo fabricante</a>
        <table class ="table table-striped table-primary">
            <thead class = "table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Fabricante</th>
                    <th>Generación</th>
                    <th>Unidades vendidas</th>
                    <th>Imagen</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //trata este objeto como si fuese un array asociativo, y va a ir creando filas
                    while ($fila = $resultado -> fetch_assoc()) {
                        //Si hay una consola que no tiene unidades vendidas, mostrar "no hay datos"
                        echo "<tr>";
                        echo "<td>" . $fila["nombre"] . "</td>";
                        echo "<td>" . $fila["fabricante"] . "</td>";
                        echo "<td>" . $fila["generacion"] . "</td>";
                        if ($fila["unidades_vendidas"] == NULL) echo "<td>No hay datos</td>";
                        else echo "<td>" . $fila["unidades_vendidas"] . "</td>";
                        ?>
                        <td>
                            <img width="100" height="160" src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <td>
                            <form action ="" method ="post">
                                <input type="hidden" name="id_consola" value="<?php echo $fila['id_consola']; ?>">
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