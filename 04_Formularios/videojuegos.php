<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <title>Videojuegos</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_titulo = $_POST["titulo"];
        $tmp_consola = $_POST["consola"];
        $tmp_descripcion = $_POST["descripcion"];
        $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

        //Titulo
        if ($tmp_titulo != '') {
            if (srtlen($tmp_titulo) >= 1 && strlen($tmp_titulo) <= 60) {
                $patron = "/^[A-Za-z0-9 ]+$/";
                if (preg_match($patron, $tmp_titulo)) {
                    $titulo = $tmp_titulo;
                } else {
                    $err_titulo = "Solo se permiten letras y números en el título.";
                }
            } else $err_titulo = "El título puede tener como mucho 60 caracteres.";
        } else $err_titulo = "El título es obligatorio.";

        //Descripcion
        if ($tmp_descripcion == '') {
            if (strlen($tmp_descripcion) <= 255) {
                $patron = "/^[A-Za-z0-9,. ]$/";
                if (preg_match($patron, $tmp_descripcion)) $descripcion = $tmp_descripcion;
            } else $err_descripcion = "La descripción no puede pasar de los 255 caracteres.";
        }

        //Fecha de lanzamiento
        if ($tmp_fecha_lanzamiento = '') {
            $patron = "/^[0-9]{4}[0-9]{2}[0-9]{2}$/";
            if (preg_match($patron, $tmp_fecha_lanzamiento)) {
                $fecha_actual = date("Y-m-d");
                list($anio_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);
                list($anio_lanzamiento, $mes_lanzamiento, $dia_lanzamiento) = explode('-', $tmp_fecha_lanzamiento);
                if (($anio_lanzamiento >= 1947) && ($anio_lanzamiento < ($anio_actual + 10))) {
                    $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                } else if ($anio_lanzamiento == ($anio_actual + 10)) {
                    if ($mes_lanzamiento < $mes_actual) {

                    } else $err_fecha_lanzamiento = "Fecha no válida.";
                } else $err_fecha_lanzamiento = "El primer juego salió en 1947.";
            } else $err_fecha_lanzamiento = "Formato inválido (YYYY-MM-DD).";
        } else $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria.";
    }
    ?>

    <form>
        <!--Titulo-->
        <label for = "titulo">Título</label><br>
        <input type = "text" value = "titulo" id = "titulo" placeholder = "titulo"><br><br>
        <!--Consolas-->
        <label>Consolas</label><br>
        <input type = "radio" name = "consola" value = "pc" id = "pc">
        <label for = "pc">PC</label><br><br>
        <input type = "radio" name = "consola" value = "nintendo_switch" id = "nintendo_switch">
        <label for = "nintendo_switch">Nintendo Switch</label><br><br>
        <input type = "radio" name = "consola" value = "ps4" id = "ps4">
        <label for = "ps4">PS4</label><br><br>
        <input type = "radio" name = "consola" value = "ps5" id = "ps5">
        <label for = "ps5">PS5</label><br><br>
        <input type = "radio" name = "consola" value = "xbox_x" id = "xbox_x">
        <label for = "xbox_x">XBOX Series X</label><br><br>
        <input type = "radio" name = "consola" value = "xbox_s" id = "xbox_s">
        <label for = "xbox_s">XBOX Series S</label><br><br>
        <!--Descripcion-->
        <label for = "descripcion">Descripción</label><br>
        <textarea name = "descripcion" id = "descripcion" placeholder = "descripcion" maxlength = "255"></textarea><br><br>
            <!-- EL maxlength especifica el maximo numero de caracteres que se permitirán en el textarea -->
        <!--Fecha de lanzamiento-->
        <label for = "fecha_nacimiento">Fecha de nacimiento</label><br>
        <input type = "date" name = "fecha_nacimiento" id = "fecha_nacimiento"><br><br>
        <!-- Boton de enviar -->
         <input type = "submit" value = "Enviar">
    </form>
</body>
</html>