<?php
$altura = readline("Ingrese la altura de la pirámide: "); // Pide al usuario la altura.

for ($i = 1; $i <= $altura; $i++) {
    for ($h = 1; $h <= $i; $h++) {
        echo "$h";
    }
    echo "\n";
}
?>
