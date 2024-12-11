<?php
function tablasdeMultiplicar($numero)
{
    // Comprobar si es número entero y positivo
    if (is_int($numero) && $numero > 0) {
        // Imprimir la tabla de multiplicar
        for ($i = 0; $i <= 10; $i++) {
            echo "$numero x $i = " . ($numero * $i) . "\n";
        }
    } else {
        // Si el número no es válido, lanzar un error
        throw new Exception("El número debe ser un entero positivo.");
    }
}

try {
    // numero valido 5
    echo tablasdeMultiplicar(5);
    // número inválido -2
    echo tablasdeMultiplicar(-2);
} catch (Exception $e) {
    // mostrar el error
    echo "Error: " . $e->getMessage() . "\n";
}
