<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buddies</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/valorant" rel="stylesheet">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>

        #icono-riot {
            width: 30px;
            margin-left: 10px;
        }

        .buddies {
            /*width: 268px;
            height: 640px;*/
            width: 128px;
            height: 128px;
        }

        * {            
            font-family: 'VALORANT', sans-serif;
        }   
        
        #icono-riot {
            width: 30px;
            margin-left: 10px;
        }

    </style>
</head>
<body>
    <?php
        $url = "https://valorant-api.com/v1/buddies";   

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $buddies = $datos["data"];
    ?>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <img id="icono-riot" src="imagenes/riot.png">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a class="navbar-brand" href="https://www.riotgames.com/es">RIOT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
            <a class="nav-link active" href="agentes.php">Home
                <span class="visually-hidden">(current)</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="weapons.php">Weapons</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="playercards.php">Playercards</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="buddies.php">Buddies</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="maps.php">Maps</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-sm-2" type="search" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>

    <div class="container text-center">
        <div class="row mt-5">
        <?php foreach($buddies as $buddie) { ?>   
            <div class="card border-danger mb-3 col-2 me-3" style="max-width: 24rem;">
                <div class="card-body">
                    <p class="card-title"><?php echo $buddie["displayName"] ?></p>
                    <img class="buddies" src="<?php echo $buddie['displayIcon'] ?>"><br>
                </div>
            </div>                                
        <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>