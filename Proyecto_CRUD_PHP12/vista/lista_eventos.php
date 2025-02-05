<?php
require_once '../controlador/EventosController.php';
$controller = new EventosController();
$eventos = $controller->listarEventos();

// Verificamos el contenido de $eventos para depuración
// var_dump($eventos); die();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">GESTION CLUB DEPORTIVO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="lista_socios.php">SOCIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lista_eventos.php">EVENTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">INSCRIPCIONES</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="container mt-5">
    <h1 class="text-center">Eventos Registrados</h1>
    <table class="table table-striped table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre del Evento</th>
                <th>Fecha</th>
                <th>Lugar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (is_array($eventos)) {
            foreach ($eventos as $evento) {
                // Verificamos si $evento es un array asociativo
                if (is_array($evento)) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($evento['id_evento']); ?></td>
                        <td><?= htmlspecialchars($evento['nombre_evento']); ?></td>
                        <td><?= htmlspecialchars($evento['fecha']); ?></td>
                        <td><?= htmlspecialchars($evento['lugar']); ?></td>
                        <td>
                            <a href="editar_evento.php?id_evento=<?= urlencode($evento['id_evento']); ?>" class="btn btn-warning">Editar</a>
                            <a href="../controlador/eliminar_evento.php?id_evento=<?= urlencode($evento['id_evento']); ?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                    <?php
                }
            }
        }
        ?>
        </tbody>
    </table>
    <div class="text-center mt-3">
        <a href="alta_evento.php" class="btn btn-primary">Agregar un nuevo evento</a>
    </div>
</div>
</body>
</html>


