<?php
// Función para realizar cálculos
function calculadora($a, $b, $operador) {
    if ($operador == "+") {
        return $a + $b; // Suma
    } elseif ($operador == "-") {
        return $a - $b; // Resta
    } elseif ($operador == "*") {
        return $a * $b; // Multiplicación
    } elseif ($operador == "/") {
        if ($b == 0) { //si el divisor es cero
            throw new Exception("No se puede dividir entre cero."); // Lanza un error
        }
        return $a / $b; // División
    } else {
        throw new Exception("Operador no válido."); // Lanza un error si el operador no es reconocido
    }
}

// Manejo de errores
try {
    $resultado = calculadora(10, 0, "/"); // Cambia estos valores para probar
    echo "El resultado es: " . $resultado; // Muestra el resultado
} catch (Exception $e) {
    // muestra el mensaje
    echo "Error: " . $e->getMessage();
}
