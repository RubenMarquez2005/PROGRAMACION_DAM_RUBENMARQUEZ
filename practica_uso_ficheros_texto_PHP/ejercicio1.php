<?php
$nombreArchivo = "archivo.txt";  // Especifica el nombre del archivo

// Abrir el archivo en modo lectura
$archivo = fopen($nombreArchivo, "r");

if ($archivo) {
    $lineas = 0;
    // Leer línea por línea
    while (fgets($archivo)) {
        $lineas++;  // Incrementar el contador por cada línea
    }
    fclose($archivo);
    echo "El archivo tiene " . $lineas . " líneas.";
} else {
    echo "No se pudo abrir el archivo.";
}
?>
