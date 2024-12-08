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
    require('util/conexion.php');

    session_start();
    ?>
</head>
<body>
    <div class="container">
        <div class="mb-3 mt-5 col-4">
                <h2>Tienda</h2>
        </div>
        <?php
            $sql = "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql);
            //Ejecuta la consulta que hemos hecho en la conexion creada. Devuelve algo parecido a un array (en caso de que vaya bien) o falso.

            if (isset($_SESSION["usuario"])) { ?>
                <h3>Bienvenid@ <?php echo $_SESSION["usuario"] ?></h3>
                <form action ="" method ="post">
                    <input type="hidden" name="usuario" value="<?php echo $_SESSION["usuario"] ?>">
                    <a class="btn btn-warning btn-sm" href="usuario/cambiar_credenciales.php">Cambiar contraseña</a>
                </form>
                <br>
                <!--<a class="btn btn-warning btn-sm" href="usuario/cambiar_credenciales.php">Cambiar contraseña</a>-->
                <a class="btn btn-danger btn-sm" href="usuario/cerrar_sesion.php">Cerrar sesión</a><br><br>
                <a class="btn btn-info btn-sm" href="productos/index.php">Ir a productos</a>
                <a class="btn btn-info btn-sm" href="categorias/index.php">Ir a categorías</a><br><br>
            <?php } else { ?>
                <div class="mb-5 mt-5">
                    <a class="btn btn-primary btn-sm" href="usuario/iniciar_sesion.php">Iniciar sesión</a>
                </div>
            <?php }
        ?>
        
        <table class ="table table-striped"> <!--table-primary y se puede cambiar el color arriba-->
            <thead class = "table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    //trata este objeto como si fuese un array asociativo, y va a ir creando filas
                    while ($fila = $resultado -> fetch_assoc()) {
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
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>