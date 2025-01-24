<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $url = "http://localhost/Ejercicios/06_bases_de_datos/animes/api/api_estudios.php";

        if (!empty($_GET["ciudad"])) { //si no esta vacia la variable ciudad
            $ciudad = $_GET["ciudad"];
            $url = $url . "?ciudad=$ciudad";
        }

        $curl = curl_init(); //inicia el curl
        curl_setopt($curl, CURLOPT_URL, $url); //se le pasa la url
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //por si hubiese que recibir datos
        $respuesta = curl_exec($curl); //se ejecuta el curl
        curl_close($curl); //se indica el curl a cerrar

        $estudios = json_decode($respuesta, true); //para pasar de json a array

        //print_r($estudios);
    ?>

    <form action="" method="get">
        <input type="text" name="ciudad">
        <input type="submit" value="Enviar">
    </form>

    <table>
        <thead>
            <tr>
                <th>Nombre de estudio</th>
                <th>Ciudad</th>
                <th>Año de fundacion</th>
            </tr>            
        </thead>
        <tbody>
            <?php foreach($estudios as $estudio) {
                echo "<tr>";
                echo "<td>" . $estudio["nombre_estudio"] . "</td>";
                echo "<td>" . $estudio["ciudad"] . "</td>";
                echo "<td>" . $estudio["anno_fundacion"] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    
</body>
</html>