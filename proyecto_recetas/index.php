<?php
require_once __DIR__ . '/controlador/RecetaControlador.php';
require_once __DIR__ . '/controlador/IAControlador.php';

$controlador = new RecetaControlador();
$iaControlador = new IAControlador();
$recetas = $controlador->listarRecetas();
$respuestas = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pregunta'])) {
    $pregunta = $_POST['pregunta'];
    $respuestaIA = $iaControlador->generarRespuesta($pregunta);
    $respuestas[] = $respuestaIA;

    // Guardar la receta en la base de datos
    $controlador->agregarReceta($pregunta, $respuestaIA, $respuestaIA);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interacción con IA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Interacción con IA</h1>

        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <a class="navbar-brand" href="#">Recetas</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="vista/recetas_guardadas.php">Ver Recetas Guardadas</a>
                    </li>
                </ul>
            </div>
        </nav>
        

        <form method="post" action="">
            <div class="form-group">
                <label for="pregunta">¿Qué receta necesitas?:</label>
                <input type="text" class="form-control" id="pregunta" name="pregunta" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Preguntar</button>
        </form>

        <div class="mt-3">
            <?php foreach ($respuestas as $respuesta): ?>
                <div class="alert alert-info">
                    <strong>Respuesta de la IA:</strong> <?php echo $respuesta; ?>
                </div>
    
                <form method="post" action="">
                    <div class="form-group">
                        <label for="pregunta">¿Tienes otra pregunta sobre esta receta?:</label>
                        <input type="text" class="form-control" id="pregunta" name="pregunta" required>
                    </div>
                    <button type="submit" class="btn btn-secondary btn-block">Preguntar</button>
                </form>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
