<?php
    function comprobarEdad ($nombre, $edad) {
        if (($nombre != '') && ($edad != '')) {
            echo "<p>$nombre tiene $edad años.</p>";
        } else {
            echo "<p>Por favor, introduce nombre y edad</p>";
        }
    }
?>