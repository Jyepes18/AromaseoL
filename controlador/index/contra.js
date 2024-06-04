function validar(){

}

document.getElementById('verificar').addEventListener('click', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe automáticamente
    document.getElementById('extra-campos').style.display = 'block';
    document.getElementById('cambiar').style.display = 'block';
    this.style.display = 'none';
});

document.getElementById('verContra').addEventListener('click', function () {
    var passwordInput = document.getElementById('contraseña');
    var toggleIcon = document.getElementById('verContra');

    if (passwordInput.type == 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    }
});
