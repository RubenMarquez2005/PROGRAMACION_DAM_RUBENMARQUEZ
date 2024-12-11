<?php
$numero = readline("Ingrese un número: "); // Pide al usuario un número.

for ($i = 1; $i <= 10; $i++) { // Repite desde 1 hasta 10.
    echo "$numero x $i = " . ($numero * $i) . "\n"; // Muestra el resultado de la multiplicación.
}
?>
