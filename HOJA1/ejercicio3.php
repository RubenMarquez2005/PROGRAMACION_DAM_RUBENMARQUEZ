<?php
$numero = readline("Escribe un número: "); // Pide al usuario un número.
$esPrimo = true; 

for ($i=2; $i < $numero / 2; $i++) {
    if ($numero % $i == 0){
        $esPrimo = false; // Si el número es divisible por otro número, no es primo.
        break; // Salimos del bucle.
    }
}
if ($esPrimo) {
    echo "El número $numero es primo\n";
} else {
    echo "El número $numero no es primo\n";
}
?>
