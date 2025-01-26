<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Anime</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        * {
            font-size: 1.15rem;
            text-align: justify;
            font-family: Ubuntu;
        }

        img {
            border: 1px solid white;
        }

        h1 {
            text-shadow: 2px 2px #00bc8c;
        }
    </style>
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
    <div class="container">
        <h1 class="mt-5 text-center">TOP ANIME</h1>
        <table class="table table-hover table-striped mt-5 align-middle">
            <thead>
                <tr class="text-center">
                    <th scope="col">Rank</th>
                    <th scope="col">Título</th>
                    <th scope="col">Nota</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Ver más información</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($animes as $anime) { ?>
                        <tr>
                            <td class="text-center"><?php echo $anime["rank"] ?></td>
                            <td><?php echo $anime["title"] ?></td>
                            <td class="text-center"><?php echo $anime["score"] ?></td>
                            <td class="text-center"><img src="<?php echo $anime["images"]["jpg"]["image_url"] ?>"></td>
                            <td class="text-center"><a class="btn btn-success btn-sm" href="anime.php?mal_id=<?php echo $anime['mal_id'] ?>">Enlace</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>