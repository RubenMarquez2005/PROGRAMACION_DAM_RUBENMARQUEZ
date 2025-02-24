<?php
require_once "./controlador/RecetaControlador.php";
require_once "./controlador/IAControlador.php";

$controlador = new RecetaControlador();
$iaControlador = new IAControlador();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data["titulo"])) {
        $respuestaIA = $iaControlador->generarRespuesta($data["titulo"]);
        if ($controlador->agregarReceta($data["titulo"], $respuestaIA, $respuestaIA)) {
            echo json_encode(["mensaje" => "Receta generada y guardada"]);
        } else {
            echo json_encode(["mensaje" => "Error al generar la receta"]);
        }
    }
}
?>
