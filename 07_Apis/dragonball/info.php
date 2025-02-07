<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Ball Api</title>
    <link href="bootstrap.css" rel="stylesheet">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>
        #personajes {
            width: 150px;
            height:300px;    
        }
    </style>
</head>
<body>
    <?php
        $id = $_GET["id"];
        $page = $_GET["page"];
        $url = "https://dragonball-api.com/api/characters/$id";   

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personaje = $datos;
    ?>
    <div class="container">
        <div class="row">
            <a class="btn btn-primary btn-sm col-1 mt-5 offset-10" href="index.php?page=<?php echo $page ?>&limit=9">Volver atras</a>
        </div>
        <div class="row mt-5 mb-4">
            <h2><?php echo $personaje["name"] ?></h2>
        </div>
        <div class="row">
            <div class="col">
                <p><?php echo $personaje["description"] ?></p>
                <p><b>Raza: </b><?php echo $personaje["race"] ?></p>
                <p><b>Máximo Ki: </b><?php echo $personaje["maxKi"] ?></p>
            </div>
            <div class="text-center  col-3">
                <img id="personajes" src="<?php echo $personaje["image"] ?>">
            </div>
        </div>
        <div class="row mt-5 mb-3">
            <h2>Información sobre el planeta</h2>
        </div>
        <div class="row">
            <div class="col">
                <p>Planeta de origen: <?php echo $personaje["originPlanet"]["name"] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img src="<?php echo $personaje["originPlanet"]["image"] ?>">
            </div>
        </div>
        <div class="row mt-5 mb-3">
            <h2>Transformaciones</h2>
        </div>
        <div class="row">
            <div class="col">
                <ul>
                <?php
                    foreach($personaje["transformations"] as $transformaciones) { ?>
                        <li><?php echo $transformaciones["name"] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <?php
                    foreach($personaje["transformations"] as $transformaciones) { ?>
                        <img id="personajes" src="<?php echo $transformaciones["image"] ?>">
                    <?php } ?>
            </div>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>