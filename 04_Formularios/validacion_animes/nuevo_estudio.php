<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de animes - estudios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <style>
        .error{color: red; font-style: italic}
    </style>
</head>
<body>
    <div class="container">
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $tmp_nombre_estudio = $_POST["nombre_estudio"];
                $tmp_nombre_ciudad = $_POST["nombre_ciudad"];

                if ($tmp_nombre_estudio != '') {
                    $patron = "/^[A-Za-z0-9 ]+$/";
                    if (preg_match($patron, $tmp_nombre_estudio)) {
                        $nombre_estudio = $tmp_nombre_estudio;
                    } else $err_nombre_estudio = "El nombre del estudio solo puede contener letras, números y espacios en blanco.";
                } else $err_nombre_estudio = "El nombre del estudio es obligatorio.";


                if ($tmp_nombre_ciudad != '') {
                    $patron = "/^[A-Za-z ]+$/";
                    if (preg_match($patron, $tmp_nombre_ciudad)) {
                        $nombre_ciudad = $tmp_nombre_ciudad;
                    } else $err_nombre_ciudad = "El nombre de la ciudad solo puede contener letras y espacios.";
                } else $err_nombre_ciudad = "El nombre de la ciudad es obligatorio.";
            }
        ?>

        <form action = "" method = "post">
            <div class = "mb-3">
                <label for = "nombre_estudio">Nombre del estudio</label><br>
                <?php if (isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>"; ?><br>
                <input type = "text" name = "nombre_estudio" id = "nombre_estudio">
            </div>
            <div class = "mb-3">
                <label for = "ciudad">Nombre de la ciudad</label><br>
                <?php if (isset($err_nombre_ciudad)) echo "<span class='error'>$err_nombre_ciudad</span>"; ?><br>
                <input type = "text" name = "nombre_ciudad" id = "nombre_ciudad">
            </div>
            <input type = "submit" value = "Enviar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>