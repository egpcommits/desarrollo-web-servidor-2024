<?php
    function calcularTemperatura ($de, $a, $temperatura) {
        if (($de != '') && ($a != '')) {
            $resultado = 0;

            if (($de == "celsius") && ($a == "kelvin")) $temperatura + 273.15;
            else if (($de == "celsius") && ($a == "fahrenheit")) $resultado = ($temperatura * 9 / 5) + 32;
            else if (($de == "kelvin") && ($a == "celsius")) $resultado = $temperatura - 273.15;
            else if (($de == "kelvin") && ($a == "fahrenheit")) $resultado = ($temperatura - 273.15) * (9 / 5) + 32;
            else if (($de == "fahrenheit") && ($a == "celsius")) $resultado = ($temperatura - 32) * (5 / 9);
            else if (($de == "fahrenheit") && ($a == "kelvin")) $resultado = ($temperatura - 32) * (5 / 9) + 273.15;
            else $resultado = $temperatura;

            echo "<p>$temperatura $de = $resultado $a</p>";
        }
    }
?>