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
            $sql = "SELECT * FROM categorias ORDER BY nombre";
            $resultado = $_conexion -> query($sql);
            $categorias = [];

            while ($registro = $resultado -> fetch_assoc()) {
                array_push($categorias, $registro["nombre"]);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_nombre = $_POST["nombre"];
                $tmp_precio = $_POST["precio"];
                $tmp_stock = $_POST["stock"];
                $tmp_descripcion = $_POST["descripcion"];

                if ($tmp_nombre != '') {
                    if (strlen($tmp_nombre) >= 2 && strlen($tmp_nombre) <= 50) {
                        $patron = "/^[0-9A-Za-zÑÁÉÍÓÚñáéíóú ]+$/";
                        if (preg_match($patron, $tmp_nombre)) {
                            $nombre = $tmp_nombre;
                        } else $err_nombre = "El nombre del producto solo puede tener letras mayúsculas, minúsculas, espacios y números.";
                    } else $err_nombre = "El nombre del producto tiene como mínimo 2 caracteres y como máximo 50 caracteres.";
                } else $err_nombre = "El nombre del producto es obligatorio.";


                if ($tmp_precio != '') {
                    if (filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) !== FALSE) {
                        if ($tmp_precio >= 0 && $tmp_precio <= 9999.99) {
                            $patron = "/^[0-9]{1,4}(\.[0-9]{1,2})?$/";
                            if (preg_match($patron, $tmp_precio)) {
                                $precio = $tmp_precio;
                            } else $err_precio = "El precio no cumple con el patron.";                            
                        } else $err_precio = "El precio solo puede estar entre 0 y 9999,99.";
                    } else $err_precio = "El precio tiene que ser un número.";
                } else $err_precio = "El precio del producto es obligatorio.";


                if (isset($_POST["categoria"])) {
                    $tmp_categoria = $_POST["categoria"];
                    if (in_array($tmp_categoria, $categorias)) {
                        $categoria = $tmp_categoria;
                    } else $err_categoria = "Categoría inválida. Solo las de la lista.";
                } else $err_categoria = "La categoría es obligatoria.";


                if ($tmp_stock != '') {
                    if (strlen($tmp_stock) <= 3) {
                        $patron = "/^[0-9]+$/";
                        if (preg_match($patron, $tmp_stock)) {
                            $stock = $tmp_stock;
                        } else $err_stock = "El stock solo puede contener números.";
                    } else $err_stock = "El stock solo puede tener 3 cifras (0-999).";
                } else $stock = 0;


                if ($tmp_descripcion != '') {
                    if (strlen($tmp_descripcion) <= 255) {
                        $patron = "/^[A-Za-z0-9ÑÁÉÍÓÚñáéíóú ]+$/";
                        if (preg_match($patron, $tmp_nombre)) {
                            $descripcion = $tmp_descripcion;
                        } else $err_nombre = "El nombre del producto solo puede tener letras mayúsculas, minúsculas y espacios.";
                    } else $err_descripcion = "La descripción del producto tiene como máximo 255 caracteres.";
                } else $err_descripcion = "La descripción del producto es obligatoria.";


                //tambien meto la imagen, sino la imagen se meteria siempre, incluso si los datos son incorrectos.
                if (isset($nombre) && isset($precio) && isset($categoria) && isset($stock) && isset($descripcion)) {
                    $direccion_temporal = $_FILES["imagen"]["tmp_name"];
                    $nombre_imagen = $_FILES["imagen"]["name"];
                    move_uploaded_file($direccion_temporal, "../imagenes/$nombre_imagen");

                    $sql = "INSERT INTO productos (nombre, precio, categoria, stock, imagen, descripcion)
                    VALUES ('$nombre', $precio, '$categoria', $stock, '../imagenes/$nombre_imagen', '$descripcion')";

                    $_conexion -> query($sql); //ejecuto la query dela conexion
                }
            }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <!--Encripta el archivo/fichero para poder mandarlo-->
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <?php if (isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
                <input type="text" class="form-control" name = "nombre">
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <?php if (isset($err_precio)) echo "<div class='alert alert-danger col-9'>$err_precio</div>" ?>
                <input type="text" class="form-control" name = "precio">
            </div>
            <div class="mb-3">
                <label class="form-label">Categoría</label>
                <?php if (isset($err_categoria)) echo "<span class='error'>$err_categoria</span>" ?>
                <select class="form-select" name="categoria">
                    <option value="" selected disabled hidden>Elige una categoria</option>
                    <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria ?>">
                            <?php echo $categoria ?>
                        </option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <?php if (isset($err_stock)) echo "<span class='error'>$err_stock</span>" ?>
                <input type="text" class="form-control" name = "stock">
            </div>
            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>" ?>
                <input type="text" class="form-control" name = "descripcion">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" class="form-control" name = "imagen">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Crear">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>