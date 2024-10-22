<?php
function primosRango ($inicial, $final) {
    
    while($inicial <= $final) {
        $es_primo = true;
        if ($inicial <= 1) $es_primo = false; //Si es menor o igual que uno, es_primo = false. Ni entra al bucle ni al if por error
        $i = 2;
        while (($i < ($inicial - 1)) && ($es_primo)) {
            if ($inicial % $i == 0) $es_primo = false;
            $i++;
        }
        if ($es_primo) echo "<p>$inicial es primo.</p>";
        $inicial++;
    }
}
?>