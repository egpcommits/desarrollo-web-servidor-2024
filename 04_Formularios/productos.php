<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
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
    
    Mostrar en unta tabla cada producto junto a su precio y su stock.

    Crear un formulario donde se introduzca el nombre de un producto, y:
        - Si hay stock, decimos que está disponible y su precio.
        - Si no hay, decimos que está agotado.
    */
    ?>

    

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Stock</th>
            </tr>            
        </thead>
        <tbody>
            <?php
                for($i = 0; $i < count($productos); $i++) {
                    $productos[$i][2] = rand(0, 5);
                }

                foreach($productos as $item) {
                    echo "<tr>";
                        echo "<td>$item[0]</td>";
                        echo "<td>$item[1]</td>";
                        echo "<td>$item[2]</td>";
                        if ($item[2] > 0) echo "<td>En stock</td>";
                        else echo "<td>Sin stock</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <br>

    <form action = "" method = "post">
        <input type = "text" name = "producto" placeholder = "Introduce producto">
        <input type = "submit" value = "Comprobar">
    </form>


    <?php
    if ($_SERVER["REQUEST_METHOD"] = "POST") {

        $producto = $_POST["producto"];

        $i = 0;
        $encontrado = false;

        while ($i < count($productos) && (!$encontrado)) {
            if (($productos[$i][0] === $producto) && ($productos[$i][2] > 0)) {
                echo "<p>El producto " . $producto .  " está disponible con " . $productos[$i][2] . " unidades, precio: " . $productos[$i][1] . "</p>";
                $encontrado = true;
            } else if (($productos[$i][0] === $producto) && ($productos[$i][2] == 0)) {
                echo "<p>No quedan existencias de $producto.</p>";
                $encontrado = true;
            }
            $i++;
        }
        if (!$encontrado) echo "<p>No existe el producto.</p>";
    }
    ?>


        

</body>
</html>