<?php 
// Decimos al usuario que introduzca los dos numeros
$numero1 = readline("Introduce el primer numero: ");
$numero2 = readline("Introduce el segundo numero: ");
// Damos a elegir al usuario la operacion que quiere realizar
// el readline es para que el usuario introduzca la operacion que quiere realizar
$operacion = readline("Elige la operacion que quieres realizar (suma, resta, multiplicación, division o módulo: ");
// Dependiendo de la operacion que elija el usuario, se realizará una operacion u otra
if ($operacion == "suma") {
    echo "El resultado de la suma es: " . ($numero1 + $numero2);
} elseif ($operacion == "resta") {
    echo "El resultado de la resta es: " . ($numero1 - $numero2);
} elseif ($operacion == "multiplicación") {
    echo "El resultado de la multiplicación es: " . ($numero1 * $numero2);
} elseif ($operacion == "division") {
    echo "El resultado de la división es: " . ($numero1 / $numero2);
} elseif ($operacion == "módulo") {
    echo "El resultado del módulo es: " . ($numero1 % $numero2);
} else {
    echo "Operación no válida";
}
?>