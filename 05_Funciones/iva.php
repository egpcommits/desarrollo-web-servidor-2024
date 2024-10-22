<?php
    function calcularIva ($precio, $iva) {
        //se ha introducido algo, pero no sbemos si es correcto
        $iva = $_POST["iva"];
        $precio = $_POST["precio"];

        $pvp = match ($iva) {
            "general" => GENERAL * $precio,
            "reducido" => REDUCIDO * $precio,
            "superreducido" => SUPERREDUCIDO * $precio
        };
        echo "<p>El PVP es $pvp</p>";
    }
?>