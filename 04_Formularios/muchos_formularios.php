<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    //Declaración de variables constantes
    define("GENERAL", 1.21);
    define("REDUCIDO", 1.1);
    define("SUPERREDUCIDO", 1.04);

    require('../05_Funciones/iva.php');
    require('../05_Funciones/irpf.php');
    require('../05_Funciones/primosrango.php');
    require('../05_Funciones/temperaturas.php');
    ?>
    <title>Muchos formularios</title>
</head>
<body>
    <h1>Formulario de IVA</h1>
    <form action = "" method = "post">
        <label for = "precio">Precio</label>
        <input type = "number" name = "precio" id = "precio"><br><br>
        <label for = "iva">IVA</label>
        <select name = "iva" id = "iva">
            <option disabled selected hidden>--- Elige opción ---</option>
            <option value = "general">General</option>
            <option value = "reducido">Reducido</option>
            <option value = "superreducido">Superreducido</option>
        </select><br><br>
        <input type = "hidden" name = "accion" value = "formulario_iva">
        <input type = "submit" value = "Calcular PVP">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_iva") {
            $tmp_precio = $_POST["precio"];
            $tmp_iva = $_POST["iva"];
            if (isset($_POST["iva"])) $tmp_iva = $_POST["iva"];
            else $tmp_iva = "";

            if ($tmp_precio != '') {
                if (filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) !== FALSE) {
                    if ($tmp_precio >= 0) {
                        $precio = $tmp_precio;
                    } else {
                        $err_precio = "El precio no puede ser un número negativo";
                    }
                }
            } else {
                $err_precio = "El precio es obligatorio";
            }

            if ($tmp_iva != '') {
                if (filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) !== FALSE) {
                    if ($tmp_precio >= 0) {
                    
                        $precio = $tmp_precio;
                    } else {
                        $err_precio = "El precio no puede ser un número negativo";
                    }
                }
            } else {
                $err_precio = "El precio es obligatorio";
            }
            calcularIva($precio, $iva);
        }
    }
    ?>
    <br><br>

    <h1>Formulario de IRPF</h1>
    <form action = "" method = "post">
        <input type = "text" name = "salario" placeholder = "Salario">
        <input type = "hidden" name = "accion" value = "formulario_irpf">
        <input type = "submit" value = "Calcular IRPF">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_irpf") {
            $tmp_salario = $_POST["salario"];
            $resultado = 0;

            if ($tmp_salario != '') {
                if(filter_var($tmp_salario, FILTER_VALIDATE_FLOAT) !== FALSE) {
                    if ($tmp_salario > 0) {
                        $salario = $tmp_salario;
                        $resultado = calcularIrpf($salario);
                    } else {
                        echo "<p>El salario tiene que ser mayor a 0</p>";
                    }
                } else {
                    echo "<p>El salario tiene que ser un número.</p>";
                }
            }
            
            if ((isset($salario))) echo "<p>Salario con IRPF aplicado: $resultado</p>";
        }
    }
    ?>
    <br><br>

    <h1>Formulario de números primos entre un rango</h1>
    <form action = "" method = "post">
        <input type = "number" name = "numero1" placeholder = "Número 1">
        <input type = "number" name = "numero2" placeholder = "Número 2">
        <input type = "hidden" name = "accion" value = "formulario_primosrango">
        <input type = "submit" value = "Comprobar primos">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_primosrango") {
            $inicial = $_POST["numero1"];
            $final = $_POST["numero2"];
            primosRango($inicial, $final);
        }
    }
    ?>
    <br><br>

    <h1>Formulario temperaturas</h1>
    <form action = "" method = "post">
        <input type = "text" name = "temperatura" placeholder = "Temperatura">
        <br><br>
        <label for = "de">De:</label>
        <select name = "de" id = "de">
            <option value = "celsius">Celsius</option>
            <option value = "kelvin">Kelvin</option>
            <option value = "fahrenheit">Fahrenheit</option>            
        </select>
        <label for = "a">A:</label>
        <select name = "a" id = "a">
            <option value = "celsius">Celsius</option>
            <option value = "kelvin">Kelvin</option>
            <option value = "fahrenheit">Fahrenheit</option>            
        </select>
        <br><br>
        <input type = "submit" value = "Calcular conversión">
        <input type = "hidden" name = "accion" value = "formulario_temperatura">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"] == "formulario_temperatura") {
            $de = $_POST["de"];
            $a = $_POST["a"];
            $temperatura = $_POST["temperatura"];
            calcularTemperatura($de, $a, $temperatura);
        }
    }
    ?>
    

</body>
</html>