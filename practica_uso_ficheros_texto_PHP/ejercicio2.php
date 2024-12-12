<?php
$nombreArchivo = "archivo.txt";  // Especifica el nombre del archivo
$palabraBuscar = "PHP";         // La palabra que queremos buscar

// Abrir el archivo en modo lectura
$archivo = fopen($nombreArchivo, "r");

if ($archivo) {
    $contador = 0;
    // Leer línea por línea
    while (($linea = fgets($archivo)) !== false) {
        // Contar cuántas veces aparece la palabra en la línea
        $contador += substr_count($linea, $palabraBuscar);
    }
    fclose($archivo);
    echo "La palabra '$palabraBuscar' aparece " . $contador . " veces en el archivo.";
} else {
    echo "No se pudo abrir el archivo.";
}
?>
