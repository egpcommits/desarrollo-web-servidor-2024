<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva categoría</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require('../util/conexion.php');

        function string_trim (string $cadena) : string {
            $salida = trim(htmlspecialchars($cadena));
            $salida = preg_replace('/\s+/', ' ', $salida);
            return $salida;
        }

        session_start();
        if (!isset($_SESSION["usuario"])) {
            header("location: ../usuario/iniciar_sesion.php"); //Control de acceso. Si nohay usuario logeado, te va a mandar directamente a iniciar sesion.php
            exit;
        }
    ?>
    <style>
        .error {color: red; font-style: italic}
    </style>
</head>
<body>
    <div class="container">
        <?php
            $sql = "SELECT * FROM categorias";
            $resultado = $_conexion -> query($sql);
            $nombre_categorias = [];

            while ($registro = $resultado -> fetch_assoc()) {
                array_push($nombre_categorias, $registro["categoria"]);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_categoria = $_POST["categoria"];
                $tmp_descripcion = $_POST["descripcion"];

                $sql = "SELECT * FROM categorias WHERE categoria = '$tmp_categoria'"; //como mucho puede haber un usuario, como poco cero.
                $resultado = $_conexion -> query($sql);

                if ($tmp_categoria != '') {
                    string_trim($tmp_categoria);
                    if ($resultado -> num_rows == 0) {
                        if (strlen($tmp_categoria) >= 2 && strlen($tmp_categoria) <= 30) {
                            $patron = "/^[A-Za-zÑÁÉÍÓÚñáéíóú ]+$/";
                            if (preg_match($patron, $tmp_categoria)) {
                                $categoria = $tmp_categoria;
                            } else $err_categoria = "El nombre de la categoría solo puede tener letras mayúsculas, minúsculas y espacios.";
                        } else $err_categoria = "El nombre de la categoría tiene como mínimo 2 caracteres y como máximo 30.";
                    } else $err_categoria = "Esta categoria ya existe.";
                } else $err_categoria = "El nombre de la categoría es obligatorio.";

                if ($tmp_descripcion != '') {
                    string_trim($tmp_descripcion);
                    if (strlen($tmp_descripcion) <= 255) {
                        $patron = "/^[A-Za-z0-9ÑÁÉÍÓÚñáéíóú ]+$/";
                        if (preg_match($patron, $tmp_descripcion)) {
                            $descripcion = $tmp_descripcion;
                        } else $err_descripcion = "La descripción de la categoría solo puede tener letras mayúsculas, minúsculas y espacios.";
                    } else $err_descripcion = "La descripción de la categoría tiene como máximo 255 caracteres.";
                } else $err_descripcion = "La descripción de la categoría es obligatoria.";
                

                if (isset($categoria) && isset($descripcion)) {
                    $sql = "INSERT INTO categorias (categoria, descripcion)
                    VALUES ('$categoria', '$descripcion')";

                    $_conexion -> query($sql); //ejecuto la query dela conexion
                }
            }
        ?>
        <form action="" method="post">
            <div class="mb-3 mt-5">
                <h2>Añadir categoria</h2>
            </div>
            <div class="mb-3 mt-3 col-5">
                <label class="form-label">Categoría</label>
                <?php if (isset($err_categoria)) echo "<span class='error'>$err_categoria</span>" ?>
                <input type="text" class="form-control" name = "categoria">
            </div>
            <div class="mb-3 col-5">
                <label class="form-label">Descripción</label>
                <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>" ?>
                <input type="text" class="form-control" name = "descripcion">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary btn-sm" value="Crear">
                <a class="btn btn-secondary btn-sm" href="index.php">Volver</a>
            </div>
        </form>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>