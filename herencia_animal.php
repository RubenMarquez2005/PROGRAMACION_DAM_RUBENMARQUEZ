<?php 
class Animal { // Clase padre
    public $nombre; // Atributo
    public $edad; // Atributo
    public function emitirSonido(){ // Método
        echo "Este animal no tiene sonido\n"; // Acción
    }
}
class Perro extends Animal{ // Clase hija
    public function emitirSonido(){ // Método
        echo "Mi perro se llama $this->nombre , tiene $this->edad años de edad y hace Guau guau\n"; // Acción
    }
}

$miPerro = new Perro(); // Instanciamos la clase
$miPerro->nombre = "MAX"; // Asignamos valor al atributo
$miPerro->edad = 3; // Asignamos valor al atributo
$miPerro->emitirSonido(); // Llamamos
