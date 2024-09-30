<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números aleatorios</title>
</head>
<body>
    <?php
        $n = rand(1,3); //Numero aleatorio entre 1 y 3, incluyendo ambos.

        switch ($n) {
            case 1:
                echo "<p>El número aleatorio es $n</p>";
                break; //El break es necesario para que no se meta en las otras ramas del switch.
            case 2:
                echo "<p>El número aleatorio es $n</p>";
                break;
            default:
                echo "<p>El número aleatorio es $n</p>";
                break; //El break no es necesario en el deafult, porque de aqui ya acaba.
        }

        /*Comprobar con un switch si un número es par o impar.*/

        $random = rand(1,10);

        switch ($random) {
            case ($random % 2 == 0):
                echo "<p>El número $random es par.</p>";
                break;
            case ($random % 2 == 1):
                echo "<p>El número $random es impar.</p>";
                break;
        }
    ?>
</body>
</html>