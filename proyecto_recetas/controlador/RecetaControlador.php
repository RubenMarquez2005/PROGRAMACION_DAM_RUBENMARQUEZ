<?php
require_once __DIR__ . '/../modelo/RecetaModelo.php';

class RecetaControlador {
    private $modelo;

    public function __construct() {
        $this->modelo = new RecetaModelo();
    }

    public function agregarReceta($titulo, $ingredientes, $elaboracion) {
        return $this->modelo->agregarReceta($titulo, $ingredientes, $elaboracion);
    }

    public function listarRecetas() {
        return $this->modelo->listarRecetas();
    }

    public function eliminarReceta($id) {
        return $this->modelo->eliminarReceta($id);
    }
}
?>
