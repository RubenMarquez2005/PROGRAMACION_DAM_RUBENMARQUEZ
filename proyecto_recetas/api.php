<?php
require_once "./controlador/RecetaControlador.php";

$controlador = new RecetaControlador();

function generarReceta($pregunta) {
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
        return 'Error en cURL: ' . curl_error($ch);
    } else {
        $data = json_decode($respuesta, true);
        return $data['choices'][0]['message']['content'];
    }

    curl_close($ch);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data["titulo"])) {
        $respuestaIA = generarReceta($data["titulo"]);
        if ($controlador->agregarReceta($data["titulo"], $respuestaIA, $respuestaIA)) {
            echo json_encode(["mensaje" => "Receta generada y guardada"]);
        } else {
            echo json_encode(["mensaje" => "Error al generar la receta"]);
        }
    }
}
?>
