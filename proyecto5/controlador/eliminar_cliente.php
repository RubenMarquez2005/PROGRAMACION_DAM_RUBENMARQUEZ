<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $archivo = "datos/clientes.csv";
    $idEliminar = $_POST['id'];

    $clientes = [];
    $archivoOriginal = fopen($archivo, "r");
    while (($fila = fgetcsv($archivoOriginal)) !== false) {
        if ($fila[0] !== $idEliminar) {
            $clientes[] = $fila;
        }
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
