function validar() {
    var nombre, apellido, telefono, correo, contraseña, contraVerificada, pregunta, pregunta;

    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    telefono = document.getElementById("telefono").value;
    correo = document.getElementById("correo").value;
    contraseña = document.getElementById("contraseña").value;
    contraVerificada = document.getElementById("contraVerificada").value;
    pregunta = document.getElementById("pregunta").value;   

    expresionParaLetras = /^[a-zA-Z]+$/;
    expresionParaNumeros = /^[0-9]+$/;
    expresionParaContra = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    expresionParaCorreo = /^[\w-]+(\.[\w-]+)*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})$/;

    if (nombre == "") {
        Swal.fire({
            text: "El campo nombre está vacío",
            icon: "error"
        });
        return false;
    } else if (nombre.length <= 3) {
        Swal.fire({
            text: "El campo nombre debe tener al menos 4 caracteres",
            icon: "error"
        });
        return false;
    } else if (!expresionParaLetras.test(nombre)) {
        Swal.fire({
            text: "El campo nombre solo puede contener letras",
            icon: "error"
        });
        return false;
    } else if (apellido == "") {
        Swal.fire({
            text: "El campo apellido está vacío",
            icon: "error"
        });
        return false;
    } else if (apellido.length <= 3) {
        Swal.fire({
            text: "El campo apellido debe tener al menos 4 caracteres",
            icon: "error"
        });
        return false;
    } else if (!expresionParaLetras.test(apellido)) {
        Swal.fire({
            text: "El campo apellido solo puede contener letras",
            icon: "error"
        });
        return false;
    } else if (telefono == "") {
        Swal.fire({
            text: "El campo teléfono está vacío",
            icon: "error"
        });
        return false;
    } else if (telefono.length != 10) {
        Swal.fire({
            text: "El campo teléfono debe tener 10 caracteres numericos",
            icon: "error"
        });
        return false;
    } else if (!expresionParaNumeros.test(telefono)) {
        Swal.fire({
            text: "El campo teléfono solo puede contener números",
            icon: "error"
        });
        return false;
    } else if (correo == "") {
        Swal.fire({
            text: "El campo correo está vacío",
            icon: "error"
        });
        return false;
    } else if (correo < 5){
        Swal.fire({
            text: "El correo tinen que ser mas largo",
            icon: "error"
        })
        return false;
    }else if (!expresionParaCorreo.test(correo)){
        Swal.fire({
            text: "El correo esta mal escrito",
            icon: "error"
        })
        return false;
    }else if (contraseña == "") {
        Swal.fire({
            text: "El campo contraseña está vacío",
            icon: "error"
        });
        return false;
    } else if (contraseña.length < 8) {
        Swal.fire({
            text: "El campo contraseña debe tener al menos 8 caracteres",
            icon: "error"
        });
        return false;
    } else if (!expresionParaContra.test(contraseña)) {
        Swal.fire({
            text: "La contraseña debe tener al menos:\n1 mayúscula\n1 minúscula\n1 número",
            icon: "error"
        });
        return false;
    } else if (contraVerificada == "") {
        Swal.fire({
            text: "El campo contraseña verificada está vacío",
            icon: "error"
        });
        return false;
    } else if (contraseña != contraVerificada) {
        Swal.fire({
            text: "Las contraseñas no coinciden",
            icon: "error"
        });
        return false;
    }else if (pregunta == ""){
        Swal.fire({
            text: "El campo pregunta está vacío",
            icon: "error"
        })
        return false;
    }else if (pregunta == ""){
        Swal.fire({
            text: "La pregunta esta vacia",
            icon: "error"
        })
        return false;
    }else if (!expresionParaLetras.test(pregunta)){
        Swal.fire({
            text: "La pregunta solo puede contener letras",
            icon: "error"
        });
        return false;
    }else{
        return true;
    }
    
}
document.getElementById('togglePassword').addEventListener('click', function() {
    var passwordInput = document.getElementById('contraseña');
    var toggleIcon = document.getElementById('togglePassword');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    }
});

document.getElementById('verContra').addEventListener('click', function(){
    var passwordInput = document.getElementById('contraVerificada');
    var toggleIcon = document.getElementById('verContra');

    if(passwordInput.type == 'password'){
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }else{
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    }
});

