<?php
    function calcularPotencia ($base, $exponente) {
        if (($base != '') && ($exponente != '')) {
            $i = 0;            
            if ($exponente != 0) {
                $resultado = 1;
                while ($i < $exponente) {
                    $resultado *= $base;
                    $i++;
                }
            } else {
                $resultado = 1;
            }
            echo "<p>$base^$exponente = $resultado</p>";
        } else {
            echo "<p>Por favor, introduce base y exponente.</p>";
        }
    }
?>