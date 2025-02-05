<?php
require_once '../config/conexion.php';

class Usuarios {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerUsuarios() {
        $query = "SELECT * FROM usuarios";
        $result = $this->conexion->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function obtenerUsuarioPorId($id) {
        $query = "SELECT * FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function crearUsuario($usuario, $password, $rol) {
        $query = "INSERT INTO usuarios (usuario, password, rol) VALUES (?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param('sss', $usuario, $password, $rol);
        return $stmt->execute();
    }

    public function actualizarUsuario($id, $usuario, $password, $rol) {
        $query = "UPDATE usuarios SET usuario = ?, password = ?, rol = ? WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param('sssi', $usuario, $password, $rol, $id);
        return $stmt->execute();
    }

    public function eliminarUsuario($id) {
        $query = "DELETE FROM usuarios WHERE id_usuario = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public function __destruct() {
        $this->conexion->cerrar();
    }
}
?>
