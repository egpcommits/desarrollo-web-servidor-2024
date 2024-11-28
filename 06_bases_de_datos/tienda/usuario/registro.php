<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
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
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_usuario = $_POST["usuario"];
        $tmp_contrasena = $_POST["contrasena"];

        if ($tmp_usuario != '') {
            if (strlen($tmp_usuario) >= 3 && strlen($tmp_usuario) <= 15) {
                $patron = "/^[0-9A-Za-z]+$/";
                if (preg_match($patron, $tmp_usuario)) {
                    $usuario = $tmp_usuario;
                } else $err_usuario = "El nombre de usuario estará compuesto solo de letras y numeros.";
            } else $err_usuario = "El nombre de usuario tendrá como mínimo 3 caracteres y como máximo 15.";
        } else $err_usuario = "El nombre de usuario es obligatorio.";

        if ($tmp_contrasena != '') {
            if (strlen($tmp_contrasena) >= 8 && strlen($tmp_contrasena) <= 15) {
                $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                if (preg_match($patron, $tmp_contrasena)) {
                    $contrasena = $tmp_contrasena;
                } else $err_contrasena = "La nueva contraseña tiene que tener letras en mayus y minus, algun numero y puede tener caracteres especiales.";
            } else $err_contrasena = "La nueva contraseña tiene como mínimo 8 caracteres y como maximo 15.";
        } else $err_contrasena = "La contraseña es obligatoria.";

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'"; //como mucho puede haber un usuario, como poco cero.
        $resultado = $_conexion -> query($sql);
        
        if (isset($usuario) && isset($contrasena)) {
            if ($resultado -> num_rows == 0) {
                $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
                $_conexion -> query($sql);
            } else $err_usuario = "El usuario ya existe. Introduzca un nombre distinto.";
        }
        

        
    }
    ?>
    <div class="container">
        <h1>Formulario de registro</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!--Encripta el archivo/fichero para poder mandarlo-->
            <div class="mb-3 col-4">
                <label class="form-label">Usuario</label>
                <?php if (isset($err_usuario)) echo "<span class='error'>$err_usuario</span>" ?>
                <input type="text" class="form-control" name = "usuario">
            </div>
            <div class="mb-3 col-4">
                <label class="form-label">Contraseña</label>
                <?php if (isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>" ?>
                <input type="password" class="form-control" name = "contrasena">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Registrarse">
            </div>
        </form>
        <br><br>
        <h5>Si ya tienes cuenta, inicia sesión.</h5>   
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>