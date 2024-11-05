<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos con bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <style>
        .error {color: red; font-style: italic; margin-left: 10px}
    </style>
</head>
<body>
    <div class= "container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_titulo = $_POST["titulo"];
            //$tmp_consola = $_POST["consola"]; //Si no se selecciona un radio button, va a dar undefine array key.
            //por eso hay que hacer el isset y despues guardar el valor
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

            //Titulo
            if ($tmp_titulo != '') {
                if (strlen($tmp_titulo) <= 60) {
                    $patron = "/^[A-Za-z0-9 ]+$/";
                    if (preg_match($patron, $tmp_titulo)) {
                        $titulo = $tmp_titulo;
                    } else $err_titulo = "Solo se permiten letras y números en el título.";
                } else $err_titulo = "El título puede tener como mucho 60 caracteres.";
            } else $err_titulo = "El título es obligatorio.";

            //Consola
            if (isset($_POST['consola'])) {
                $tmp_consola = $_POST['consola']; //directamente guarda el value en la variable
                $array_consolas = ["pc", "nintendo_switch", "ps4", "ps5", "xbox_x", "xbox_s"];
                if (in_array($tmp_consola, $array_consolas)) {
                    $consola = $tmp_consola;
                } else $err_consola = "Consola no válida";
            } else $err_consola = "La selección de consola es obligatoria.";
            //en este caso pongo el error, pero si el isset devolviese falso, se podria guardar cadena vacia.

            //Descripcion
            if ($tmp_descripcion != '') {
                if (strlen($tmp_descripcion) <= 255) {
                    $patron = "/^[A-Za-z0-9,. ]+$/";
                    if (preg_match($patron, $tmp_descripcion)) $descripcion = $tmp_descripcion;
                    else $err_descripcion = "La descripción no puede mantener caracteres especiales, a excepcion de comas y puntos.";
                } else $err_descripcion = "La descripción no puede pasar de los 255 caracteres.";
            }

            //Fecha de lanzamiento
            if ($tmp_fecha_lanzamiento != '') {
                $patron = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
                if (preg_match($patron, $tmp_fecha_lanzamiento)) {
                    $fecha_actual = date("Y-m-d");
                    list($anio_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);
                    list($anio_lanzamiento, $mes_lanzamiento, $dia_lanzamiento) = explode('-', $tmp_fecha_lanzamiento);
                    if (($anio_lanzamiento >= 1947) && ($anio_lanzamiento < ($anio_actual + 10))) {
                        $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                    } else if ($anio_lanzamiento > ($anio_actual + 10)) {
                        $err_fecha_lanzamiento = "No se pueden registrar juegos con más de diez años.";
                    } else if ($anio_lanzamiento == ($anio_actual + 10)) {
                        if ($mes_lanzamiento < $mes_actual) {
                            $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                        } else if ($mes_lanzamiento == $mes_actual) {
                            if ($dia_lanzamiento <= $dia_actual) {
                                $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                            } else $err_fecha_lanzamiento = "No se pueden registrar juegos con más de diez años.";
                        } else $err_fecha_lanzamiento = "Fecha no válida.";
                    } else $err_fecha_lanzamiento = "El primer juego salió en 1947.";
                } else $err_fecha_lanzamiento = "Formato inválido (YYYY-MM-DD).";
            } else $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria.";
        }
        ?>

        <h1>Formulario de videojuegos</h1>
        <!-- col-6 para que coja el ancho de 6 columnas (como si la pantalla estuviese dividido en 12 columnas)-->
        <form class = "col-6" action = "" method = "post">
            <div class = "mb-3"> <!--mb-3 - margin bottom 3rem. Tambien sirve con el resto de margenes.-->
                <label class = "form-label">Título</label>
                <?php if(isset($err_titulo)) echo "<span class = 'error'>$err_titulo</span>";?><br>
                <input class = "form-control" type = "text" name = "titulo">
            </div>
            <div class = "mb-3">
                <label class = "form-label">Descripción</label>
                <?php if(isset($err_descripcion)) echo "<span class = 'error'>$err_descripcion</span>";?><br>
                <textarea class="form-control" name = "descripcion"></textarea>
            </div>
            <div class = "mb-3">
                <label class = "form-label">Consola</label>
                <?php if(isset($err_consola)) echo "<span class = 'error'>$err_consola</span>";?><br>
                <div class = "form-check">
                    <input class = "form-check-input" type = "radio" name = "consola"  value = "pc">
                    <label class = "form-check-label">PC</label>
                </div>
                <div class = "form-check">
                    <input class = "form-check-input" type = "radio" name = "consola"  value = "ps4">
                    <label class = "form-check-label">Playstation 4</label>
                </div>
                <div class = "form-check">
                    <input class = "form-check-input" type = "radio" name = "consola" value = "ps5">
                    <label class = "form-check-label">Playstation 5</label>
                </div>
                <div class = "form-check">
                    <input class = "form-check-input" type = "radio" name = "consola" value = "nintendo_switch">
                    <label class = "form-check-label">Nintendo Switch</label>
                </div>
                <div class = "form-check">
                    <input class = "form-check-input" type = "radio" name = "consola" value = "xbox_x">
                    <label class = "form-check-label">Xbox Series X</label>
                </div>
                <div class = "form-check">
                    <input class = "form-check-input" type = "radio" name = "consola" value = "xbox_s">
                    <label class = "form-check-label">Xbox Series S</label>
                </div>
            </div>
            <div class = "mb-3">
                <label class = "form-label">Fecha de lanzamiento</label>
                <?php if(isset($err_fecha_lanzamiento)) echo "<span class = 'error'>$err_fecha_lanzamiento</span>";?><br>
                <input class="form-control" name = "fecha_lanzamiento" type = "date"></input>
            </div>
            <div class = "mb-3">
                <input type = "submit" class = "btn btn-primary" value = "Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>