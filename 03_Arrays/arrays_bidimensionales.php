<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays bidimensionales</title>
    <link href = "estilos.css" rel = "stylesheet">
</head>
<body>
    <?php
    $videojuegos = [
        ["FIFA 24", "Deporte", 70],
        ["Dark Souls", "Soulslike", 50],
        ["Hollow Knight", "Metroidvania", 30]
    ];
    
    foreach($videojuegos as $videojuego) {
        list($titulo, $categoria, $precio) = $videojuego;
        echo "<p>$titulo,$categoria,$precio</p>";
    }
    
    ?>

    <h2>Haciendo tabla con foreach</h2>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($videojuegos as $videojuego) {
            list($titulo, $categoria, $precio) = $videojuego;
            echo "<tr><td>$titulo</td><td>$categoria</td><td>$precio</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <br><br>




    <h2>Añadiendo elemento al array/tabla</h2>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $nuevo_videojuego = ["Throne and Liberty", "MMO", 0];
        array_push($videojuegos, $nuevo_videojuego);
        foreach($videojuegos as $videojuego) {
            list($titulo, $categoria, $precio) = $videojuego;
            echo "<tr><td>$titulo</td><td>$categoria</td><td>$precio</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <br><br>


    <h2>Ordenando a partir de una columna</h2>
    <?php
    $nuevo_videojuego = ["Final Fantasy VII", "Rol", 15];
        array_push($videojuegos, $nuevo_videojuego);

        //se suele utilizar la barra baja para indicar que es una variable "temporal"
        $_titulo = array_column($videojuegos, 0); //se coge el array en vez de a lo largo (por fila) a lo ancho (por columnas)
        array_multisort($_titulo, SORT_ASC, $videojuegos); //columna, asc/desc, array a ordenar
        //SORT_ASC para orden ascendiente
        //SORT_DESC para orden descendiente
    ?>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php
        
        foreach($videojuegos as $videojuego) {
            list($titulo, $categoria, $precio) = $videojuego;
            echo "<tr><td>$titulo</td><td>$categoria</td><td>$precio</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <br><br>


    <?php
        # Ej rapido 1: ordenar por el precio de más barato a más caro
        # Ej rapido 2: ordenar por la categoria en orden alfabetico inverso
    ?>

    <h2>Ordenar por el precio de más barato a más caro</h2>
    <?php
    $nuevo_videojuego = ["Zelda: Breath of the Wild", "Accion RPG", 60];
    array_push($videojuegos, $nuevo_videojuego);

    //se suele utilizar la barra baja para indicar que es una variable "temporal"
    $_precio = array_column($videojuegos, 2); //se coge el array en vez de a lo largo (por fila) a lo ancho (por columnas)
    array_multisort($_precio, SORT_ASC, $videojuegos); //columna, asc/desc, array a ordenar
    //SORT_ASC para orden ascendiente
    //SORT_DESC para orden descendiente
    ?>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoría</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($videojuegos as $videojuego) {
            list($titulo, $categoria, $precio) = $videojuego;
            echo "<tr><td>$titulo</td><td>$categoria</td><td>$precio</td></tr>";
        }
        ?>
        </tbody>
    </table>
    <br><br>


    
    <h2>Añadir nueva columna</h2>
    <?php
    $nuevo_videojuego = ["Zelda: Tears of the Kingdom", "Acción RPG", 60];
    array_push($videojuegos, $nuevo_videojuego);

    //se suele utilizar la barra baja para indicar que es una variable "temporal"
    $_categoria = array_column($videojuegos, 1); //se coge el array en vez de a lo largo (por fila) a lo ancho (por columnas)
    array_multisort($_categoria, SORT_DESC, $videojuegos); //columna, asc/desc, array a ordenar
    //SORT_ASC para orden ascendiente
    //SORT_DESC para orden descendiente
    ?>
    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($videojuegos as $videojuego) {
                list($titulo, $categoria, $precio, $estado) = $videojuego;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                if ($precio == 0) {
                    $estado = "Gratis";
                } elseif ($precio > 0) {
                    $estado = "De pago";
                }
                echo "<td>$estado</td>";
                echo "<tr>";
            }
            ?>
        </tbody>
    </table>
    <br><br>
    
</body>
</html>