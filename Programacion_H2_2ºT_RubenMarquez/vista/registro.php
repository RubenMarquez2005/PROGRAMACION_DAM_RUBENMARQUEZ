<!-- Vista para el registro de un usuario -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <h1>Registro de Usuario</h1> 
    <form id="registroForm" action="../controlador/UsuarioControlador.php?action=registrar" method="POST"> <!-- Formulario para el registro de un usuario -->
        <label for="nombre_usuario">Nombre de Usuario:</label> <!-- Campo para el nombre de usuario -->
        <input type="text" id="nombre_usuario" name="nombre_usuario" required> <!-- Campo de texto para el nombre de usuario -->
        <label for="correo_electronico">Correo Electrónico:</label> <!-- Campo para el correo electrónico -->
        <input type="email" id="correo_electronico" name="correo_electronico" required> <!-- Campo de texto para el correo electrónico -->
        <label for="contrasena">Contraseña:</label> <!-- Campo para la contraseña -->
        <input type="password" id="contrasena" name="contrasena" required> <!-- Campo de texto para la contraseña -->
        <label>
            <input type="checkbox" id="politicas" name="politicas" required> Acepto las políticas correspondientes <!-- Casilla de verificación para aceptar las políticas -->
        </label>
        <button type="submit">Registrarse</button>
    </form>
    <script src="../js/validacionRegistro.js"></script> <!-- Script para la validación del formulario de registro -->
</body>
</html>
