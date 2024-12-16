<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $archivo = "datos/clientes.csv";
    $idActual = $_POST['id_actual'];
    $nombreNuevo = $_POST['nombre'] ?? '';
    $telefonoNuevo = $_POST['telefono'] ?? '';

    $clientes = [];
    $archivoOriginal = fopen($archivo, "r");
    while (($fila = fgetcsv($archivoOriginal)) !== false) {
        if ($fila[0] === $idActual) {
            $fila[1] = $nombreNuevo !== '' ? $nombreNuevo : $fila[1];
            $fila[2] = $telefonoNuevo !== '' ? $telefonoNuevo : $fila[2];
        }
        $clientes[] = $fila;
    }
    fclose($archivoOriginal);

    $archivoNuevo = fopen($archivo, "w");
    foreach ($clientes as $cliente) {
        fputcsv($archivoNuevo, $cliente);
    }
    fclose($archivoNuevo);

    header("Location: index.php?opcion=clientes");
    exit;
}
?>
