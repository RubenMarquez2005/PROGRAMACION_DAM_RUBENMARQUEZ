<?php
class Libro{ // Clase
    public $titulo; // Atributo
    public $autor;  // Atributo
    public $paginas;    // Atributo
    public function mostrarInfo(){ // Método
        echo "El libro $this->titulo fue escrito por $this->autor y tiene $this->paginas páginas\n";
    }
}

$miLibro = new Libro(); // Instanciar la clase
// Asignar valores a las propiedades
$miLibro->titulo = "Culpa Tuya";  // Asignamos valor al atributo
$miLibro->autor = "Mercedes Ron"; // Asignamos valor al atributo
$miLibro->paginas = 400; // Asignamos valor al atributo
// Llamamos al método mostrarInfo
$miLibro->mostrarInfo(); // Llamamos
