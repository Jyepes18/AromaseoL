document.addEventListener('DOMContentLoaded', function() {
    // Establecer la fecha y hora actuales
    let today = new Date();
    let dia = today.toISOString().split('T')[0];
    let hora = today.toTimeString().split(' ')[0].slice(0, 5);

    document.getElementById('dia').value = dia;
    document.getElementById('hora').value = hora;
});

function validar() {
    let imagen = document.getElementById('imagen');
    let descripcion = document.getElementById('descripcion').value.trim();

    // Validar la extensión de la imagen
    let allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if (!allowedExtensions.exec(imagen.value)) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, suba un archivo de imagen válido (jpg, jpeg, png, gif).'
        });
        imagen.value = '';
        return false;
    }

    if (!descripcion) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, ingrese la descripción de PQRS.'
        });
        return false;
    }

    return true;
}