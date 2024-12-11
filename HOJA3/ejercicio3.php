<?php
// Función personalizada para manejar errores
function manejadorErrores($nivel, $mensaje) {
    echo "Error: $mensaje\n"; // Muestra el mensaje de error
}

// Establecer el manejador de errores personalizado
set_error_handler("manejadorErrores");

// Función para buscar un elemento en un array
function buscarElemento($array, $valor) {
    // Busca el valor en el array
    $posicion = array_search($valor, $array);

    if ($posicion !== false) { // Si se encuentra el valor
        return $posicion . "\n"; // Devuelve la posición como texto
    } else {
        // Genera un error personalizado si no se encuentra el elemento
        trigger_error("El elemento '$valor' no se encuentra en el array.", E_USER_ERROR);
    }
}

// Crear un array con valores
$array = ["manzana", "naranja", "pera"];

// Buscar un valor existente
echo buscarElemento($array, "naranja"); // Imprime la posición del elemento

// Buscar un valor inexistente
echo buscarElemento($array, "mango"); // Genera un error personalizado
