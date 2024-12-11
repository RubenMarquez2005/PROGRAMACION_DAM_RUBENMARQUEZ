<?php
// Solicitar contraseña al usuario
echo "Ingresa tu contraseña: ";
$contrasena = readline();

// Verificar si la contraseña cumple con los criterios
$es_valida = true;

if (strlen($contrasena) < 8) {
    echo "La contraseña debe tener al menos 8 caracteres.\n";
    $es_valida = false;
}

if (!preg_match('/[A-Z]/', $contrasena)) {
    echo "La contraseña debe contener al menos una letra mayúscula.\n";
    $es_valida = false;
}

if (!preg_match('/[a-z]/', $contrasena)) {
    echo "La contraseña debe contener al menos una letra minúscula.\n";
    $es_valida = false;
}

if (!preg_match('/[0-9]/', $contrasena)) {
    echo "La contraseña debe contener al menos un número.\n";
    $es_valida = false;
}

if ($es_valida) {
    echo "¡Contraseña válida!\n";
}
?>
