<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $linea = "$id,$nombre,$telefono,$email,$direccion\n";

    file_put_contents("../datos/proveedores.csv", $linea, FILE_APPEND);
    
    header("Location: ../index.php?opcion=proveedores");
}
?>
