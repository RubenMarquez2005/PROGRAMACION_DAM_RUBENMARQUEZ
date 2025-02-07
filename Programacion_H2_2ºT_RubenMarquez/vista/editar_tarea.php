<?php
// Esta página permite al usuario editar una tarea existente.

session_start(); // Inicia la sesión
if (!isset($_SESSION['usuario_id'])) { // Si el usuario no está autenticado
    header("Location: inicio.php"); // Redirige a la página de inicio
    exit(); // Finaliza la ejecución
}

require_once '../modelo/Tarea.php'; // Requiere el archivo Tarea.php
$tareaModel = new Tarea(); // Crea un objeto de la clase Tarea
$tareas = $tareaModel->obtenerPorUsuario($_SESSION['usuario_id']); // Obtiene las tareas del usuario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color: beige;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <!-- NAV -->
        <div class="container-fluid">
            <a class="navbar-brand" href="tareas.php">Gestión de Tareas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tareas.php">Volver a Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="agregar_tarea.php">Agregar Tarea</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controlador/UsuarioControlador.php?action=cerrarSesion">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h1 class="text-center">Editar Tarea</h1>
        <form action="../controlador/TareaControlador.php?action=editar" method="POST" class="mb-3"> <!-- FORM en método post -->
            <div class="mb-3">
                <label for="tarea_id" class="form-label">Selecciona la Tarea:</label>
                <select id="tarea_id" name="tarea_id" class="form-select" required>
                    <?php foreach ($tareas as $tarea): ?> <!-- Bucle para mostrar las tareas -->
                        <option value="<?php echo $tarea['id']; ?>"><?php echo htmlspecialchars($tarea['descripcion']); ?></option> <!-- Opción de la tarea -->
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nueva_descripcion" class="form-label">Nueva Descripción:</label>
                <input type="text" id="nueva_descripcion" name="nueva_descripcion" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Editar Tarea</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
