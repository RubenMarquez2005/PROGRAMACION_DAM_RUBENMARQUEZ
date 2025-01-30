<?php
include_once('../CONTROLADOR/usuarioControlador.php');
$usuarioControlador = new UsuarioControlador();
$planes = $usuarioControlador->obtenerPlanes();
$paquetes = $usuarioControlador->obtenerPaquetes();


// Verifica que el ID está presente en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Obtenemos los datos del usuario
    $usuario = $usuarioControlador->obtenerUsuarioPorId($id);
    
    // Si no se encuentra el usuario, redirige a la página principal
    if (!$usuario) {
        header("Location: ../index.php");
        exit();
    }
} else {
    // Si no se pasa el ID, redirige a la página principal
    header("Location: ../index.php");
    exit();
}


// Verifica si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $edad = $_POST['edad'];
    $plan_base = $_POST['plan_base'];
    $paquete_adicional = $_POST['paquete_adicional']; // PAQUETE ADICIONAL
    $duracion = $_POST['duracion'];

    if ($edad < 18 && (!is_array($paquete_adicional) || !in_array('Infantil', $paquete_adicional))) {
        $paquete_adicional = ['Infantil'];
    }

    if (is_array($paquete_adicional)) {
        $paquete_adicional = implode(",", $paquete_adicional);
    }
    // Guardar los datos en un archivo de texto
    $file = fopen("usuariosmodificados.txt", "a");
    $data = "ID: $id Nombre: $nombre, Correo: $correo, Edad: $edad, Plan Base: $plan_base, Paquete Adicional: $paquete_adicional, Duración: $duracion\n";
    fwrite($file, $data);
    fclose($file);
    // Actualiza el usuario en la base de datos
    $usuarioControlador->actualizarUsuario($id, $nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion);
    
    // Redirige después de la actualización
    header("Location: ../index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
        <h2>Editar Usuario</h2>
        <form action="editar_usuario.php?id=<?php echo $id; ?>" method="POST" id="formEditarUsuario">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo htmlspecialchars($usuario['correo']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo htmlspecialchars($usuario['edad']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="plan_base" class="form-label">Plan Base</label>
                <select class="form-control" id="plan_base" name="plan_base" required>
                    <?php foreach ($planes as $plan): ?>
                        <option value="<?= htmlspecialchars($plan['nombre']); ?>" <?php if ($usuario['plan_base'] == $plan['nombre']) echo 'selected'; ?>><?= htmlspecialchars($plan['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="paquete_adicional" class="form-label">Paquete Adicional</label>
                <select class="form-control select2" id="paquete_adicional" name="paquete_adicional[]" multiple required>
                    <?php foreach ($paquetes as $paquete): ?>
                        <option value="<?= htmlspecialchars($paquete['nombre']); ?>" <?php if (in_array($paquete['nombre'], explode(", ", $usuario['paquete_adicional'])) || ($usuario['edad'] < 18 && $paquete['nombre'] == 'Infantil')) echo 'selected'; ?>><?= htmlspecialchars($paquete['nombre']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="duracion" class="form-label">Duración</label>
                <select class="form-control" id="duracion" name="duracion" required>
                    <option value="Mensual" <?php if ($usuario['duracion'] == 'Mensual') echo 'selected'; ?>>Mensual</option>
                    <option value="Anual" <?php if ($usuario['duracion'] == 'Anual') echo 'selected'; ?>>Anual</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
            <a href="../index.php" class="btn btn-primary">VOLVER</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script src="../JS/script.js"></script>
</body>
</html>
