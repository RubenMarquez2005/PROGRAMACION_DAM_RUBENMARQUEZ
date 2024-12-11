<?php
// Listas de nombres y apellidos
$nombres = ["Carlos", "María", "Juan", "Ana", "Luis"];
$apellido1 = ["Pérez", "González", "Martínez", "Rodríguez", "Sánchez"];
$apellido2 = ["García", "Fernández", "López", "Torres", "Ramírez"];

// Generar un nombre y apellido aleatorio
$nombre_aleatorio = $nombres[rand(0, count($nombres) - 1)];
$apellido1_aleatorio = $apellido1[rand(0, count($apellido1) - 1)];
$apellido2_aleatorio = $apellido2[rand(0, count($apellido2) - 1)];

echo "Nombre completo: ".$nombre_aleatorio . " " .$apellido1_aleatorio ." " .$apellido2_aleatorio ."\n";
?>