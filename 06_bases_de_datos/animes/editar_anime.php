<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require('conexion.php');
    ?>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_anime = $_POST["id_anime"];
            $titulo = $_POST["titulo"];
            $nombre_estudio = $_POST["nombre_estudio"];
            $num_temporadas = $_POST["num_temporadas"];
            $anno_estreno = $_POST["anno_estreno"];

            /*$sql = "UPDATE animes SET
                titulo = '$titulo',
                nombre_estudio = '$nombre_estudio',
                anno_estreno = $anno_estreno,
                num_temporadas = $num_temporadas
            WHERE id_anime = $id_anime";

            $_conexion -> query($sql);*/

            #1. Prepare
            $sql = $_conexion -> prepare("UPDATE animes SET
                titulo = ?,
                nombre_estudio = ?,
                anno_estreno = ?,
                num_temporadas = ?
                WHERE id_anime = ?");
            //Se pone interrogacion a cualquier campo que vaya a recibir / tenga que recibir valores

            #2. Binding
            $sql -> bind_param("ssiii", $titulo, $nombre_estudio, $anno_estreno, $num_temporadas, $id_anime);

            #3. Execute
            $sql -> execute();
        }
            $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
            $resultado = $_conexion -> query($sql);
            $estudios = [];

            //var_dump($resultado);

            while ($registro = $resultado -> fetch_assoc()) {
                array_push($estudios, $registro["nombre_estudio"]);
            }

            echo "<h1>" . $_GET["id_anime"] . "</h1>";

            $id_anime = $_GET["id_anime"];
            /*$sql = "SELECT * FROM animes WHERE id_anime = '$id_anime'";
            $resultado = $_conexion -> query($sql);*/

            #1. Prepare
            $sql = $_conexion -> prepare("SELECT * FROM animes WHERE id_anime = ?");

            #2. Binding
            $sql -> bind_param("i", $id_anime);

            #3. Execute
            $sql -> execute();

            #4. Retrieve
            $resultado = $sql -> get_result();

            $anime = $resultado -> fetch_assoc(); //en anime estará toda la informacion del unico resultado que obtenemos.
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <!--Encripta el archivo/fichero para poder mandarlo-->
            <div class="mb-3">
                <label class="form-label">Titulo</label>
                <input type="text" class="form-control" name = "titulo" value="<?php echo $anime["titulo"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Estudio</label>
                <select class="form-select" name="nombre_estudio">
                    <option value="<?php echo $anime['nombre_estudio'] ?>" selected hidden><?php echo $anime['nombre_estudio'] ?></option>
                    <?php foreach($estudios as $estudio) { ?>
                        <option value="<?php echo $estudio ?>">
                        <?php echo $estudio ?>
                        </option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Año de estreno</label>
                <input type="text" class="form-control" name = "anno_estreno" value="<?php echo $anime["anno_estreno"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Número de temporadas</label>
                <input type="text" class="form-control" name = "num_temporadas" value="<?php echo $anime["num_temporadas"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" class="form-control" name = "imagen">
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_anime" value="<?php echo $anime["id_anime"] ?>">
                <input type="submit" class="btn btn-primary" value="Modificar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>