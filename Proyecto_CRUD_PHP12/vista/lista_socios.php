<?php
require_once '../controlador/SociosController.php';
$controller = new SociosController();
$socios = $controller->listarSocios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Socios</title>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <div class="container mt-5">
        <h1 class="text-center">Socios Registrados</h1>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-blue">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($socios) {
                    foreach ($socios as $socio) {
                        echo "<tr>";
                        echo "<td>" . $socio['id_socio'] . "</td>";
                        echo "<td>" . $socio['nombre'] . "</td>";
                        echo "<td>" . $socio['apellido'] . "</td>";
                        echo "<td>" . $socio['email'] . "</td>";
                        echo "<td>" . $socio['telefono'] . "</td>";
                        echo "<td>" . $socio['fecha_nacimiento'] . "</td>";
                        echo "<td>";
                        echo "<a href='editar_socio.php?id=" . $socio['id_socio'] . "' class='btn btn-warning btn-sm'>Editar</a> ";
                        echo "<a href='eliminar_socio.php?id=" . $socio['id_socio'] . "' class='btn btn-danger btn-sm'>Eliminar</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No hay socios registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="text-center mt-3">
            <a href="alta_socio.php" class="btn btn-primary">Agregar un nuevo socio</a>
        </div>
    </div>
</body>
</html>