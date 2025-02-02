<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick y Morty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        if (isset($_GET["count"]) && isset($_GET["gender"]) && isset($_GET["species"])) {
            $gender = $_GET["gender"];
            $species = $_GET["species"];
            $url = "https://rickandmortyapi.com/api/character/?gender=$gender&species=$species";   

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $datos = json_decode($respuesta, true);
            $personajes = $datos["results"];
        }
    ?>
    
    <div class="container">
        <form action="" method="get">
            <div class="row mt-5">
                Cantidad de personajes: &nbsp;&nbsp;&nbsp;
                <input type="text" name="count" style="width: 200px">            
            </div>
            <div class="row">
                <div class="col-2 mt-3">
                    <select name="gender">
                        <option value="">Elige género</option>
                        <option value="female">Female</option>
                        <option value="male">Male</option>
                    </select>
                </div>
                <div class="col-2 mt-3">
                    <select name="species">
                        <option value="">Elige especie</option>
                        <option value="human">Human</option>
                        <option value="alien">Alien</option>
                    </select>
                </div>            
            </div>
            <input class="col-3 mt-5" type="submit" value="Mostrar resultado">
        </form>
        
        <?php
        if (isset($personajes)) {
            //para que la tabla no aparezca a no ser que se hayan especificado valores
        ?>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th>Nombre del personaje</th>
                    <th>Género</th>
                    <th>Especie</th>
                    <th>Origen</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $i = 0;
                    $longitud = $_GET["count"];

                    while($i < $longitud) {
                        echo "<tr>";
                        //para que no de error porque no haya suficientes personajes que mostrar
                        if (!empty($personajes[$i])) { ?>
                            <td><?php echo $personajes[$i]["name"] ?></td>
                            <td><?php echo $personajes[$i]["gender"] ?></td>
                            <td><?php echo $personajes[$i]["species"] ?></td>
                            <td><?php echo $personajes[$i]["location"]["name"] ?></td>
                        <?php } else $i = $longitud;
                            $i++;
                        echo "</tr>";
                    } ?>
            </tbody>
        </table>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>