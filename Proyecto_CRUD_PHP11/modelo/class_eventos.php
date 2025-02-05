<?php
require_once '../config/conexion.php';

class Evento {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    // Agregar un nuevo evento
    public function agregarEvento($nombre_evento, $fecha, $lugar) {
        $query = "INSERT INTO eventos (nombre_evento, fecha, lugar) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sss", $nombre_evento, $fecha, $lugar);

        if ($stmt->execute()) {
            echo "Evento agregado con éxito.";
        } else {
            echo "Error al agregar evento: " . $stmt->error;
        }

        $stmt->close();
    }

    // Obtener todos los eventos
    public function obtenerEventos() {
        $query = "SELECT * FROM eventos";
        $resultado = $this->conexion->conexion->query($query);
        $eventos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $eventos[] = $fila;
        }
        return $eventos;
    }

    // Obtener un evento por ID
    public function obtenerEventoPorId($id_evento) {
        $query = "SELECT * FROM eventos WHERE id_evento = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_evento);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    // Actualizar un evento
    public function actualizarEvento($id_evento, $nombre_evento, $fecha, $lugar) {
        $query = "UPDATE eventos SET nombre_evento = ?, fecha = ?, lugar = ? WHERE id_evento = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("sssi", $nombre_evento, $fecha, $lugar, $id_evento);

        if ($stmt->execute()) {
            echo "Evento actualizado con éxito.";
        } else {
            echo "Error al actualizar evento: " . $stmt->error;
        }

        $stmt->close();
    }

    // Eliminar un evento
    public function eliminarEvento($id_evento) {
        $query = "DELETE FROM eventos WHERE id_evento = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id_evento);

        if ($stmt->execute()) {
            echo "Evento eliminado con éxito.";
        } else {
            echo "Error al eliminar evento: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

