function validar() {
    var usuario, contraseña;
    usuario = document.getElementById("usuario").value;
    contraseña = document.getElementById("contraseña").value;

    if (usuario == "" || contraseña == "") {
        Swal.fire({
            title: "Error",
            text: "Debe llenar todos los campos",
            icon: "error",
            confirmButtonText: "Aceptar"
        });
        return false;
    } else {
        return true;
    }


}
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

