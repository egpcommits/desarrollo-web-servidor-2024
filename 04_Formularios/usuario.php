<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_usuario = $_POST["usuario"];
        $tmp_nombre = $_POST["nombre"];
        $tmp_apellidos = $_POST["apellidos"];
        $tmp_fecha_nacimiento = $_POST["fecha_nacimiento"];

        /*
        Usuario:
        - Entre 4 y 12 caracteres
        - Letras a-z (Mayus o minus), numeros y barrabaja
        */

        if ($tmp_usuario == '') {
            $err_usuario = "El usuario es obligatorio";
        } else { //    /^       $/   las expresiones regulares siempre van a empzar y terminar asi
            $patron = "/^[a-zA-Z0-9_]{4,12}$/"; // aqui se va a comprar directamente la longitud de la cadena con el {4,12}
            if (!preg_match($patron, $tmp_usuario)) { //Si el usuario cumple el patron
                $err_usuario = "El usuario debe tener 4 a 12 caracteres y contener letras, numeros o barrabaja";
            } else {
                $usuario = $tmp_usuario;
            }
        }

        /*
        Nombre:
        - 2-30 caracteres
        - Solo letras con tilde y espacio en blaco
        */

        if ($tmp_nombre == '') {
            $err_nombre = "El nombre es obligatorio";
        } else {
            if (strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 30) {
                $err_nombre = "El nombre tiene que tener entre 2 y 30 caracteres";
            } else {
                $patron = "/^[a-zA-A-Z\ áéíóúÁÉÍÓÚ]+$/";
                if (!preg_match($patron, $tmp_nombre)) {
                    $err_nombre = "El nombre solo puede contener letras o espacios en blanco.";
                } else {
                    $nombre = $tmp_nombre;
                }
            }
        }

        if ($tmp_apellidos == '') {
            $err_apellidos = "El nombre es obligatorio";
        } else {
            if (strlen($tmp_apellidos) < 2 || strlen($tmp_apellidos) > 30) {
                $err_apellidos = "El nombre tiene que tener entre 2 y 30 caracteres";
            } else {
                $patron = "/^[a-zA-A-Z\ áéíóúÁÉÍÓÚ]+$/";
                if (!preg_match($patron, $tmp_nombre)) {
                    $err_apellidos = "El nombre solo puede contener letras o espacioes en blanco.";
                } else {
                    $apellidos = $tmp_apellidos;
                }
            }
        }

        /*
        Fechas válidas:
        - No se podrá haber nacido hace mas de 120 años.
        [0-9]{4}\-[0-9]{2}\-[0-9]{2}
        */

        if ($tmp_fecha_nacimiento == '') {
            $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
        } else {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if (!preg_match($patron, $tmp_fecha_nacimiento)) {
                $err_fecha_nacimiento = "El formato de la fecha es incorrecto";
                //Realmente esta comprobacion se hace en caso de que se cambie el tipo del input en el html
            } else {
                $fecha_actual = date("Y-m-d");
                list($anno_actual, $mes_actual, $dia_actual) = explode('-',$fecha_actual);
                //Muy parecido a hacer un split separando por guiones -> 25-10-2024 -> 25 10 2024, y cada uno se guarda en la variable correspondiente.
                //120 años (si hoy cumple no se acpeta. Si es mañana cuando cumple y se registra hoy si se acpeta)
                if ($anno_actual - (date("Y")) <= 120) {
                    $fecha_nacimiento = $tmp_fecha_nacimiento;
                } else if ($anno_actual - (date("Y")) > 121) {
                    $err_fecha_nacimiento = "La fecha no es valida";
                } else {
                    if ($mes_actual > date("m")) {
                        $fecha_nacimiento = $tmp_fecha_nacimiento;
                    } else {
                        if($dia_actual > date("d")) {
                            $fecha_nacimiento = $tmp_fecha_nacimiento;
                        }else{
                            $err_fecha_nacimiento = "La fecha no es válida";
                        }
                    }
                }
            }
        }
    }
    ?>
    <form action = "" method = "post">
        <?php if (isset($err_usuario)) echo "<span class = 'error'>$err_usuario</span>";?>
        <input type = "text" name = "usuario" placeholder = "Usuario"><br><br>
        <?php if (isset($err_nombre)) echo "<span class = 'error'>$err_nombre</span>";?>
        <input type = "text" name = "nombre" placeholder = "Nombre"><br><br>
        <?php if (isset($err_apellidos)) echo "<span class = 'error'>$err_apellidos</span>";?>
        <input type = "text" name = "apellidos" placeholder = "Apellidos"><br><br>
        <label>Fecha de nacimiento</label><br>
        <?php if (isset($err_fecha_nacimiento)) echo "<span class = 'error'>$err_fecha_nacimiento</span>";?>
        <input type = "date" name = "fecha_nacimiento"><br><br>
        <input type = "submit" value = "Registrarse">
    </form>
</body>
</html>