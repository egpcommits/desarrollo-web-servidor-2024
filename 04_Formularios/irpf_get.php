<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular IRPF</title>
</head>
<body>
    <form action = "" method = "get">
        <input type = "text" name = "salario" placeholder = "Salario">
        <input type = "submit" value = "Calcular IRPF">
    </form>

    <?php
    if (isset($_GET["salario"])) {
        $salario = $_GET["salario"];

        if ($salario != '') {
            $resultado = 0;
            $tramo1 = (12450 * 0.19);
            $tramo2 = ((20200 - 12450) * 0.24);
            $tramo3 = ((35200 - 20200) * 0.3);
            $tramo4 = ((60000 - 35200) * 0.37);
            $tramo5 = ((300000 - 60000) * 0.45);
    
            if($salario <= 12450) {
                $resultado = $salario - ($salario * 0.19);
            } elseif ($salario > 12450 && $salario <= 20200) {
                $resultado = $salario - $tramo1 - (($salario - 12450) * 0.24); 
            } elseif ($salario > 20200 && $salario <= 35200) {
                $resultado = $salario - $tramo1 - $tramo2 - (($salario - 20200) * 0.30);
            } elseif ($salario > 35200 && $salario <= 60000) {
                $resultado = $salario - $tramo1 - $tramo2 - $tramo3- (($salario - 35200) * 0.37);
            } elseif ($salario > 60000 && $salario <= 300000) {
                $resultado = $salario - $tramo1 - $tramo2 - $tramo3 - $tramo4 - (($salario - 60000) * 0.45);
            } else {
                $resultado = $salario - $tramo1 - $tramo2 - $tramo3 - $tramo4 - $tramo5 - (($salario - 300000) * 0.47);
            }
    
            echo "<p>$resultado</p>";
        }
        
    }
    ?>
</body>
</html>