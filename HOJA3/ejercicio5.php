<?php
ini_set("log_errors", 1); // Habilitar el log de errores
ini_set("error_log", "errores.log"); // Especificar el log

function convertirTemperatura($valor, $unidad)
{
    if ($unidad == "C") {
        // Convertir de F a C
        return ($valor - 32) * 5 / 9;
    } elseif ($unidad == "F") {
        // Convertir de C a F
        return ($valor * 9 / 5) + 32;
    } else {
        // Genera un error si no es valido
        echo "Error en errores.log";
        error_log("Unidad de conversión inválida."); // Guardar el error en el archivo de log
    }
}

// Pruebas
echo convertirTemperatura(100, "C") . "\n"; // Convierte 100°F a Celsius
echo convertirTemperatura(0, "F") . "\n"; // Convierte 0° celsius a Fahrenheit
echo convertirTemperatura(25, "X") . "\n"; // Error
