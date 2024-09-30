<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de la semana</title>
</head>
<body>
    <?php
        $dia = date("l");
        echo "<h1>Hoy es día $dia</h1>";

        /*Hacer un switch que muestre por pantalla si hoy hay clases de web servidor.*/
        switch ($dia) {
            case 'Tuesday':
            case 'Wednesday':
            case 'Friday':
                echo "<p>Hoy hay clases de web servidor</p>";
                break;
            default:
                echo "<p>Hoy no hay clases de web servidor</p>";
        }

        /*  1.- Crear un switch que según el día en que estemos, almacene en una variabe el dia en español.
            2.- Reescribir el el switch de la asignatura con los días en español.*/

        $var = "";

        switch ($dia) {
            case "Monday":
                $var = "Lunes";
                break;
            case "Tuesday":
                $var = "Martes";
                break;
            case "Wednesday":
                $var = "Miércoles";
                break;
            case "Thursday":
                $var = "Jueves";
                break;
            case "Friday":
                $var = "Viernes";
                break;
            case "Saturday":
                $var = "Sábado";
                break;
            case "Sunday":
                $var = "Domingo";
                break;
        }

        switch ($var) {
            case 'Martes':
            case 'Miércoles':
            case 'Viernes':
                echo "<p>Hoy $var hay clases de web servidor</p>";
                break;
            default:
                echo "<p>Hoy $var no hay clases de web servidor</p>";
        }

        //Estructura MATCH - parecido al switch, pero con algunas cosas más. Con el match se pueden hacer comparaciones booleanas
        /*$resultado = match ($var) {
            "Martes" => "<p>Hoy $var hay clases de web servidor</p>",
            "Miércoles" => "<p>Hoy $var hay clases de web servidor</p>",
            "Viernes" => "<p>Hoy $var hay clases de web servidor</p>",
            default => "<p>Hoy $var no hay clases de web servidor</p>"
        };*/

        $resultado = match ($var) {
            "Martes", "Miércoles", "Viernes" => "<p>Hoy $var hay clases de web servidor</p>",
            default => "<p>Hoy $var no hay clases de web servidor</p>"
        };

        echo $resultado;


        /* Hacer el ejercicio del random(1,3) usando match */
        $num_random = rand(1,3);
        $resultado_random = match ($num_random) {
            1 => "<p>El número es $num_random</p>",
            2 => "<p>El número es $num_random</p>",
            3 => "<p>El número es $num_random</p>"
        };
        echo $resultado_random;

        /* Hacer el ejercicio de par/impar usando match */
        $num_unodiez = rand(1,10);
        $parimpar = $num_unodiez % 2;
        $resultado_unodiez = match ($parimpar) {
            0 => "<p>El número $num_unodiez es par</p>",
            1 => "<p>El número $num_unodiez es impar</p>"
        };
        echo $resultado_unodiez;
    ?>
</body>
</html>