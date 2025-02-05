<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../vista/login.php");
    exit();
}

require_once '../modelo/class_usuarios.php';
$usuarios = new Usuarios();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['accion'];
    if ($accion == 'crear') {
        $usuario = $_POST['usuario'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rol = $_POST['rol'];
        $usuarios->crearUsuario($usuario, $password, $rol);
    } elseif ($accion == 'actualizar') {
        $id = $_POST['id'];
        $usuario = $_POST['usuario'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $rol = $_POST['rol'];
        $usuarios->actualizarUsuario($id, $usuario, $password, $rol);
    } elseif ($accion == 'eliminar') {
        $id = $_POST['id'];
        $usuarios->eliminarUsuario($id);
    }
    header("Location: ../vista/lista_usuarios.php");
    exit();
}
?>
