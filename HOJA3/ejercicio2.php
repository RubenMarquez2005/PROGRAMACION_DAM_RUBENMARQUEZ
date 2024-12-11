<?php
// Archivo donde se guardan los errores
$archivo_log = "errores.log";

//Registrar errores en un archivo
ini_set("log_errors", 1); // Activar el registro de errores
ini_set("error_log", $archivo_log); // Archivo donde se guardarán los errores

// Función para validar un correo electrónico
function validarEmail($email, $archivo_log) {
    // Validar el correo electrónico
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Válido"; // Devuelve "Válido" si el formato es correcto
    } else {
        // Mostrar un mensaje de error y mostrarlo en el archivo
        echo "Error registrado en $archivo_log";
        error_log("El correo electrónico $email es inválido."); // Guardar el error en el archivo
    }
}

// Probamos con un correo válido
echo validarEmail("correo@ejemplo.com", $archivo_log) . "\n"; // Imprime "Válido"

// Probamos con un correo inválido
echo validarEmail("correo_invalido", $archivo_log) . "\n"; // Registra el error y muestra un mensaje
