<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furbo</title>
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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_equipo = $_POST["equipo"];
        $tmp_iniciales = $_POST["iniciales"];
        $tmp_numero_jugadores = $_POST["numero_jugadores"];
        $tmp_fecha_fundacion = $_POST["fecha_fundacion"];

        //Equipo
        if ($tmp_equipo != '') {
            if (strlen($tmp_equipo) >= 3 && strlen($tmp_equipo) <= 20) {
                $patron = "/^[A-Za-z. ]+$/";
                if (preg_match($patron, $tmp_equipo)) {
                    $equipo = $tmp_equipo;
                } else $err_equipo = "El nombre del equipo solo puede contener letras, punto y espacio.";
            } else $err_equipo = "Enombre del equipo tiene que tener como mínimo 3 caracteres y como máximo 20.";
        } else $err_equipo = "El equipo es obligatorio.";

        //Iniciales
        if ($tmp_iniciales != '') {
            if (strlen($tmp_iniciales) == 3) {
                $patron = "/^[A-Z]+$/";
                if (preg_match($patron, $tmp_iniciales)) {
                    $iniciales = $tmp_iniciales;
                } else $err_iniciales = "Las iniciales solo pueden contener letras mayúsculas.";
            } else $err_iniciales = "Tiene que tener 3 caracteres exactos";
        } else $err_iniciales = "Las iniciales son obligatorias.";

        //Ligas
        if (isset($_POST["ligas"])) {
            $tmp_ligas = $_POST["ligas"];
            $array_ligas = ["Liga EA Sports", "Liga HyperMotion", "Primera RFEF"];
            if (in_array($tmp_ligas, $array_ligas)) {
                $ligas = $tmp_ligas;
            } else $err_ligas = "Seleccione una liga válida.";
        } else $err_ligas = "La liga es obligatoria.";

        //Número de jugadores
        if ($tmp_numero_jugadores != '') {
            if ((int)$tmp_numero_jugadores >= 26 && (int)$tmp_numero_jugadores <= 32) {
                $numero_jugadores = $tmp_numero_jugadores;
            } else $err_numero_jugadores = "El equipo puede tener como mínimo 26 jugadores y como máximo 32.";
        } else $err_numero_jugadores = "El número de jugadores es obligatorio.";

        //Fecha de fundación
        if ($tmp_fecha_fundacion != '') {
            $patron = "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/";
            if (preg_match($patron, $tmp_fecha_fundacion)) {
                $fecha_actual = date("Y-m-d");
                list($anio_actual, $mes_actual, $dia_actual) = explode("-", $fecha_actual);
                list($anio_fundacion, $mes_fundacion, $dia_fundacion) = explode("-", $tmp_fecha_fundacion);
                //18/12/1889
                if ($anio_fundacion > 1889) {
                    $fecha_fundacion = $tmp_fecha_fundacion;
                } else if ($anio_fundacion == 1889) {
                    if ($mes_fundacion == 12) {
                        if ($dia_fundacion >= 18) {
                            $fecha_fundacion = $tmp_fecha_fundacion;
                        } else $err_fecha_fundacion = "No puede haber equipos anteriores al 18 de diciembre de 1889.";
                    } else $err_fecha_fundacion = "No puede haber equipos anteriores a diciembre de 1889.";
                } else $err_fecha_fundacion = "No puede haber equipos anteriores a 1889.";
                //dinamico
                if ($anio_fundacion < $anio_actual) {
                    $fecha_fundacion = $tmp_fecha_fundacion;
                } else if ($anio_fundacion  == $anio_actual) {
                    if ($mes_fundacion < $mes_actual) {
                        $fecha_fundacion = $tmp_fecha_fundacion;
                    } else if ($mes_fundacion == $mes_actual) {
                        if ($dia_fundacion <= $dia_actual) {
                            $fecha_fundacion = $tmp_fecha_fundacion;
                        } else $err_fecha_fundacion = "La fecha de fundacion tiene como limite la fecha de hoy (día).";
                    } else $err_fecha_fundacion = "La fecha de fundacion tiene como limite la fecha de hoy (mes).";
                } else $err_fecha_fundacion = "La fecha de fundación tiene como límite la fecha de hoy (año).";
            } else $err_fecha_fundacion = "Formato inválido (dd-mm-aaaa).";            
        } else $err_fecha_fundacion = "La fecha de fundación es obligatoria";
    }
    ?>


    <div class= "container">
    <h1>Formulario de furbo</h1>
        <!-- col-6 para que coja el ancho de 6 columnas (como si la pantalla estuviese dividido en 12 columnas)-->
        <form class = "col-6" action = "" method = "post">
            <div class = "mb-3"> <!--mb-3 - margin bottom 3rem. Tambien sirve con el resto de margenes.-->
                <label class = "form-label">Equipo</label>
                <?php if(isset($err_equipo)) echo "<span class = 'error'>$err_equipo</span>";?><br>
                <input class = "form-control" type = "text" name = "equipo">
            </div>
            <div class = "mb-3">
                <label class = "form-label">Iniciales</label>
                <?php if(isset($err_iniciales)) echo "<span class = 'error'>$err_iniciales</span>";?><br>
                <input class="form-control" name = "iniciales"></input>
            </div>
            <div class = "mb-3">
                <label class = "form-label">Ligas</label>
                <?php if(isset($err_ligas)) echo "<span class = 'error'>$err_ligas</span>";?><br>
                <div class = "mb-3">
                    <select name = "ligas" class = "form-select">
                        <option disable selected hidden>~ Elige liga ~</option>
                        <option value = "Liga EA Sports">Liga EA Sports</option>
                        <option value = "Liga HyperMotion">Liga HyperMotion</option>
                        <option value = "Primera RFEF">Primera RFEF</option>
                    </select>
                </div>
            </div>
            <div class = "mb-3">
                <label class = "form-label">Número de jugadores</label>
                <?php if(isset($err_numero_jugadores)) echo "<span class = 'error'>$err_numero_jugadores</span>";?><br>
                <input class="form-control" name = "numero_jugadores" type = "text"></input>
            </div>
            <div class = "mb-3">
                <label class = "form-label">Fecha de fundación</label>
                <?php if(isset($err_fecha_fundacion)) echo "<span class = 'error'>$err_fecha_fundacion</span>";?><br>
                <input class="form-control" name = "fecha_fundacion" type = "date"></input>
            </div>
            <div class = "mb-3">
                <input type = "submit" class = "btn btn-primary" value = "Enviar">
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>