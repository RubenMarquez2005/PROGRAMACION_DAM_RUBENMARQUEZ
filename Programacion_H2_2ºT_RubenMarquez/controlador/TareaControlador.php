<?php
// Este controlador maneja las acciones de crear, completar, eliminar y editar tareas.

require_once '../modelo/Tarea.php'; // Importa la clase Tarea

class TareaControlador { // Clase para manejar las acciones de las tareas
    private $tarea;

    public function __construct() { // Constructor de la clase
        $this->tarea = new Tarea(); // Selecciona la clase Tarea para manejar las tareas
    }

    public function crear() { // Función para crear una tarea
        session_start(); // Inicia la sesión
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['usuario_id'])) { // Si el método es POST y el usuario está autenticado
            $usuario_id = $_SESSION['usuario_id']; // Obtiene el ID del usuario
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; // Obtiene la descripción de la tarea

            if (!empty($descripcion) && $this->tarea->crear($usuario_id, $descripcion)) {
                header("Location: ../vista/tareas.php"); // Redirige a la página de tareas
                exit();
            } else {
                echo "Error al crear la tarea."; // Muestra un mensaje de error
            }
        } else {
            echo "Método no permitido o usuario no autenticado."; // Muestra un mensaje de error
        }
    }

    public function completar() { // Función para completar una tarea
        session_start(); // Inicia la sesión
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['usuario_id'])) { // Si el método es POST y el usuario está autenticado
            $id = $_POST['id']; // Obtiene el ID de la tarea
            if ($this->tarea->completar($id)) { // Si la tarea se completa
                header("Location: ../vista/tareas.php");    // Redirige a la página de tareas
                exit();
            } else {
                echo "Error al completar la tarea."; // Muestra un mensaje de error
            }
        } else {
            echo "Método no permitido o usuario no autenticado."; // Muestra un mensaje de error
        }
    }

    public function eliminar() { // Función para eliminar una tarea
        session_start(); // Inicia la sesión
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['usuario_id'])) { // Si el método es POST y el usuario está autenticado
            $id = $_POST['id']; // Obtiene el ID de la tarea
            if ($this->tarea->eliminar($id)) { // Si la tarea se elimina
                header("Location: ../vista/tareas.php"); // Redirige a la página de tareas
                exit(); // Finaliza la ejecución
            } else { // Si hay un error al eliminar la tarea
                echo "Error al eliminar la tarea."; // Muestra un mensaje de error
            }
        } else {
            echo "Método no permitido o usuario no autenticado."; // Muestra un mensaje de error
        }
    }

    public function editar() { // Función para editar una tarea
        session_start(); // Inicia la sesión
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['usuario_id'])) {   // Si el método es POST y el usuario está autenticado
            $id = $_POST['tarea_id']; // Obtiene el ID de la tarea
            $nueva_descripcion = $_POST['nueva_descripcion']; // Obtiene la nueva descripción de la tarea
            if ($this->tarea->editar($id, $nueva_descripcion)) { // Si la tarea se edita
                header("Location: ../vista/tareas.php"); // Redirige a la página de tareas
                exit();
            } else {
                echo "Error al editar la tarea."; // Muestra un mensaje de error
            }
        } else {
            echo "Método no permitido o usuario no autenticado.";
        }
    }
}

if (isset($_GET['action'])) { // Si se recibe una acción
    $controlador = new TareaControlador(); // Crea un objeto de la clase TareaControlador
    switch ($_GET['action']) { // Selecciona la acción
        case 'crear': // Si la acción es crear
            $controlador->crear(); // Ejecuta la función crear
            break; // Finaliza la ejecución
        case 'completar':
            $controlador->completar();
            break;
        case 'eliminar':
            $controlador->eliminar();
            break;
        case 'editar':
            $controlador->editar();
            break;
        default:
            echo "Acción no válida.";
            break;
    }
}
?>
