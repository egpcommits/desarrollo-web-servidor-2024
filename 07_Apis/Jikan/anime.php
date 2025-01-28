<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
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
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <?php
        if (!isset($_GET["mal_id"])) {
            header("location: top_anime.php");
        }
        $id = intval($_GET["mal_id"]);

        //rint_r(var_dump($id));

        $url = "https://api.jikan.moe/v4/anime/$id/full";

        $curl = curl_init(); //inicia el curl
        curl_setopt($curl, CURLOPT_URL, $url); //se le pasa la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //por si hubiese que recibir datos
        $respuesta = curl_exec($curl); //se ejecuta el curl
        curl_close($curl); //se indica el curl a cerrar

        $datos = json_decode($respuesta, true); //para pasar de json a array
        $animes = $datos["data"]; //se accede al apartado data del json

        $tipo = $_GET["type"];
        $pagina = $_GET["page"];

        
    ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <a class="btn btn-success btn-sm" href="top_anime.php?page=<?php echo $pagina ?>&type=<?php echo $tipo ?>">Volver</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <h1 class="text-body"><?php echo $animes["title"] ?></h1>
            </div>
            <div class="col-1 offset">
                <h1><?php echo $animes["score"] ?></h1>
            </div>
        </div>        
        <div class="row mt-5">
            <div class="justify-content-center d-flex col-3">
                <img src="<?php echo $animes['images']['jpg']['image_url'] ?>">
            </div>
            <div class="col">
                <p><?php echo $animes["synopsis"] ?></p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <p>Año de estreno: <?php echo $animes["year"] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p>Estudio: <?php echo $animes["studios"]["0"]["name"] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p>Número de episodios: <?php echo $animes["episodes"] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <p>Géneros: 
                    <ul>
                        <?php foreach($animes["genres"] as $anime) { ?>                         
                            <li><?php echo $anime["name"]; ?></li>
                        <?php } ?>                        
                    </ul>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Productoras: 
                    <ul>
                        <?php foreach($animes["producers"] as $anime) { ?>                         
                            <li><?php echo $anime["name"]; ?></li>
                        <?php } ?>                        
                    </ul>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p>Relacionados: 
                    <ul>
                        <?php foreach($animes["relations"] as $anime) { 
                            foreach($anime["entry"] as $relacion) { 
                                if ($relacion["type"] == "anime") { ?>
                                <li><?php echo $relacion["name"]; ?></li>
                                <?php } ?>
                            <?php } ?>                            
                        <?php } ?>                        
                    </ul>
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col offset-3 mt-5 mb-5">
                <iframe width="600" height="350" src="<?php echo $animes['trailer']['embed_url'] ?>" allowfullscreen></iframe>
            </div>            
        </div>
    </div>
</body>
</html>