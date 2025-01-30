<?php
include_once('../CONTROLADOR/usuarioControlador.php'); // CONTROLADOR/UsuarioControlador.php
$usuarioControlador = new UsuarioControlador();  
$planes = $usuarioControlador->obtenerPlanes(); // OBTENER PLANES
$paquetes = $usuarioControlador->obtenerPaquetes(); // OBTENER PAQUETES


if ($_SERVER['REQUEST_METHOD'] === 'POST') { // REQUEST_METHOD
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $plan_base = $_POST['plan_base']; // PLAN BASE
    $paquete_adicional = $_POST['paquete_adicional']; // PAQUETE ADICIONAL
    $duracion = $_POST['duracion']; // DURACION

    
    if (is_array($paquete_adicional)) {
        $paquete_adicional = implode(",", $paquete_adicional);
    }
    // Guardar los datos en un archivo de texto
    $file = fopen("usuarios.txt", "a");
    $data = "Nombre: $nombre, Correo: $correo, Edad: $edad, Plan Base: $plan_base, Paquete Adicional: $paquete_adicional, Duración: $duracion\n";
    fwrite($file, $data);
    fclose($file);

    // Llamar al controlador para agregar el usuario
    $usuarioControlador->agregarUsuario($nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion);


    // Redirigir a la página principal después de agregar el usuario
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
        <h2>Agregar Usuario</h2>
        <form action="agregar_usuario.php" method="POST" id="formAgregarUsuario">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="mb-3">
                <label for="plan_base" class="form-label">Plan Base</label>
                <select class="form-control" id="plan_base" name="plan_base" required>
                    <?php foreach ($planes as $plan): ?>
                        <option value="<?= htmlspecialchars($plan['nombre']); ?>"><?= htmlspecialchars($plan['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="paquete_adicional" class="form-label">Paquete Adicional</label>
                <select class="form-control select2" id="paquete_adicional" name="paquete_adicional[]" multiple required>
                    <?php foreach ($paquetes as $paquete): ?>
                        <option value="<?= htmlspecialchars($paquete['nombre']); ?>"><?= htmlspecialchars($paquete['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="duracion" class="form-label">Duración</label>
                <select class="form-control" id="duracion" name="duracion" required>
                    <option value="Mensual">Mensual</option>
                    <option value="Anual">Anual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
            <a href="../index.php" class="btn btn-primary">VOLVER</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="../JS/script.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script src="../JS/script.js"></script>
</body>
</html>
