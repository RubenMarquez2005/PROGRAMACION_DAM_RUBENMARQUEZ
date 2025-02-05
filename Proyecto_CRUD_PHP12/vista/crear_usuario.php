<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../config/conexion.php';
    $conexion = new Conexion();
    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = $_POST['rol'];

    $query = "INSERT INTO usuarios (usuario, password, rol) VALUES (?, ?, ?)";
    $stmt = $conexion->conexion->prepare($query);
    $stmt->bind_param('sss', $usuario, $password, $rol);
    $stmt->execute();
    $conexion->cerrar();
    header("Location: lista_usuarios.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
</head>
<body>
    <h2>Crear Usuario</h2>
    <form method="post" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <label for="rol">Rol:</label>
        <select name="rol" required>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <br>
        <button type="submit">Crear</button>
    </form>
</body>
</html>
