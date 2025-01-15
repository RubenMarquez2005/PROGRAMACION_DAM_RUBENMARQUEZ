<?php
class rectangulo { // Clase padre
    public $base; // Atributo
    public $altura; // Atributo
    public function area(){ // Método
        return $this->base * $this->altura; // Acción
    }
}
$miRectangulo = new rectangulo(); // Instanciamos la clase
$miRectangulo->base = 10; // Asignamos valor al atributo
$miRectangulo->altura = 5;  // Asignamos valor al atributo
echo "El área del rectángulo es: ".$miRectangulo->area()."\n"; // Llamamos