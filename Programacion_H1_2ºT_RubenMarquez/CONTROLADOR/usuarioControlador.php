<?php
require_once(__DIR__ . '/../CONFIG/conexion.php'); // Verifica que la ruta y el nombre del directorio sean correctos


class UsuarioModelo {
    private $conexion;


    // Constructor que inicializa la conexión a la base de datos
    public function __construct() {
        $this->conexion = new Conexion(); // Se asume que Conexion está correctamente configurado
    }


    // Función para obtener todos los usuarios
    public function obtenerUsuarios() {
        $query = "SELECT * FROM usuarios";
        $result = $this->conexion->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    // Función para obtener un usuario por su ID
    public function obtenerUsuarioPorId($id) {
        $query = "SELECT * FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }


    // Función para agregar un usuario
    public function agregarUsuario($nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion) {
        // Validaciones específicas para el plan y la edad del usuario
        if ($plan_base === 'Basico' && is_array($paquete_adicional) && count($paquete_adicional) > 1) {
            throw new Exception("Con el plan Básico no puedes contratar más de un paquete adicional.");
        }
        if ($edad < 18) {
            if (!is_array($paquete_adicional)) {
                $paquete_adicional = [$paquete_adicional];
            }
            if (!in_array('Infantil', $paquete_adicional)) {
                throw new Exception("Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.");
            }
        }
        $paquete_adicional_str = is_array($paquete_adicional) ? implode(",", $paquete_adicional) : $paquete_adicional;

        // Convertir la duración a minúsculas para que coincida con los valores permitidos en el campo SET
        $duracion = strtolower($duracion);

        $query = "INSERT INTO usuarios (nombre, correo, edad, plan_base, paquete_adicional, duracion) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        echo $query;
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssisss", $nombre, $correo, $edad, $plan_base, $paquete_adicional_str, $duracion);
        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error al ejecutar la consulta: " . $stmt->error);
        }
    }

    // Función para actualizar un usuario
    public function actualizarUsuario($id, $nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion) {
        // Validaciones específicas para el plan y la edad del usuario
        if ($plan_base === 'Basico' && is_array($paquete_adicional) && count($paquete_adicional) > 1) {
            throw new Exception("Con el plan Básico no puedes contratar más de un paquete adicional.");
        }
        if ($edad < 18) {
            if (!is_array($paquete_adicional)) {
                $paquete_adicional = [$paquete_adicional];
            }
            if (!in_array('Infantil', $paquete_adicional)) {
                throw new Exception("Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.");
            }
        }
        if ($edad < 18) {
            $paquete_adicional = ['Infantil'];
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


    // Función para eliminar un usuario
    public function eliminarUsuario($id) {
        $query = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i", $id);
        if (!$stmt->execute()) {
            throw new mysqli_sql_exception("Error al ejecutar la consulta: " . $stmt->error);
        }
    }


    // Función para obtener todos los planes
    public function obtenerPlanes() {
        $query = "SELECT * FROM planes";
        $result = $this->conexion->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }


    // Función para obtener todos los paquetes
    public function obtenerPaquetes() {
        $query = "SELECT * FROM paquetes";
        $result = $this->conexion->conexion->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}


class UsuarioControlador {
    private $usuarioModelo;


    // Constructor que inicializa el modelo de usuario
    public function __construct() {
        $this->usuarioModelo = new UsuarioModelo();
    }


    // Función para agregar un usuario
    public function agregarUsuario($nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion) {
        $this->usuarioModelo->agregarUsuario($nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion);
    }


    // Función para actualizar un usuario
    public function actualizarUsuario($id, $nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion) {
        $this->usuarioModelo->actualizarUsuario($id, $nombre, $correo, $edad, $plan_base, $paquete_adicional, $duracion);
    }


    // Función para obtener todos los usuarios
    public function obtenerUsuarios() {
        return $this->usuarioModelo->obtenerUsuarios();
    }


    // Función para obtener un usuario por su ID
    public function obtenerUsuarioPorId($id) {
        return $this->usuarioModelo->obtenerUsuarioPorId($id);
    }


    // Función para obtener todos los planes
    public function obtenerPlanes() {
        return $this->usuarioModelo->obtenerPlanes();
    }


    // Función para obtener todos los paquetes
    public function obtenerPaquetes() {
        return $this->usuarioModelo->obtenerPaquetes();
    }


    // Función para obtener los costes de los planes y paquetes
    public function obtenerCostes() {
        $planes = $this->obtenerPlanes();
        $paquetes = $this->obtenerPaquetes();
        $costes = [];
        foreach ($planes as $plan) {
            $costes[$plan['nombre']] = $plan['precio']; 
        }
        foreach ($paquetes as $paquete) {
            $costes[$paquete['nombre']] = $paquete['precio']; 
        }
        return $costes;
    }


    // Función para eliminar un usuario
    public function eliminarUsuario($id) {
        return $this->usuarioModelo->eliminarUsuario($id);
    }
}
