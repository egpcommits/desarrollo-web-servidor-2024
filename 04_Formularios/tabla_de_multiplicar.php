<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de multiplicar</title>
    <style>
        table {
            border: 1px solid black;
            text-align: center;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 9px;
        }
    </style>
</head>
<body>
    <!-- 
        Crear un formulario que reciba un número. Se mostrará en una tabla HTML la tabla de multiplicar de ese número. Ejemplo:
        3 x 1 = 3
        ...
        3 x 10 = 30
    -->
    <form action = "" method = "post">
            <label for = "tabla">Tabla de multiplicar</label>
            <input type = "text" id = "tabla" name = "tabla" placeholder = "Introduce un número">
            <input type = "submit" value = "Generar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $tabla = $_POST["tabla"];
    ?>

        <br>

       <table>
            <thead>
                <th>Tabla del <?php echo $tabla ?></th>
            </thead>
            <tbody>
            <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<tr>";
                    echo "<td>" . ($tabla) . " x " . $i . " = " . ($tabla * $i) . "</td>";
                    echo "</tr>";           
                }
            }?>
            </tbody>
       </table> 
    
    
</body>
</html>