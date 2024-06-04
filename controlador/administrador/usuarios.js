function validar() {
    var nombre, apellido, telefono, correo, contrasena;

    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    telefono = document.getElementById("telefono").value;
    correo = document.getElementById("correo").value;
    contrasena = document.getElementById("contrasena").value;

    var expresionParaLetras = /^[a-zA-Z]+$/;
    var expresionParaNumeros = /^[0-9]+$/;
    var expresionParaContra = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    var expresionParaCorreo = /^[\w-]+(\.[\w-]+)*@[A-Za-z0-9]+(\.[A-Za-z0-9]+)*(\.[A-Za-z]{2,})$/;

    if (nombre === "" || apellido === "" || telefono === "" || correo === "" || contrasena === "") {
        Swal.fire({
            icon: "error",
            title: "Ooops",
            text: "Debes llenar todos los campos",
            confirmButtonColor: "#4CB2F8",
        });
        return false;
    } else if (nombre.length < 2) {
        Swal.fire({
            icon: "error",
            title: "Ooops",
            text: "El nombre debe ser mayor a 2 caracteres",
            confirmButtonColor: "#4CB2F8",
        });
        return false;
    } else if (!expresionParaLetras.test(nombre)) {
        Swal.fire({
            icon: "error",
            title: "Ooops",
            text: "El nombre solo acepta letras",
            confirmButtonColor: "#4CB2F8",
        });
        return false;
    } else if (!expresionParaLetras.test(apellido)) {
        Swal.fire({
            icon: "error",
            title: "Ooops",
            text: "El apellido solo acepta letras",
            confirmButtonColor: "#4CB2F8",
        });
        return false;
    } else if (!expresionParaNumeros.test(telefono)) {
        Swal.fire({
            icon: "error",
            title: "Ooops",
            text: "El teléfono solo acepta números",
            confirmButtonColor: "#4CB2F8",
        });
        return false;
    } else if (!expresionParaCorreo.test(correo)) {
        Swal.fire({
            icon: "error",
            title: "Ooops",
            text: "El correo no es válido",
            confirmButtonColor: "#4CB2F8",
        });
        return false;
    } else if (!expresionParaContra.test(contrasena)) {
        Swal.fire({
            icon: "error",
            title: "Ooops",
            text: "La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número",
            confirmButtonColor: "#4CB2F8",
        });
        return false;
    }else{
        return true; 
    }


}
