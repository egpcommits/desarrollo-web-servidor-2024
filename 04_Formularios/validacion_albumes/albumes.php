<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación álbumes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require('trim.php');
    ?>
    <style>
        .error{color: red; font-style: italic}
    </style>
</head>
<body>
    <div class="container">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_titulo = $_POST["titulo"];
                $tmp_artista = $_POST["artista"];
                $tmp_num_canciones = $_POST["num_canciones"];
                $tmp_codigo_album = $_POST["codigo_album"];
                $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];


                if ($tmp_titulo != '') {
                    $tmp_titulo = string_trim($tmp_titulo);
                    if (strlen($tmp_titulo) >= 2 && strlen($tmp_titulo) <= 30) $titulo = $tmp_titulo;
                    else $err_titulo = "El título contiene como mínimo 2 caracteres y como máximo 30.";
                } else $err_titulo = "El título del álbum es obligatorio.";


                if ($tmp_artista != '') {
                    $tmp_artista = string_trim($tmp_artista);
                    if (strlen($tmp_artista) >= 2 && strlen($tmp_artista) <= 15) {
                        $patron = "/^[A-Za-z ]+$/";
                        if (preg_match($patron, $tmp_artista)) $artista = $tmp_artista;
                        else $err_artista = "El artista solo tendrá letras (mayúsculas y minúsculas) y espacios en blanco.";
                    } else $err_artista = "El artista tendrá como mínimo 2 caracteres y como máximo 15.";
                } else $err_artista = "El artista es obligatorio.";


                if ($tmp_num_canciones != '') {
                    if (filter_var($tmp_num_canciones, FILTER_VALIDATE_INT) !== false) {
                        if ($tmp_num_canciones >= 1 && $tmp_num_canciones <=16) $num_canciones = $tmp_num_canciones;
                        else $err_num_canciones = "El número de canciones tiene que ser como mínimo 1 y como máximo 16.";
                    } else $err_num_canciones = "El número de canciones tiene que ser un número entero positivo.";
                } else $err_num_canciones = "El número de canciones es obligatorio.";


                if (isset($_POST["tipo_album"])) {
                    $tmp_tipo_album = $_POST["tipo_album"];
                    $array_tipos = ["Single", "Mini album", "Full album"]; 
                    if (in_array($tmp_tipo_album, $array_tipos)) {
                        $tipo_album = $tmp_tipo_album;
                    } else $err_tipo_album = "El tipo de álbum es inválido.";
                } else $err_tipo_album = "El tipo de álbum es obligatorio.";


                if ($tmp_codigo_album != '') {
                    if (strlen($tmp_codigo_album) == 10) {
                        $patron = "/^[A-Z]{3}-[0-9]{6}$/";
                        if (preg_match($patron, $tmp_codigo_album)) {
                            $codigo_album = $tmp_codigo_album;
                        } else $err_codigo_album = "Formato inválido (ABC-123456).";
                    } else $err_codigo_album = "El código de álbum está compuesto por 10 carácteres.";
                } else $err_codigo_album = "El código de álbum es obligatorio.";


                if ($tmp_fecha_lanzamiento != '') {
                    $patron = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
                    if (preg_match($patron, $tmp_fecha_lanzamiento)) {
                        list($anno_lanzamiento, $mes_lanzamiento, $dia_lanzamiento) = explode("-", $tmp_fecha_lanzamiento);
                        if ($anno_lanzamiento > 2015) {
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        } else if ($anno_lanzamiento == 2015) {
                            if ($mes_lanzamiento > 10) {
                                $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            } else if ($mes_lanzamiento == 10) {
                                if ($dia_lanzamiento >= 20) {
                                    $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                                } else $err_fecha_lanzamiento = "El álbum no pudo salir antes del día 20.";
                            } else $err_fecha_lanzamiento = "El álbum no pudo salir antes de octubre.";
                        } else $err_fecha_lanzamiento = "El álbum no pudo salir antes de 2015.";

                        if ($anno_lanzamiento < 2024) {
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        } else if ($anno_lanzamiento == 2024) {
                            if ($mes_lanzamiento < 12) {
                                $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            } else if ($mes_lanzamiento == 12) {
                                if ($dia_lanzamiento <= 6) {
                                    $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                                } else $err_fecha_lanzamiento = "No hay ningún álbum programado para después del 6 de diciembre.";
                            } else $err_fecha_lanzamiento = "No hay ningún álbum programado para finales de diciembre.";
                        } else $err_fecha_lanzamiento = "No hay ningún álbum programado para después de 2024.";
                    } else $err_fecha_lanzamiento = "Formato inválido (YYYY-mm-dd).";
                } else $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria.";
            }
        ?>

        <form action = "" method = "post">
            <div class = "mb-3">
                <label for = "titulo">Título</label><br>
                <?php if (isset($err_titulo)) echo "<span class='error'>$err_titulo</span>"; ?> <br>
                <input type="text" name="titulo" id="titulo">
            </div>
            <div class="mb-3">
                <label for="artista">Artista</label><br>
                <?php if (isset($err_artista)) echo "<span class='error'>$err_artista</span>" ?> <br>
                <input type="text" name="artista" id="artista">
            </div>
            <div class="mb-3">
                <label for="num_canciones">Número de canciones</label><br>
                <?php if (isset($err_num_canciones)) echo "<span class='error'>$err_num_canciones</span>" ?> <br>
                <input type="text" name="num_canciones" id="num_canciones">
            </div>
            <div class="mb-3">
                <label for="tipo_album">Tipo de álbum</label><br>
                <?php if (isset($err_tipo_album)) echo "<span class='error'>$err_tipo_album</span>" ?> <br>
                <select name ="tipo_album" id="tipo_album">
                    <option disabled selected hidden>Elige tipo</option>
                    <?php 
                        $array_tipos = ["Single", "Mini album", "Full album"]; 
                        for ($i=0; $i < count($array_tipos); $i++) { 
                            echo "<option value = '$array_tipos[$i]'>$array_tipos[$i]</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="codigo_album">Código de álbum</label><br>
                <?php if (isset($err_codigo_album)) echo "<span class='error'>$err_codigo_album</span>" ?> <br>
                <input type="text" name="codigo_album" id="codigo_album">
            </div>
            <div class="mb-3">
                <label for="fecha_lanzamiento">Fecha de lanzamiento</label><br>
                <?php if (isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>" ?> <br>
                <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento">
            </div>
            <input type="submit" value="Enviar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>