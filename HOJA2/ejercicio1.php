<?php
$frase = readline("Introduce una frase:"); // Pedimos al usuario que introduzca una frase
$contador = 0; // Contador de palabras
for ($i = 0; $i < strlen($frase); $i++) { // Recorremos la frase
    if ($frase[$i]== " ") { // Si encontramos un espacio
        $contador++; // Sumamos 1 al contador
    }
}
$contador++; // Sumamos 1 porque la última palabra no tiene espacio detrás
echo "La frase tiene $contador palabras"; // Mostramos el resultado
?>