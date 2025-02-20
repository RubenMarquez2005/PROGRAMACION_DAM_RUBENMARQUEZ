<?php
require_once __DIR__ . "/../config/Conexion.php";

class RecetaModelo {
    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->conexion;
    }

    public function agregarReceta($titulo, $ingredientes, $elaboracion) {
        $sql = "INSERT INTO recetas (titulo, ingredientes, elaboracion) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sss", $titulo, $ingredientes, $elaboracion);
        return $stmt->execute();
    }

    public function listarRecetas() {
        $sql = "SELECT * FROM recetas ORDER BY fecha_creacion DESC";
        $resultado = $this->conexion->query($sql);
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function eliminarReceta($id) {
        $sql = "DELETE FROM recetas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
