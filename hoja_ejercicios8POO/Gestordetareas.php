<?php
class Tarea { // Clase Tarea
    public $titulo; // Atributo
    public $descripcion; // Atributo
    public $fechaLimite; // Atributo
    public $estado; // Atributo
    public function __construct($titulo, $descripcion, $fechaLimite, $estado){ // Método constructor
        $this->titulo = $titulo; // Asignamos valor 
        $this->descripcion = $descripcion; // Asignamos valor 
        $this->fechaLimite = $fechaLimite; // Asignamos valor 
        $this->estado = $estado; // Asignamos valor 
    }
    public function marcarComoCompletada(){ // Método para marcar como completada
        $this->estado = "Completada"; // Acción
    }
    public function editarDescripcion($descripcion){ // Método para editar descripción
        $this->descripcion = $descripcion; // Acción
    }
    public function mostrarTarea(){ // Método para mostrar tarea
        echo "Título: $this->titulo\n"; // Acción
        echo "Descripción: $this->descripcion\n"; // Acción
        echo "Fecha límite: $this->fechaLimite\n"; // Acción
        echo "Estado: $this->estado\n"; // Acción
    }
}
$tarea = new Tarea("Estudiar Programación", "Estudiar POO", "2024-10-15", "Completada"); // Instanciamos la clase
$tarea->marcarComoCompletada(); // Llamamos, es lo que vamos a hacer
$tarea->editarDescripcion("Estudiar la hoja de ejercicios de POO"); // Llamamos, es lo que vamos a hacer
$tarea->mostrarTarea(); // Llamamos, es lo que vamos a hacer
