<?php
// Requerimos el controlador de usuario
require_once(__DIR__ . '/../CONTROLADOR/UsuarioControlador.php');


// Creamos una instancia del controlador de usuario
$usuarioControlador = new UsuarioControlador();


// Llamamos al método eliminarUsuario pasando el id del usuario a eliminar
$usuarioControlador->eliminarUsuario($_GET['id']);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/styles.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">StreamWeb</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agregar_usuario.php">Agregar Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mostrar_costes.php">Mostrar Costes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container text-center mt-5">
        <div class="alert alert-success" role="alert">
            Usuario eliminado correctamente.
        </div>
        <a href="../index.php" class="btn btn-primary">Volver al inicio</a>
    </div>
</body>
</html>
