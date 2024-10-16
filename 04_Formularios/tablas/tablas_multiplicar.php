<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de multiplicar</title>
    <link href = "estilos.css" rel = "stylesheet">
</head>
<body>
    <table>
        <tbody>
            <?php
            $i = 0;
            $multiplicador = 1;
            while ($i < 2) { //Para los tr
                echo "<tr>";
                $j = 0;
                while ($j < 5) { //Para las celdas
                    echo "<td>";
                        $k = 1;
                        echo "<p><b>Tabla del $multiplicador</b></p>";
                        while ($k < 11) { //Para las tablas
                            echo "<p>" . $multiplicador . " x " . $k . " = " . ($multiplicador*$k) . "</p>";
                            $k++;
                        }
                        $multiplicador++;
                    echo "</td>";
                    $j++;
                }                    
                echo "</tr>";
                $i++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>