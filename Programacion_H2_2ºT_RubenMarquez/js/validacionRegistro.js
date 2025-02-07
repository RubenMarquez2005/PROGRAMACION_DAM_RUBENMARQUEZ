// Este script valida que el usuario acepte las políticas antes de enviar el formulario de registro.

document.getElementById('registroForm').addEventListener('submit', function(event) {
    var politicas = document.getElementById('politicas'); // Se obtiene el checkbox de las políticas.
    if (!politicas.checked) { // Si el checkbox no está marcado, se muestra un mensaje de alerta y se previene el envío del formulario.
        alert('Debe aceptar las políticas correspondientes.'); // Se muestra un mensaje de alerta.
        event.preventDefault(); // Se previene el envío del formulario.
    }
});
