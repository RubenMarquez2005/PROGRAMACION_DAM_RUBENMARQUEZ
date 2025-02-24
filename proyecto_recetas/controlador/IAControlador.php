<?php

class IAControlador {
    private $puerto = '8000';
    private $url;

    public function __construct() {
        $this->url = "http://localhost:$this->puerto/v1/chat/completions";
    }

    public function generarRespuesta($pregunta) {
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
        $ch = curl_init($this->url);
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
}
?>
