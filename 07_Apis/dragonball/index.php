<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Ball Api</title>
    <link href="bootstrap.css" rel="stylesheet">
    <style>
        img {
            width: 150px;
            height:300px;
        }
    </style>
</head>
<body>
    <?php

        $final = false;        

        if(!isset($_GET["page"])) {
            $pagina = 1;
        } else {
            $pagina = $_GET["page"];            
        }

        $url = "https://dragonball-api.com/api/characters?page=$pagina&limit=9";   

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personajes = $datos["items"];
    ?>
    <div class="container">
        <table class="table align-middle text-center mt-5">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Ki</th>
                    <th>Raza</th>
                    <th>Imagen</th>
                    <th>Más info.</th>
                </tr>
            </thead>
            <tbody>
                <?php                
                foreach($personajes as $propiedad) { 
                    if ($propiedad["id"] == 78) $final = true; ?>
                    <tr>
                    <td> <?php echo $propiedad["name"] ?></td>
                    <td><?php echo $propiedad["ki"] ?></td>
                    <td><?php echo $propiedad["race"] ?></td>
                    <td><img src="<?php echo $propiedad["image"] ?>"></td>
                    <td><a class="btn btn-primary btn-sm" href="info.php?id=<?php echo $propiedad["id"] ?>&page=<?php echo $pagina ?>&limit=9">Enlace</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <?php        
            $siguiente = $pagina+1;
            $anterior = $pagina-1;
        ?>

        <div class="row mt-5 mb-5">
            <?php 
            if ($final) {?>
                <div class="col-3 offset-3">
                    <a class="btn btn-light btn-sm" href="index.php?page=<?php echo $anterior ?>&limit=9">Anterior</a>
                </div>
                <div class="col-1"><h3><?php echo $pagina ?></h3></div>
            <?php } else if ($anterior != 0) { ?>
                <div class="col-3 offset-3">
                    <a class="btn btn-light btn-sm" href="index.php?page=<?php echo $anterior ?>&limit=9">Anterior</a>
                </div>
                <div class="col-1"><h3><?php echo $pagina ?></h3></div>
                <div class="col-3 offset-1">
                    <a class="btn btn-light btn-sm" href="index.php?page=<?php echo $siguiente ?>&limit=9">Siguiente</a>
                </div>
            <?php } else { ?>  
            <div class="col-1"><h3><?php echo $pagina ?></h3></div>
            <div class="col-3 offset-7">
                <a class="btn btn-light btn-sm" href="index.php?page=<?php echo $siguiente ?>&limit=9">Siguiente</a>
            </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>