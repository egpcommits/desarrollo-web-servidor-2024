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
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT); //aplica el algoritmo mas reciente y mas seguro para cifrar la contraseña
        //de la contraseña cifrada no se sabe cuantos caracteres son
        //PASSWORD_DEFAULT: this constant is designed to change over time as new and stronger algorithms are added to PHP. For that reason, the length of the result from using this identifier can change over time. Therefore, it is recommended to store the result in a database column that can expand beyond 60 characters (255 characters would be a good choice).

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'"; //como mucho puede haber un usuario, como poco cero.
        $resultado = $_conexion -> query($sql);

        //var_dump($resultado);

        if ($resultado -> num_rows == 0) {
            echo "<h2>El usuario no existe.</h2>";
        } else {
            $info_usuario = $resultado -> fetch_assoc(); //coge el registro correspondiente y hace un array con los campos.
            $acceso_concedido = password_verify($contrasena, $info_usuario["contrasena"]);
            if (!$acceso_concedido) {
                echo "<h2>Contraseña equivocada.</h2>";
            } else {
                //echo "<h2>Paentro</h2>";
                session_start();
                $_SESSION["usuario"] = $usuario;
                header("location: ../productos/index.php");
                exit; //libera memoria cortando este fichero.
            }
        }
    }
    ?>
    <div class="container">
        <h1>Iniciar sesión</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!--Encripta el archivo/fichero para poder mandarlo-->
            <div class="mb-3 col-4">
                <label class="form-label">Usuario</label>
                <input type="text" class="form-control" name = "usuario">
            </div>
            <div class="mb-3 col-4">
                <label class="form-label">Contraseña</label>
                <input type="password" class="form-control" name = "contrasena">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="Iniciar sesión">
            </div>
        </form> 
        <br><br>
        <h5>Si aun no tienes cuenta, registrate.</h5>   
        <a class="btn btn-secondary" href="registro.php">Registrarse</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>