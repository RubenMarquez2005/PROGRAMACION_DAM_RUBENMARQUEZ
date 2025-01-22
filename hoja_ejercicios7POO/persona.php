<?php
class Persona{ // Clase padre
    public $nombre; // Atributo
    public $edad; // Atributo
    public $genero; // Atributo
    public function presentar(){ // Método
        echo "Hola, mi nombre es $this->nombre, tengo $this->edad años y soy $this->genero\n"; // Acción
    }
}
$miPersona = new Persona(); // Instanciamos la clase
$miPersona->nombre = "Rubén"; // Asignamos valor al atributo
$miPersona->edad = 19; // Asignamos valor al atributo
$miPersona->genero = "hombre"; // Asignamos valor al atributo
$miPersona->presentar(); // Llamamos