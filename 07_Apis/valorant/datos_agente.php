<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/valorant" rel="stylesheet">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
    <style>
        #imagen {
            width: 400px;
            height: 400px;
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
        $uuid = $_GET["uuid"];
        $url = "https://valorant-api.com/v1/agents/$uuid";   

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $agente = $datos["data"];        
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

    <div class="container">
        <div class="mt-5 col offset-11">
            <a class="btn btn-danger btn-sm" href="agentes.php">Volver</a>
        </div>
        <div class="row mb-5">
            <h1><?php echo $agente["displayName"] ?></h1>
            <h3><?php echo $agente["role"]["displayName"] ?></h3>
        </div>
        <div class="row mt-3 mb-3">
            <div class="col-4">
                <img id="imagen" src="<?php echo $agente["fullPortrait"] ?>">
            </div>             
            <div class="col-7 ms-5">
                <h4>Abilities</h4>
                <div>
                    <ul>
                        <?php foreach($agente["abilities"] as $habilidades) { ?>
                                <li><?php echo $habilidades["displayName"] ?> - <?php echo $habilidades["description"] ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>                                 
        </div>
        <div class="row">
            <div class="col-4">
                <p><?php echo $agente["description"] ?></p>
            </div>
            <?php            
                foreach($agente["abilities"] as $habilidades) { ?>
                <div class="col ms-5">
                    <?php if ($habilidades["displayIcon"] != null) { ?>
                        <img style="width: 100px; height: 100px;" src="<?php echo $habilidades["displayIcon"] ?>" alt="ability">
                    <?php } ?>
                </div>
            <?php } ?>            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>