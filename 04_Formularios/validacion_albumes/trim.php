<?php
function string_trim (string $cadena) : string {
    $salida = trim(htmlspecialchars($cadena));
    $salida = preg_replace('/\s+/', ' ', $salida);
    return $salida;
}
?>