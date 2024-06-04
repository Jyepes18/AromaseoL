function validar(){
    var correo, respuesta, contrasena, contrasenaVerificada;

    correo = document.getElementById('correo').value;
    respuesta = document.getElementById('respuesta').value;
    contrasena = document.getElementById('contrasena').value;
    contrasenaVerificada = document.getElementById('contrasenaVerificada').value;

    expresionParaLetras = /^[a-zA-Z]+$/;
    expresionParaContra = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    expresionParaCorreo = /^[\w-]+(\.[\w-]+)*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})$/;

    if (correo == "" || respuesta == "" || contrasena == "" || contrasenaVerificada == ""){
        Swal.fire({
            icon: "error",
            text: "Todos los campos son requeridos"
        });
        return false;
    } else if (!expresionParaCorreo.test(correo)){
        Swal.fire({
            icon: "error",
            text: "El formato del correo es incorrecto. Ejemplo: ABC@gmail.com"
        });
        return false;
    } else if (!expresionParaLetras.test(respuesta)){
        Swal.fire({
            icon: "error",
            text: "El campo respuesta solo debe contener letras"
        });
        return false;
    } else if (contrasena.length < 8){
        Swal.fire({
            icon: "error",
            text: "La contraseña debe tener al menos 8 caracteres"
        });
        return false;
    } else if (!expresionParaContra.test(contrasena)){
        Swal.fire({
            icon: "error",
            text: "La contraseña debe contener al menos una letra mayúscula, una letra minúscula, un dígito y tener una longitud mínima de 8 caracteres"
        });
        return false;
    } else if (!expresionParaContra.test(contrasenaVerificada)){
        Swal.fire({
            icon: "error",
            text: "La contraseña verificada debe contener al menos una letra mayúscula, una letra minúscula, un dígito y tener una longitud mínima de 8 caracteres"
        });
        return false;
    } else if (contrasena != contrasenaVerificada){
        Swal.fire({
            icon: "error",
            text: "Las contraseñas deben ser iguales"
        });
        return false;
    } else {
        return true;
    }
}

document.getElementById('togglePassword').addEventListener('click', function() {
    var passwordInput = document.getElementById('contrasena');
    var toggleIcon = document.getElementById('togglePassword');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/></svg>';
    } else {
        passwordInput.type = 'password';
        toggleIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/></svg>';
    }
});

document.getElementById('verContra').addEventListener('click', function(){
    var passwordInput = document.getElementById('contrasenaVerificada');
    var toggleIcon = document.getElementById('verContra');

    if(passwordInput.type == 'password'){
        passwordInput.type = 'text';
        toggleIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/></svg>';
    }else{
        passwordInput.type = 'password';
        toggleIcon.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/><path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/></svg>';
    }
});
