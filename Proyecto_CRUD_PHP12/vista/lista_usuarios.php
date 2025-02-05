<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['rol'] !== 'admin') {
    echo "Acceso denegado.";
    exit();
}

require_once '../config/conexion.php';
$conexion = new Conexion();
$query = "SELECT * FROM usuarios";
$result = $conexion->conexion->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
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
                <?php if ($_SESSION['rol'] === 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link" href="lista_usuarios.php">USUARIOS</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center">Lista de Usuarios</h1>
    <?php if ($_SESSION['rol'] == 'admin'): ?>
        <div class="text-center mb-3">
            <a href="alta_usuarios.php" class="btn btn-primary">Crear Usuario</a>
        </div>
    <?php endif; ?>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Rol</th>
                <?php if ($_SESSION['rol'] == 'admin'): ?>
                    <th>Acciones</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_usuario']; ?></td>
                <td><?php echo $row['usuario']; ?></td>
                <td><?php echo $row['rol']; ?></td>
                <?php if ($_SESSION['rol'] == 'admin'): ?>
                    <td>
                        <a href="editar_usuario.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-warning">Editar</a>
                        <a href="eliminar_usuario.php?id=<?php echo $row['id_usuario']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php
$conexion->cerrar();
?>
