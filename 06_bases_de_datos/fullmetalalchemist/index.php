<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fullmetal Alchemist (Brotherhood)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    require('conexion.php');
    ?>
    <style>
        .unknown {font-style: italic}
    </style>
</head>
<body>
    <div class = "container">
        <?php
        $sql = "SELECT * FROM personajes";
        $resultado = $_conexion -> query($sql);
        ?>

        <table class ="table table-striped">
            <thead>
                <tr>
                    <th>Núm.</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Alias</th>
                    <th>Año de nacimiento</th>
                    <th>Nacionalidad</th>
                    <th>Especie</th>
                    <th>Ocupación</th>
                    <th>Seiyuu</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($registro = $resultado -> fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $registro["id"] . "</td>";
                        if ($registro["nombre"] === NULL) echo "<td class = 'unknown'>Desconocido</td>";
                        else echo "<td>" . $registro["nombre"] . "</td>";

                        if ($registro["apellido"] === NULL) echo "<td class = 'unknown'>Desconocido</td>";
                        else echo "<td>" . $registro["apellido"] . "</td>";
                        
                        if ($registro["alias"] === NULL) echo "<td class = 'unknown'>Desconocido</td>";
                        else echo "<td>" . $registro["alias"] . "</td>";
                        
                        if ($registro["anio_nacimiento"] === NULL) echo "<td class = 'unknown'>Desconocido</td>";
                        else echo "<td>" . $registro["anio_nacimiento"] . "</td>";
                        
                        echo "<td>" . $registro["nacionalidad"] . "</td>";

                        echo "<td>" . $registro["especie"] . "</td>";

                        if ($registro["ocupacion"] === NULL) echo "<td class = 'unknown'>Desconocido</td>";
                        else echo "<td>" . $registro["ocupacion"] . "</td>";
                        
                        echo "<td>" . $registro["seiyu"] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>