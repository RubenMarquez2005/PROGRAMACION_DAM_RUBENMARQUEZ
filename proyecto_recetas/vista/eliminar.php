<?php
require_once "../controlador/RecetaControlador.php";

if (isset($_GET["id"])) {
    $controlador = new RecetaControlador();
    if ($controlador->eliminarReceta($_GET["id"])) {
        header("Location: recetas_guardadas.php");
        exit();
    } else {
        echo "Error al eliminar la receta.";
    }
} else {
    echo "ID de receta no proporcionado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Receta</title>
    <link rel="stylesheet" href="https://stackpath.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Eliminar Receta</h1>
    </div>
</body>
</html>
