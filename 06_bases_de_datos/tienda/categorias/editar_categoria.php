<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require('../util/conexion.php');
    ?>
    <style>
        .error {color: red; font-style: italic}
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $tmp_descripcion = $_POST["descripcion"];

            /*if ($tmp_nombre != '') {
                if (strlen($tmp_nombre) <= 30) {
                    $patron = "/^[A-Za-zÑÁÉÍÓÚñáéíóú ]+$/";
                    if (preg_match($patron, $tmp_nombre)) {
                        $nombre = $tmp_nombre;
                    } else $err_nombre = "El nombre de la categoría solo puede tener letras mayúsculas, minúsculas y espacios.";
                } else $err_nombre = "El nombre de la categoría tiene como máximo 30 caracteres.";
            } else $err_nombre = "El nombre de la categoría es obligatorio.";*/

            if ($tmp_descripcion != '') {
                if (strlen($tmp_descripcion) <= 255) {
                    $patron = "/^[A-Za-z0-9ÑÁÉÍÓÚñáéíóú., ]+$/";
                    if (preg_match($patron, $tmp_descripcion)) {
                        $descripcion = $tmp_descripcion;
                    } else $err_descripcion = "El nombre de la categoría solo puede tener letras mayúsculas, minúsculas y espacios.";
                } else $err_descripcion = "La descripción de la categoría tiene como máximo 255 caracteres.";
            } else $err_descripcion = "La descripción de la categoría es obligatoria.";

            if (isset($descripcion)) {
                $sql = "UPDATE categorias SET
                    descripcion = '$descripcion'
                WHERE nombre = '$nombre'";

                $_conexion -> query($sql);
            }
        }
            $sql = "SELECT * FROM categorias";
            $resultado = $_conexion -> query($sql);
            $nombre_categorias = [];

            while ($registro = $resultado -> fetch_assoc()) {
                array_push($nombre_categorias, $registro["nombre"]);
            }

            $nombre = $_GET["nombre"];
            $sql = "SELECT * FROM categorias WHERE nombre = '$nombre'";
            $resultado = $_conexion -> query($sql);
            $categoria = $resultado -> fetch_assoc();
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <!--Encripta el archivo/fichero para poder mandarlo-->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
                <input type="text" class="form-control" name = "nombre" disabled value="<?php echo $categoria["nombre"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>" ?>
                <input type="text" class="form-control" name = "descripcion" value="<?php echo $categoria["descripcion"] ?>">
            </div>
            <div class="mb-3">

            <input type="hidden" name="nombre" value="<?php echo $categoria["nombre"] ?>">
                <input type="submit" class="btn btn-primary" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>