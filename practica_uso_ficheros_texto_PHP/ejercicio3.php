<?php
$nombreArchivo = "log.txt";  // Especifica el nombre del archivo

// Obtener la fecha y hora actual
$fechaHora = date("Y-m-d H:i:s");  // Formato: año-mes-día hora:minuto:segundo

// Crear o abrir el archivo en modo de añadir (a)
$archivo = fopen($nombreArchivo, "a");

if ($archivo) {
    // Escribir la fecha y hora en el archivo
    fwrite($archivo, "Evento registrado en: " . $fechaHora . "\n");
    fclose($archivo);
    echo "Evento registrado con éxito.";
} else {
    echo "No se pudo abrir el archivo.";
}
?>
