<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de animes - animes</title>
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
                $tmp_titulo = $_POST["titulo"];
                //$tmp_nombre_estudio = $_POST["nombre_estudio"];
                $tmp_anno_estreno = $_POST["anno_estreno"];
                $tmp_num_temporadas = $_POST["num_temporadas"];

                if ($tmp_titulo != '') {
                    if (strlen($tmp_titulo) <= 80) {
                        $titulo = $tmp_titulo;
                    } else $err_titulo = "El título tendrá como máximo 80 caracteres.";
                } else $err_titulo = "El título es obligatorio";


                if (isset($_POST["nombre_estudio"])) {
                    $tmp_nombre_estudio = $_POST["nombre_estudio"];
                    $array_estudios = ["Madhouse", "ufotable", "Bones", "Mappa", "Shaft"];
                    if (in_array($tmp_nombre_estudio, $array_estudios)) {
                        $nombre_estudio = $tmp_nombre_estudio;
                    } else $err_nombre_estudio = "Elige un estudio válido.";
                } else $err_nombre_estudio = "El estudio es obligatorio.";


                if ($tmp_anno_estreno != '') {
                    $patron = "/^[0-9]{4}$/";
                    if (preg_match($patron, $tmp_anno_estreno)) {
                        $anno_actual = date("Y");
                        if ($tmp_anno_estreno >= 1960) {
                            $anno_estreno = $tmp_anno_estreno;
                        } else $err_anno_estreno = "El año de estreno no puede ser anterior a 1960.";
                        if ($tmp_anno_estreno <= ($anno_actual + 5)) {
                            $anno_estreno = $tmp_anno_estreno;
                        } else $err_anno_estreno = "El año de estreno no puede ser mayor a " . ($anno_actual + 5);
                        
                        
                    } else $err_anno_estreno = "El año de estreno solo puede contener 4 números.";
                }


                if ($tmp_num_temporadas != '') {
                    if (strlen($tmp_num_temporadas) >= 1 && strlen($tmp_num_temporadas) <= 2) {
                        $patron = "/^[0-9]+$/";
                        if (preg_match($patron, $tmp_num_temporadas)) {
                            $num_temporadas = $tmp_num_temporadas;
                        } else $err_num_temporadas = "El número de temporadas solo puede contener caracteres numéricos.";
                    } else $err_num_temporadas = "El número de temporadas tiene como mínimo 1 caracter y como máximo 2 (1 a 99).";
                } else $err_num_temporadas = "El número de temporadas es obligatorio.";
            }
        ?>


        <form action = "" method = "post">
            <div class="mb-3">
                <label for = "titulo">Título</label><br>
                <?php if(isset($err_titulo)) echo "<span class = 'error'>$err_titulo</span>"; ?> <br>
                <input type = "text" name = "titulo" id = "titulo">
            </div>            
            <div class="mb-3">
                <label for = "nombre_estudio">Nombre del estudio</label><br>
                <?php if(isset($err_nombre_estudio)) echo "<span class = 'error'>$err_nombre_estudio</span>"; ?><br>
                <select name="nombre_estudio" id = "nombre_estudio">
                    <option disabled selected hidden>~ Elige estudio ~</option>
                <?php
                $array_estudios = ["Madhouse", "ufotable", "Bones", "Mappa", "Shaft"];
                for ($i = 0; $i < count($array_estudios); $i++) {
                    echo "<option value='$array_estudios[$i]'>$array_estudios[$i]</option>";
                }
                ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="anno_estreno">Año de estreno</label><br>
                <?php if(isset($err_anno_estreno)) echo "<span class = 'error'>$err_anno_estreno</span>"; ?><br>
                <input type="text" name = "anno_estreno" id = "anno_estreno">
            </div>
            <div class="mb-3">
                <label for="num_temporadas">Número de temporadas</label><br>
                <?php if (isset($err_num_temporadas)) echo "<span class = 'error'>$err_num_temporadas</span>"; ?><br>
                <input type="number" name = "num_temporadas" id = "num_temporadas">
            </div>
            <input type="submit" value = "Enviar">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>