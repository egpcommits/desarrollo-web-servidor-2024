<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div class="container">
        <?php
        $usuario = $_GET["usuario"];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = $_conexion -> query($sql);
        $credenciales = $resultado -> fetch_assoc();
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //$usuario = $_POST["usuario"];
            $tmp_contrasena = $_POST["contrasena"];


            if ($tmp_contrasena != '') {
                if (strlen($tmp_contrasena) >= 8 && strlen($tmp_contrasena) <= 15) {
                    $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                    if (preg_match($patron, $tmp_contrasena)) {
                        $contrasena = $tmp_contrasena;
                    } else $err_contrasena = "La nueva contraseña tiene que tener letras en mayus y minus, algun numero y puede tener caracteres especiales.";
                } else $err_contrasena = "La nueva contraseña tiene como mínimo 8 caracteres y como maximo 15.";
            } else $err_contrasena = "La nueva contraseña es obligatoria.";

            $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);

            $sql = "UPDATE usuarios SET contrasena = '$contrasena'";
            $_conexion -> query($sql);
        }

        
        ?>

        <form action="" method="post" enctype="multipart/form-data">
            <!--Encripta el archivo/fichero para poder mandarlo-->
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <?php if (isset($err_usuario)) echo "<span class='error'>$err_usuario</span>" ?>
                <input type="text" class="form-control" name = "usuario" disabled value="<?php echo $credenciales["usuario"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <?php if (isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>" ?>
                <input type="text" class="form-control" name = "contrasena" value="<?php echo $credenciales["contrasena"] ?>">
            </div>
            <div class="mb-3">
                <input type="hidden" name="usuario" value="<?php echo $credenciales["usuario"] ?>">
                <input type="submit" class="btn btn-primary" value="Cambiar contraseña">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>