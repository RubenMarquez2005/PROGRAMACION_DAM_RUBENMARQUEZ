<!-- Este archivo se encarga de manejar las operaciones relacionadas con los usuarios en la base de datos. -->
<?php
require_once '../config/conexion.php';

class Usuario { // Clase para manejar los usuarios
    private $conn; // Variable para manejar la conexión

    public function __construct() { // Constructor de la clase
        $this->conn = (new Conexion())->conexion; // Establece la conexión
        if ($this->conn->connect_error) { // Si hay un error en la conexión
            die("Conexión fallida: " . $this->conn->connect_error);  // Muestra un mensaje de error
        }
    }

    public function registrar($nombre_usuario, $correo_electronico, $contrasena) { // Función para registrar un usuario
        $contrasena_hash = password_hash($contrasena, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO usuarios (nombre_usuario, correo_electronico, contrasena) VALUES (?, ?, ?)");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->conn->error);
        }
        $stmt->bind_param("sss", $nombre_usuario, $correo_electronico, $contrasena_hash);
        return $stmt->execute();
    }

    public function obtenerPorCorreo($correo_electronico) { // Función para obtener un usuario por correo electrónico
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE correo_electronico = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->conn->error);
        }
        $stmt->bind_param("s", $correo_electronico);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function obtenerPorId($id) { // Función para obtener un usuario por ID
        $stmt = $this->conn->prepare("SELECT nombre_usuario FROM usuarios WHERE id = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->conn->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
?>
