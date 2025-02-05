<?php
require_once "../controlador/SociosController.php";

$controlador = new SociosController();
$controlador->eliminarSocio($_GET['id']); // Elimina al socio por su ID.
echo"<br><a href='../vista/lista_socios.php'>Volver a la lista de socios</a>";
?>