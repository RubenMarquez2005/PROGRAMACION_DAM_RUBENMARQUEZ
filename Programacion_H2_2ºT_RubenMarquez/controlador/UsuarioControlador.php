<!--  Este archivo se encarga de manejar las acciones del usuario, como registrar, iniciar sesión y cerrar sesión. -->
<?php
require_once '../modelo/Usuario.php'; // Importa la clase Usuario

class UsuarioControlador { // Clase para manejar las acciones del usuario
    private $usuario; // Variable para manejar la clase Usuario

    public function __construct() { // Constructor de la clase
        $this->usuario = new Usuario(); // Selecciona la clase Usuario para manejar los usuarios
    }

    public function registrar() { // Función para registrar un usuario
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si el método es POST
            $nombre_usuario = $_POST['nombre_usuario']; // Obtiene el nombre de usuario
            $correo_electronico = $_POST['correo_electronico']; // Obtiene el correo electrónico
            $contrasena = $_POST['contrasena']; // Obtiene la contraseña

            if ($this->usuario->obtenerPorCorreo($correo_electronico)) { // Si el correo electrónico ya está registrado
                echo "El correo electrónico ya está registrado."; // Muestra un mensaje de error
            } else { // Si el correo electrónico no está registrado
                if ($this->usuario->registrar($nombre_usuario, $correo_electronico, $contrasena)) {
                    echo "Registro exitoso."; // Muestra un mensaje de éxito
                } else {
                    echo "Error en el registro."; // Muestra un mensaje de error
                }
            }
        }
    }

    public function iniciarSesion() { // Función para iniciar sesión
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Si el método es POST
            $correo_electronico = $_POST['correo_electronico']; // Obtiene el correo electrónico
            $contrasena = $_POST['contrasena']; // Obtiene la contraseña

            $usuario = $this->usuario->obtenerPorCorreo($correo_electronico); // Obtiene el usuario por correo electrónico

            if ($usuario && password_verify($contrasena, $usuario['contrasena'])) {
                session_start(); // Inicia la sesión
                $_SESSION['usuario_id'] = $usuario['id']; // Guarda el ID del usuario en la sesión
                header("Location: ../vista/tareas.php"); // Nos manda a la página de tareas
            } else { // Si los datos son incorrectos
                echo "Credenciales incorrectas."; // Muestra un mensaje de error
            }
        }
    }

    public function cerrarSesion() { // Función para cerrar sesión
        session_start(); // Inicia la sesión
        session_destroy(); // Destruye la sesión
        header("Location: ../vista/inicio.php"); // Nos manda a la página de inicio
    }
}

if (isset($_GET['action'])) { // Si hay una acción
    $controlador = new UsuarioControlador(); // Crea un objeto de la clase UsuarioControlador
    switch ($_GET['action']) { // Dependiendo de la acción
        case 'registrar': // Si la acción es registrar
            $controlador->registrar(); // Llama a la función registrar
            break; // Se termina
        case 'iniciarSesion': // Si la acción es iniciarSesion
            $controlador->iniciarSesion(); // Llama a la función iniciarSesion
            break; // Se termina
        case 'cerrarSesion': // Si la acción es cerrarSesion
            $controlador->cerrarSesion(); // Llama a la función cerrarSesion
            break; // Se termina
    }
}
?>
