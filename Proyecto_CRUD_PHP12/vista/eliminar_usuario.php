<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'admin') {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    require_once '../config/conexion.php';
    $conexion = new Conexion();
    $id = $_GET['id'];

    $query = "DELETE FROM usuarios WHERE id_usuario = ?";
    $stmt = $conexion->conexion->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $conexion->cerrar();
    header("Location: lista_usuarios.php");
    exit();
}
?>
