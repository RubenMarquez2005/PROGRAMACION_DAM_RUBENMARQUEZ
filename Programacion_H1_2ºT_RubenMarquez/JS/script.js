document.addEventListener('DOMContentLoaded', function() {
    // Función para validar el formulario
    function validateForm(event) {
        let form = event.target;
        let planBase = form.querySelector('#plan_base').value;
        let paqueteAdicional = form.querySelector('#paquete_adicional');
        let duracion = form.querySelector('#duracion').value;
        let edad = form.querySelector('#edad').value;


        // Mostrar valores en la consola 
        console.log('Plan Base:', planBase);
        console.log('Paquete Adicional:', Array.from(paqueteAdicional.selectedOptions).map(option => option.value));
        console.log('Duración:', duracion);
        console.log('Edad:', edad);


        // Restricción para el plan básico
        if (planBase === 'Basico') {
            if (Array.from(paqueteAdicional.selectedOptions).length > 1) {
                alert('Con el plan Básico no puedes contratar más de un paquete adicional.');
                event.preventDefault();
                return;
            }
        }


        // Restricción para el pack de deporte solo anual
        if (Array.from(paqueteAdicional.selectedOptions).map(option => option.value).includes('Deporte') && duracion === 'Mensual') {
            alert('El pack de Deporte solo puede ser contratado con duración anual.');
            event.preventDefault();
            return;
        }


        // Restricción de edad para el pack infantil
        if (edad < 18 && !Array.from(paqueteAdicional.selectedOptions).map(option => option.value).includes('Infantil')) {
            alert('Los usuarios menores de 18 años solo pueden contratar el Pack Infantil.');
            event.preventDefault();
            return;
        }
    }


// Agregar eventos de validación a los formularios de agregar y editar usuario
if (document.getElementById('formAgregarUsuario')) {
    document.getElementById('formAgregarUsuario').addEventListener('submit', validateForm);
} else if (document.getElementById('formEditarUsuario')) {
    document.getElementById('formEditarUsuario').addEventListener('submit', validateForm);
}
});
