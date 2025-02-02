<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuck Norris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        $url = "https://api.chucknorris.io/jokes/categories";   

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);

        $categorias = [];

        for ($i = 0; $i < count($datos); $i++) {
            array_push($categorias, $datos[$i]);
        }

        if (isset($_GET["categoria"]) && $_GET["categoria"] != "") {
            $category = $_GET["categoria"];
            $url = "https://api.chucknorris.io/jokes/random?category=$category";   

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $datos = json_decode($respuesta, true);
            $broma = $datos["value"]; //se accede al apartado data del json
        }
    ?>

    <div class="container">
        <div class="row mt-5">
            <form action="" method="get">
                <select name="categoria">
                    <option value="">Escoge una categoría</option>
                    <?php foreach($categorias as $categoria) { ?>
                            <option value="<?php echo $categoria ?>">
                                <?php echo $categoria ?>
                            </option>
                    <?php } ?>
                </select>
                <input type="submit" value="Generar broma">
                <h3 class="mt-4"><?php if (isset($_GET["categoria"]) && $_GET["categoria"] != "") echo $broma ?></h3>
            </form>
        </div>        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>