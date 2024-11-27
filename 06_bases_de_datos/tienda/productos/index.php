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


    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("location: ../usuario/iniciar_sesion.php"); //Control de acceso. Si nohay usuario logeado, te va a mandar directamente a iniciar sesion.php
        exit;
    }
    ?>
</head>
<body>
    <div class="container">
        <h2>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h2>
        <!--Testing193!-->
        <a class="btn btn-warning" href="../usuario/cambiar_credenciales.php">Cambiar contraseña</a>
        <a class="btn btn-danger" href="../usuario/iniciar_sesion.php">Cerrar sesión</a><br><br>
        <h1>Listado de productos</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_producto = $_POST["id_producto"];
            $sql = "DELETE FROM productos WHERE id_producto = $id_producto";
            $_conexion -> query($sql);
        }

        $sql = "SELECT * FROM productos";
        $resultado = $_conexion -> query($sql);
        //Ejecuta la consulta que hemos hecho en la conexion creada. Devuelve algo parecido a un array (en caso de que vaya bien) o falso.
        ?>
        <a class="btn btn-light btn-sm" href="../categorias/index.php">Cambiar a categorías</a>
        <a class="btn btn-dark btn-sm" href="nuevo_producto.php">Nuevo producto</a><br><br>
        <table class ="table table-striped"> <!--table-primary y se puede cambiar el color arriba-->
            <thead class = "table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Imagen</th>
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
                        echo "<td>" . $fila["precio"] . "</td>";
                        echo "<td>" . $fila["categoria"] . "</td>";
                        echo "<td>" . $fila["stock"] . "</td>";
                        ?>
                        <td>
                            <img width="100" height="160" src="<?php echo $fila["imagen"] ?>">
                        </td>
                        <?php
                        echo "<td>" . $fila["descripcion"] . "</td>";
                        ?>
                        <td>
                            <a class="btn btn-primary" href="editar_producto.php?id_producto=<?php echo $fila['id_producto'] ?>">Editar</a>
                        </td>
                        <td>
                            <form action ="" method ="post">
                                <input type="hidden" name="id_producto" value="<?php echo $fila['id_producto']; ?>">
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