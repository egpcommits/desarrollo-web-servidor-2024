<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
        $url = "https://api.jikan.moe/v4/top/anime";

        $curl = curl_init(); //inicia el curl
        curl_setopt($curl, CURLOPT_URL, $url); //se le pasa la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //por si hubiese que recibir datos
        $respuesta = curl_exec($curl); //se ejecuta el curl
        curl_close($curl); //se indica el curl a cerrar

        $datos = json_decode($respuesta, true); //para pasar de json a array
        $animes = $datos["data"]; //se accede al apartado data del json

        $id = $_GET["mal_id"];
    ?>

    <div class="container">
        <div class="row">
            <?php foreach($animes as $anime) { ?>
                <h1><?php $anime["title"] ?></h1>
            <?php } ?>
        </div>
    </div>
</body>
</html>