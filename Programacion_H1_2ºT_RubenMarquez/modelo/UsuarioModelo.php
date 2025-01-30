<?php
require_once(__DIR__ . '/../CONFIG/conexion.php');


class UsuarioModelo {
    private $conexion;


    // Constructor que inicia la conexión a la base de datos
    public function __construct() {
        $this->conexion = new Conexion();
    }


    // Obtener todos los usuarios
    public function obtenerUsuarios() {
        $query = "SELECT * FROM usuarios";
        $result = $this->conexion->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    // Obtener un usuario por su ID
    public function obtenerUsuarioPorId($id) {
        $query = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    // Agregar un usuario
    public function agregarUsuario($nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion) {
        // Validaciones específicas para el plan y la edad del usuario
        if ($plan_base === 'Básico' && is_array($paquete_adicional) && count($paquete_adicional) > 1) {
            throw new Exception("Con el plan Básico no puedes contratar más de un paquete adicional.");
        }
        if ($edad < 18 && (!is_array($paquete_adicional) || !in_array('Infantil', $paquete_adicional))) {
            throw new Exception("Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.");
        }
        $paquete_adicional_str = is_array($paquete_adicional) ? implode(", ", $paquete_adicional) : $paquete_adicional;
        if (strlen($paquete_adicional_str) > 255) {
            throw new Exception("La longitud de 'paquete_adicional' excede el límite permitido de 255 caracteres.");
        }
        $query = "INSERT INTO usuarios (nombre, correo, edad, plan_base, paquete_adicional, duracion) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssisss", $nombre, $correo, $edad, $plan_base, $paquete_adicional_str, $duracion);
        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error al ejecutar la consulta: " . $stmt->error);
        }
    }


    // Actualizar un usuario
    public function actualizarUsuario($id, $nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion) {
        // Validaciones específicas para el plan y la edad del usuario
        if ($plan_base === 'Básico' && is_array($paquete_adicional) && count($paquete_adicional) > 1) {
            throw new Exception("Con el plan Básico no puedes contratar más de un paquete adicional.");
        }
        if ($edad < 18 && (!is_array($paquete_adicional) || !in_array('Infantil', $paquete_adicional))) {
            throw new Exception("Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.");
        }
        $paquete_adicional_str = is_array($paquete_adicional) ? implode(", ", $paquete_adicional) : $paquete_adicional;
        if (strlen($paquete_adicional_str) > 255) {
            throw new Exception("La longitud de 'paquete_adicional' excede el límite permitido de 255 caracteres.");
        }
        $query = "UPDATE usuarios SET nombre = ?, correo = ?, edad = ?, plan_base = ?, paquete_adicional = ?, duracion = ? WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssisssi", $nombre, $correo, $edad, $plan_base, $paquete_adicional_str, $duracion, $id);
        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error al ejecutar la consulta: " . $stmt->error);
        }
    }


    // Eliminar un usuario
    public function eliminarUsuario($id) {
        $query = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error al ejecutar la consulta: " . $stmt->error);
        }
    }


    // Obtener todos los planes
    public function obtenerPlanes() {
        $query = "SELECT * FROM planes";
        $result = $this->conexion->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    // Obtener todos los paquetes
    public function obtenerPaquetes() {
        $query = "SELECT * FROM paquetes";
        $result = $this->conexion->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
