<?php
// Esta página muestra las tareas pendientes y completadas del usuario actual.
// Permite agregar nuevas tareas, completarlas y eliminarlas.

session_start(); // Inicia la sesión
if (!isset($_SESSION['usuario_id'])) { // Si el usuario no está autenticado
    header("Location: inicio.php"); // Redirige a la página de inicio
    exit(); // Finaliza la ejecución
}

require_once '../modelo/Tarea.php'; // Requiere el archivo Tarea.php
$tareaModel = new Tarea(); // Crea un objeto de la clase Tarea
$tareas = $tareaModel->obtenerPorUsuario($_SESSION['usuario_id']); // Obtiene las tareas del usuario
$tareasPendientes = array_filter($tareas, fn($tarea) => !$tarea['completada']); // Filtra las tareas pendientes
$tareasCompletadas = array_filter($tareas, fn($tarea) => $tarea['completada']); // Filtra las tareas completadas

// Obtener el nombre de usuario
require_once '../modelo/Usuario.php'; // Requiere el archivo Usuario.php
$usuarioModel = new Usuario();
$usuario = $usuarioModel->obtenerPorId($_SESSION['usuario_id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Tareas</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: beige;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- NAV -->
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestión de Tareas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="agregar_tarea.php">Agregar Tarea</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editar_tarea.php">Editar Tarea</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controlador/UsuarioControlador.php?action=cerrarSesion">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">   
        <h1 class="text-center">Mis Tareas - <?php echo htmlspecialchars($usuario['nombre_usuario']); ?></h1> <!-- Muestra el nombre de usuario -->
        <form action="../controlador/TareaControlador.php?action=crear" method="POST" class="mb-3">
            <div class="mb-3">
                <label for="descripcion" class="form-label">Nueva Tarea:</label> <!-- Formulario para agregar una nueva tarea -->
                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Tarea</button>
        </form>
        <h2 class="text-center">Tareas Pendientes</h2> <!-- Muestra las tareas pendientes -->
        <div class="table-responsive">
            <table class="table table-striped text-center"> <!-- Tabla para mostrar las tareas pendientes -->
                <thead>
                    <tr>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Fecha de Creación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tareasPendientes as $tarea): ?> <!-- Bucle para mostrar las tareas pendientes -->
                        <tr>
                            <td class="text-center"><?php echo htmlspecialchars($tarea['descripcion']); ?></td>
                            <td class="text-center"><?php echo htmlspecialchars($tarea['fecha_creacion']); ?></td>
                            <td class="text-center">
                                <div class="btn-group d-flex justify-content-center" role="group"> <!-- Botones para completar y eliminar la tarea -->
                                    <form action="../controlador/TareaControlador.php?action=completar" method="POST" class="me-1"> <!-- Formulario para completar la tarea -->
                                        <input type="hidden" name="id" value="<?php echo $tarea['id']; ?>"> <!-- Formulario para completar la tarea -->
                                        <button type="submit" class="btn btn-success btn-sm">Completar</button> <!-- Botón para completar la tarea -->
                                    </form>
                                    <form action="../controlador/TareaControlador.php?action=eliminar" method="POST"> <!-- Formulario para eliminar la tarea -->
                                        <input type="hidden" name="id" value="<?php echo $tarea['id']; ?>"> <!-- Formulario para eliminar la tarea -->
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button> <!-- Botón para eliminar la tarea -->
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h2 class="text-center">Tareas Completadas</h2> <!-- Muestra las tareas completadas -->
        <div class="table-responsive">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th class="text-center">Descripción</th>
                        <th class="text-center">Fecha de Creación</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tareasCompletadas as $tarea): ?> <!-- Bucle para mostrar las tareas completadas -->
                        <tr>
                            <td class="text-center"><?php echo htmlspecialchars($tarea['descripcion']); ?></td> <!-- Muestra la descripción de la tarea -->
                            <td class="text-center"><?php echo htmlspecialchars($tarea['fecha_creacion']); ?></td>
                            <td class="text-center">
                                <form action="../controlador/TareaControlador.php?action=eliminar" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $tarea['id']; ?>"> <!-- Formulario para eliminar la tarea -->
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
