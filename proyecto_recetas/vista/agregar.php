<?php
require_once __DIR__ . '/../controlador/RecetaControlador.php';

$controlador = new RecetaControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $pregunta = "Dame la receta del plato llamado $titulo";
    require_once __DIR__ . '/../controlador/IAControlador.php';
    $iaControlador = new IAControlador();
    $receta = $iaControlador->generarRespuesta($pregunta);
    if ($controlador->agregarReceta($titulo, $receta, $receta)) {
        echo "Receta generada y guardada.";
    } else {
        echo "Error al generar la receta.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Receta</title>
    <link rel="stylesheet" href="https://stackpath.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Agregar Nueva Receta</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="titulo">Nombre del Plato:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="receta">Receta:</label>
                <textarea class="form-control" id="receta" name="receta" rows="10" readonly><?php echo isset($receta) ? $receta : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Generar Receta</button>
        </form>
    </div>
</body>
</html>
