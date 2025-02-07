<?php
// Esta clase maneja las operaciones CRUD para las tareas.

require_once '../config/conexion.php'; // Importa la clase Conexion

class Tarea { // Clase para manejar las tareas
    private $conn; // Variable para manejar la conexión

    public function __construct() { // Constructor de la clase
        $this->conn = (new Conexion())->conexion; // Establece la conexión
        if ($this->conn->connect_error) { // Si hay un error en la conexión
            die("Conexión fallida: " . $this->conn->connect_error); // Muestra un mensaje de error
        }
    }

    public function crear($usuario_id, $descripcion) { // Función para crear una tarea
        $stmt = $this->conn->prepare("INSERT INTO tareas (usuario_id, descripcion, fecha_creacion) VALUES (?, ?, NOW())"); // Prepara la consulta una cosa nueva es el NOW que es para agregar la fecha de creacion y la hora en la que se creo la tarea
        if (!$stmt) { // Si hay un error en la preparación de la consulta
            die("Error en la preparación de la consulta: " . $this->conn->error); // Muestra un mensaje de error
        }
        $stmt->bind_param("is", $usuario_id, $descripcion); // Asigna los parámetros
        return $stmt->execute(); // Ejecuta la consulta
    }

    public function obtenerPorUsuario($usuario_id) { // Función para obtener las tareas de un usuario
        $stmt = $this->conn->prepare("SELECT id, descripcion, fecha_creacion, completada FROM tareas WHERE usuario_id = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->conn->error);
        }
        $stmt->bind_param("i", $usuario_id); // Asigna los parámetros
        $stmt->execute(); // Ejecuta la consulta
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // Devuelve los resultados
    }

    public function completar($id) { // Función para completar una tarea
        $stmt = $this->conn->prepare("UPDATE tareas SET completada = TRUE WHERE id = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->conn->error);
        }
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function eliminar($id) { // Función para eliminar una tarea
        $stmt = $this->conn->prepare("DELETE FROM tareas WHERE id = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->conn->error);
        }
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function editar($id, $nueva_descripcion) { // Función para editar una tarea
        $stmt = $this->conn->prepare("UPDATE tareas SET descripcion = ? WHERE id = ?");
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $this->conn->error);
        }
        $stmt->bind_param("si", $nueva_descripcion, $id);
        return $stmt->execute();
    }
}
?>
