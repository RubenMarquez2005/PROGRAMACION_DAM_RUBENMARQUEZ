<?php
// Esta página permite al usuario iniciar sesión en el sistema.

session_start(); // Inicia la sesión
if (isset($_SESSION['usuario_id'])) { // Si el usuario está autenticado
    header("Location: tareas.php"); // Redirige a la página de tareas
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si el método es POST
    require_once '../config/conexion.php'; // Requiere el archivo de conexión
    $conexion = new Conexion(); // Crea un objeto de la clase conexión
    $correo_electronico = $_POST['correo_electronico']; // Obtiene el correo electrónico
    $contrasena = $_POST['contrasena']; // Obtiene la contraseña

    $query = "SELECT * FROM usuarios WHERE correo_electronico = ?"; // Consulta para obtener el usuario por correo electrónico
    $stmt = $conexion->conexion->prepare($query);
    $stmt->bind_param('s', $correo_electronico);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($contrasena, $user['contrasena'])) { // Si el usuario existe y la contraseña es correcta
        $_SESSION['usuario_id'] = $user['id']; // Guarda el ID del usuario en la sesión
        setcookie("usuario_id", $user['id'], time() + (86400 * 30), "/"); // Crea una cookie con el ID del usuario
        header("Location: tareas.php"); // Redirige a la página de tareas
        exit();
    } else {
        $error = "Correo electrónico o contraseña incorrectos."; // Muestra un mensaje de error
    }
    $stmt->close();
    $conexion->cerrar();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: beige;">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card"> 
                <div class="card-header text-center">
                    <h2>Iniciar Sesión</h2>
                </div>
                <div class="card-body">
                    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?> <!-- Muestra un mensaje de error -->
                    <form id="loginForm" method="post" action="">
                        <div class="mb-3">
                            <label for="correo_electronico" class="form-label">Correo Electrónico:</label>
                            <input type="email" name="correo_electronico" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña:</label>
                            <input type="password" name="contrasena" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                    </form>
                    <div class="mt-3 text-center"> <!-- Enlace para registrarse -->
                        <a href="registro.php">¿No tienes una cuenta? Regístrate aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
