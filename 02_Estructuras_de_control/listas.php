<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas</title>
</head>
<body>
    <h3>Lista 1</h3>
    <?php
    $i = 1;
    echo "<ul>";
    while ($i < 10) {
        echo "<li>$i</li>"; //Hay que asegurarse de cerrar bien los <li>
        $i++;
    }
    echo "</ul>";
    ?>

    <h3>Lista 2 </h3>
    <?php
    $i = 1;
    echo "<ul>";
    while ($i < 10):
        echo "<li>$i</li>";
        $i++;
    endwhile;
    echo "</ul>";

    //COn while y las estrucutas de control necesarias, muestra en una lista sin ordenar todos los multiplos de 3 entre 1 y 30
    echo "<h3>Múltiplos de 3</h3>";
    $i = 1;
    echo "<ul type = 'square'>";
    while ($i <= 30) {
        if ($i % 3 == 0) {
            echo "<li>$i</li>";
        }
        $i++;
    }
    echo "</ul>"
    ?>

    <h3>Lista con DO WHILE</h3>
    
    <?php
    $i = 1;

    echo "<ul>";
    do {
        echo "<li>$i</li>";
        $i++;
    } while ($i <= 10);
    echo "</ul>";
    ?>

    <h3>Lista con FOR</h3>

    <?php
    echo "<ul>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<li>$i</li>";
    };
    echo "</ul>";
    ?>

    <h3>Lista con FOR 2</h3>
    <?php
    echo "<ul>";   

    /* Este for tambien funciona, pero es bastante mas feo. Simplemente saber que existe.
    Tambien se puede dejar solo for(;;), simplemente se inicia fuera la i y se va iterando dentro del bucle.*/
    for ($i = 1; ; $i++) {
        if ($i > 10) break;
        echo "<li>$i</li>";
    };
    echo "</ul>";
    ?>


</body>
</html>