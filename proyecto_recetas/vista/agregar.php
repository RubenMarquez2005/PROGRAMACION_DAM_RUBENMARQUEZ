<?php
require_once __DIR__ . '/../controlador/RecetaControlador.php';

$controlador = new RecetaControlador();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $pregunta = "Dame la receta del plato llamado $titulo";

    $puerto = '8000';
    $url = "http://localhost:$puerto/v1/chat/completions";
    $datos = array(
        "model" => "llama-3.2-1b-instruct",
        "messages" => array(
            array("role" => "system", "content" => "Responde siempre en español"),
            array("role" => "user", "content" => $pregunta)
        ),
        "temperature" => 0.7,
        "max_tokens" => -1,
        "stream" => false
    );

    $jsonDatos = json_encode($datos);
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDatos);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($jsonDatos)
    ));

    $respuesta = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'Error en cURL: ' . curl_error($ch);
    } else {
        $data = json_decode($respuesta, true);
        $receta = $data['choices'][0]['message']['content'];
    }

    curl_close($ch);
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
