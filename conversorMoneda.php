<?php
class ConversorMoneda{ // Clase ConversorMoneda
    public function convertirDolaresAEuros($dolares){ // Método para convertir dólares a euros
        $dinero = 0.85; // Valor de conversión
        return $dolares * $dinero; // Devuelve el resultado
    }
    public function convertirEurosADolares($euros){ // Método para convertir euros a dólares
        $dinero = 1.18;//Valor de conversión
        return $euros * $dinero; // Devuelve el resultado
    }
}
$conversor = new ConversorMoneda(); //Instanciamos la clase
echo $conversor->convertirDolaresAEuros(100) . " euros\n"; // Llamamos
echo $conversor->convertirEurosADolares(100) . " dólares\n"; // Llamamos
