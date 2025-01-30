<?php
// Incluir archivos de configuración y controlador
require_once '../CONFIG/conexion.php';
require_once '../CONTROLADOR/usuarioControlador.php';


// Crear instancia del controlador de usuario y obtener costes
$usuarioControlador = new UsuarioControlador();
$costes = $usuarioControlador->obtenerCostes();


// Obtener usuarios
$conn = new Conexion();
$conexion = $conn->conexion;
$sql = "
    SELECT 
        u.nombre AS usuario,
        u.plan_base,
        p.precio AS precio_base_mensual,
        p.precio_anual AS precio_base_anual,
        u.paquete_adicional,
        u.duracion,
        CASE 
            WHEN u.duracion = 'Mensual' THEN p.precio + (
                SELECT SUM(pa.precio) 
                FROM paquetes pa 
                WHERE FIND_IN_SET(pa.nombre, u.paquete_adicional)
            )
            WHEN u.duracion = 'Anual' THEN p.precio_anual + (
                SELECT SUM(pa.precio_anual) 
                FROM paquetes pa 
                WHERE FIND_IN_SET(pa.nombre, u.paquete_adicional)
            )
            ELSE 0
        END AS coste_total
    FROM usuarios u
    LEFT JOIN planes p ON u.plan_base = p.nombre
";


// Ejecutar consulta
$resultado = $conexion->query($sql);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Costes Mensuales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../styles/styles.css" rel="stylesheet">
</head>
<body>
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
    <div class="container mt-5">
        <h2 class="mb-4">Coste Total por Usuario</h2>
        <?php if ($resultado->num_rows > 0): ?>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Plan Base</th>
                            <th>Duración</th>
                            <th>Paquete Adicional</th>
                            <th>Coste Total (€)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($fila = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($fila['usuario']) ?></td>
                                <td><?= htmlspecialchars($fila['plan_base']) ?></td>
                                <td><?= htmlspecialchars($fila['duracion']) ?></td>
                                <td><?= htmlspecialchars($fila['paquete_adicional'] ?? 'Ninguno') ?></td>
                                <td><?= htmlspecialchars($fila['coste_total']) ?> €</td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="alert alert-warning">No hay datos disponibles.</p>
        <?php endif; ?>
        <a href="../index.php" class="btn btn-secondary mt-3">VOLVER</a>
    </div>
</body>
</html>