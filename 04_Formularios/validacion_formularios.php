<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <style>
        .error {
            color:red;
        }
    </style>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_dni = $_POST["dni"];
        $tmp_nombre = $_POST["nombre"];
        $tmp_primer_apellido = $_POST["primer_apellido"];
        $tmp_segundo_apellido = $_POST["segundo_apellido"];
        $tmp_fecha_nacimiento = $_POST["fecha_nacimiento"];
        $tmp_correo_electronico = $_POST["correo_electronico"];


        //DNI
        if ($tmp_dni != '') {
            $patron = "/^[0-9]{8}[A-Z]{1}$/";
            if (preg_match($patron, $tmp_dni)) {
                $numeros = (int)(substr($tmp_dni, 0, 8));
                $resto = $numeros % 23;
                $letra_dni = substr($tmp_dni, 8, 1); //hay que especificar el length, en este caso 1, porque sino va a coger hasta el final de la cadena.
                $letras = ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
                if ($letra_dni == $letras[$resto]) {
                    $dni = $tmp_dni;
                } else {
                    $err_dni = "La letra no corresponde.";
                }
            } else {
                $err_dni = "No es un DNI válido. 8 números y 1 letra.";
            }
        } else {
            $err_dni = "El DNI es obligatorio.";
        }


        //Nombre
        if ($tmp_nombre != '') {
            $patron = "/^[A-Za-z ]{2,25}$/";
            if (preg_match($patron, $tmp_nombre)) {
                $nombre = ucwords(strtolower($tmp_nombre));
            } else if (strlen($tmp_nombre) < 2 || strlen($tmp_nombre) > 25) {
                $err_nombre = "El nombre tiene que tener entre tres y doce caracteres.";
            } else {
                $err_nombre = "El nombre no puede tener caracteres especiales.";
            }
        } else {
            $err_nombre = "El nombre es obligatorio.";
        }

        
        //Primer apellido
        if ($tmp_primer_apellido != '') {
            $patron = "/^[A-Za-z ]{2,30}$/";
            if (preg_match($patron, $tmp_primer_apellido)) {
                $nprimer_apellido = ucfirst(strtolower($tmp_primer_apellido)); 
            } else if (strlen($tmp_primer_apellido) < 2 || strlen($tmp_primer_apellido) > 30) {
                $err_primer_apellido = "El primer apellido tiene que tener entre tres y doce caracteres.";
            } else {
                $err_primer_apellido = "El primer apellido no puede tener caracteres especiales.";
            }
        } else {
            $err_primer_apellido = "El primer apellido es obligatorio.";
        }


        //Segundo apellido
        if ($tmp_segundo_apellido != '') {
            $patron = "/^[A-Za-z ]{2,30}$/";
            if (preg_match($patron, $tmp_segundo_apellido)) {
                $nprimer_apellido = ucfirst(strtolower($tmp_segundo_apellido)); 
            } else if (strlen($tmp_segundo_apellido) < 2 || strlen($tmp_segundo_apellido) > 30) {
                $err_segundo_apellido = "El segundo apellido tiene que tener entre tres y doce caracteres.";
            } else {
                $err_segundo_apellido = "El segundo apellido no puede tener caracteres especiales.";
            }
        } else {
            $err_segundo_apellido = "El segundo apellido es obligatorio.";
        }


        //Fecha de nacimiento
        if ($tmp_fecha_nacimiento != '') {
            $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
            if (preg_match($patron, $tmp_fecha_nacimiento)) {
                $fecha_actual = date("Y-m-d");
                list($anno_nacimiento, $mes_nacimiento, $dia_nacimiento) = explode('-',$tmp_fecha_nacimiento);
                list($anno_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);
                if (($anno_actual - $anno_nacimiento) < 18) {
                    $err_fecha_nacimiento = "Menor de edad.";
                } else if (($anno_actual - $anno_nacimiento) == 18) {
                    if ($mes_actual > $mes_nacimiento) {
                        $fecha_nacimiento = $tmp_fecha_nacimiento;
                    } else {
                        if ($dia_actual > $dia_nacimiento) {
                            $fecha_nacimiento = $tmp_fecha_nacimiento;
                        } else {
                            $err_fecha_nacimiento = "Menor de edad.";
                        }
                    }
                } else {
                    if (($anno_actual - $anno_nacimiento) <= 121) {
                        $fecha_nacimiento = $tmp_fecha_nacimiento;
                    } else if (($anno_actual - $anno_nacimiento) == 120) {
                        if ($mes_actual > $mes_nacimiento) {
                            $fecha_nacimiento = $tmp_fecha_nacimiento;
                        } else {
                            if($dia_actual < $dia_nacimiento) {
                                $fecha_nacimiento = $tmp_fecha_nacimiento;
                            }else{
                                $err_fecha_nacimiento = "La fecha no es válida";
                            }
                        }
                    } else {
                        $err_fecha_nacimiento = "Fecha no válida";
                    }
                }
            } else {
                $err_fecha_nacimiento = "Fecha de nacimiento no válida (YYYY-MM-DD).";
            }
        } else {
            $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria.";
        }


        //Correo electrónico
        if ($tmp_correo_electronico != '') {
            $patron = "/^[A-Za-z0-9_]{1,10}@[a-z]{1,10}.[a-z]{1,3}$/";
            if (preg_match($patron, $tmp_correo_electronico)) {
                $palabrotas = ["bobo", "tonto", "cochino"];
                $encontrada = false;
                for($i = 0; $i < count($palabrotas); $i++) {
                    if (str_contains($tmp_correo_electronico, $palabrotas[$i])) {
                        $i = count($palabrotas);
                        $encontrada = true;
                    }
                }
                if (!$encontrada) $correo_electronico = $tmp_correo_electronico;
                else $err_correo_electronico = "No puede contener palabrotas";
            } else {
                $err_correo_electronico = "Correo electronico no válido";
            }
        } else {
            $err_correo_electronico = "El correo electrónico es obligatorio";
        }

    }
    ?>

    <form action = "" method = "post">
        <input type = "text" name = "dni" placeholder = "DNI"><br>
        <?php if(isset($err_dni)) echo "<span class = 'error'>$err_dni</span>"?><br><br>
        <input type = "text" name = "nombre" placeholder = "Nombre"><br>
        <?php if(isset($err_nombre)) echo "<span class = 'error'>$err_nombre</span>"?><br><br>
        <input type = "text" name = "primer_apellido" placeholder = "Primer apellido"><br>
        <?php if(isset($err_primer_apellido)) echo "<span class = 'error'>$err_primer_apellido</span>"?><br><br>
        <input type = "text" name = "segundo_apellido" placeholder = "Segundo apellido"><br>
        <?php if(isset($err_segundo_apellido)) echo "<span class = 'error'>$err_segundo_apellido</span>"?><br><br>
        <label>Fecha de nacimiento</label><br>
        <input type = "date" name = "fecha_nacimiento"><br>
        <?php if (isset($err_fecha_nacimiento)) echo "<span class = 'error'>$err_fecha_nacimiento</span>";?><br><br>
        <input type = "text" name = "correo_electronico" placeholder = "Correo electrónico"><br>
        <?php if (isset($err_correo_electronico)) echo "<span class = 'error'>$err_correo_electronico</span>";?><br><br>
        <input type = "submit" value = "Registrarse">
        
    </form>
</body>
</html>