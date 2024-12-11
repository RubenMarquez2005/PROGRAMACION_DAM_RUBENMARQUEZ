<?php
$secreto = rand(1, 100); // Genera un número aleatorio entre 1 y 100.
echo "Adivina el número (entre 1 y 100):\n";

do{
    $intento = readline("Tu número: "); // Pide al usuario que ingrese un número.

    if ($intento < $secreto) { // Si el intento es menor al número secreto.
        echo "El número es mayor.\n";
    } elseif ($intento > $secreto) { // Si el intento es mayor.
        echo "El número es menor.\n";
    } else { // Si acertó.
        echo "¡Correcto!\n";
    }
} while ($intento != $secreto);
?>