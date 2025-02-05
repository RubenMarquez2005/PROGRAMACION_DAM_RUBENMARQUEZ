<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once '../config/conexion.php';
$conexion = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
    $rol = $_POST['rol'];
    $id = $_GET['id'];

    if ($password) {
        $query = "UPDATE usuarios SET usuario = ?, password = ?, rol = ? WHERE id_usuario = ?";
        $stmt = $conexion->conexion->prepare($query);
        $stmt->bind_param('sssi', $usuario, $password, $rol, $id);
    } else {
        $query = "UPDATE usuarios SET usuario = ?, rol = ? WHERE id_usuario = ?";
        $stmt = $conexion->conexion->prepare($query);
        $stmt->bind_param('ssi', $usuario, $rol, $id);
    }
    $stmt->execute();
    $conexion->cerrar();
    header("Location: lista_usuarios.php");
    exit();
} else {
    $id = $_GET['id'];
    $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
    $stmt = $conexion->conexion->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $usuario = $user['usuario'];
    $rol = $user['rol'];
    $conexion->cerrar();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <form method="post" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" value="<?php echo $usuario; ?>" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password">
        <br>
        <label for="rol">Rol:</label>
        <select name="rol" required>
            <option value="admin" <?php if ($rol == 'admin') echo 'selected'; ?>>Admin</option>
            <option value="user" <?php if ($rol == 'user') echo 'selected'; ?>>User</option>
        </select>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
