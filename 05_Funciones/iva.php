<?php
    //int or float
    function calcularIva (int|float $precio, string $iva) : string {
        //se ha introducido algo, pero no sbemos si es correcto

        $pvp = match ($iva) {
            "general" => GENERAL * $precio,
            "reducido" => REDUCIDO * $precio,
            "superreducido" => SUPERREDUCIDO * $precio
        };
        echo "<p>El PVP es $pvp</p>";
    }

    //saneamiento de datos (sanitizing)
    function example (int $entrada) : int|bool {
        if ($entrada >= 0) return $entrada;
        else return false;
    }
?>