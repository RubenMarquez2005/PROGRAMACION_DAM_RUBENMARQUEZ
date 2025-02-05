<?php
require_once '../config/conexion.php';
require_once '../controlador/EventosController.php';

$id = $_GET['id'] ?? null;
$controller = new EventosController();
$error = '';

if ($id) {
    $evento = $controller->obtenerEventoPorId($id);
    if ($evento) {
        $nombre = $evento['nombre'];
        $fecha = $evento['fecha'];
        $ubicacion = $evento['ubicacion'];
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $ubicacion = $_POST['ubicacion'];

    if ($controller->actualizarEvento($id, $nombre, $fecha, $ubicacion)) {
        header('Location: index.php');
        exit();
    } else {
        $error = 'Error al actualizar evento.';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Editar Evento</h1>
    <form action="editar_evento.php?id=<?php echo $id; ?>" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $fecha; ?>">
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="<?php echo $ubicacion; ?>">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Evento</button>
        <a href="lista_eventos.php" class="btn-btn-secondary">Cancelar</a>
    </form>
    <?php if ($error): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
</body>
</html>