<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
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
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        htmlspecialchars($usuario); //solo van fuera los html chars. El usuario tiene que ser 100% accurate
        htmlspecialchars($contrasena); //solo van fuera los html chars. La contrasrña tiene que ser 100% accurate

        if ($usuario == '') $err_usuario = "El nombre de usuario es obligatorio.";
        if ($contrasena == '') $err_contrasena = "La contraseña es obligatoria.";

        $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT); //aplica el algoritmo mas reciente y mas seguro para cifrar la contraseña
        //de la contraseña cifrada no se sabe cuantos caracteres son
        //PASSWORD_DEFAULT: this constant is designed to change over time as new and stronger algorithms are added to PHP. For that reason, the length of the result from using this identifier can change over time. Therefore, it is recommended to store the result in a database column that can expand beyond 60 characters (255 characters would be a good choice).

        if (isset($usuario) && isset($contrasena)) {
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'"; //como mucho puede haber un usuario, como poco cero.
            $resultado = $_conexion -> query($sql);
    
            //var_dump($resultado);
    
            if ($resultado -> num_rows == 0) {
                $err_usuario = "El usuario no existe.";
            } else {
                $info_usuario = $resultado -> fetch_assoc(); //coge el registro correspondiente y hace un array con los campos.
                $acceso_concedido = password_verify($contrasena, $info_usuario["contrasena"]);
                if (!$acceso_concedido) {
                    $err_contrasena = "Contraseña equivocada.";
                } else {
                    //echo "<h2>Paentro</h2>";
                    session_start();
                    $_SESSION["usuario"] = $usuario;
                    header("location: ../index.php");
                    exit; //libera memoria cortando este fichero.
                }
            }
        }
        
    }
    ?>
    <div class="container">
        <form action="" method="post">
            <div class="mb-3 mt-5 col-4">
                <h2>Iniciar sesión</h2>
            </div>
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
                <input type="submit" class="btn btn-primary btn-sm" value="Iniciar sesión">
            </div>
        </form> 
        <br><br>
        <h5>Si aun no tienes cuenta, registrate.</h5>
        <a class="btn btn-secondary btn-sm" href="registro.php">Registrarse</a>
        <br><br><br>
        <a type="submit" class="btn btn-outline-secondary btn-sm" href="../index.php">Ver tienda</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>