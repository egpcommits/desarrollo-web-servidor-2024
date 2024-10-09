<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
    <?php
    $productos = [
        ["Nintendo Switch", 300],
        ["Playstation 5 Slim", 450],
        ["Playstation 5 Pro", 800],
        ["XBOX Series S", 300],
        ["XBOX Series X", 400]
    ];

    /*
    Añadir al array una tercera columna que será el stock, y se generará con un random entre 0 y 5.
    
    Mostrar en unta tabla cada producto junto a si precio y su stock.

    Crear un formulario donde se introduzca el nombre de un producto, y:
        - Si hay stock, decimos que está disponible y su precio.
        - Si no hay, decimos que está agotado.
    */
    ?>

    <form action = "" method = "post">
        <input type = "text" name = "producto" placeholder = "Introduce producto">
        <input type = "submit" value = "Comprobar">
    </form>

    <?php

        for($i = 0; $i < count($productos); $i++) {
            $productos[i][2] == rand(0, 5);
            if ($productos[i][2] > 0) {
                
            } else {
                
            }
        }


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $producto = $_POST["producto"];

        $i = 0;
        while ($i < count($productos)) {
            if ($productos[i] === $producto) {
                echo "<p>El producto está disponible</p>";
                $i = count($productos);
            } else {
                echo "<p>No existe el producto</p>";
            }
            $i++;
        }
    }
    ?>
</body>
</html>