<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perrito aleatorio</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php 
        $url = "https://dog.ceo/api/breeds/image/random";   

        $curl = curl_init(); //inicia el curl
        curl_setopt($curl, CURLOPT_URL, $url); //se le pasa la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //por si hubiese que recibir datos
        $respuesta = curl_exec($curl); //se ejecuta el curl
        curl_close($curl); //se indica el curl a cerrar

        $datos = json_decode($respuesta, true); //para pasar de json a array
        $perritos = $datos["message"]; //se accede al apartado data del json
    ?>

    <form action="" method="get">
        <input type="submit" name="mostrar" value="Mostrar perrito"><br><br>
        <img alt="foto_perrito" src="<?php echo $perritos ?>">
    </form>
</body>
</html>