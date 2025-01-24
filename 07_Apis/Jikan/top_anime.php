<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $url = "https://api.jikan.moe/v4/top/anime";

        $curl = curl_init(); //inicia el curl
        curl_setopt($curl, CURLOPT_URL, $url); //se le pasa la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //por si hubiese que recibir datos
        $respuesta = curl_exec($curl); //se ejecuta el curl
        curl_close($curl); //se indica el curl a cerrar

        $datos = json_decode($respuesta, true); //para pasar de json a array
        $animes = $datos["data"]; //se accede al apartado data del json

        //print_r($animes);
    ?>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Nota</th>
                <th>Imagen</th>
                <th>Ver más</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($animes as $anime) { ?>
                    <tr>
                        <td><?php echo $anime["title"] ?></td>
                        <td><?php echo $anime["score"] ?></td>
                        <td><img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>"></td>
                        <td><a href="anime.php?=<?php echo $anime["mal_id"] ?>">Enlace</a></td>
                    </tr>
            <?php } ?>
        </tbody>
        
    </table>
</body>
</html>