function validar(){
    var imagen, titulo, descripcion, precio;

    imagen = document.getElementById('imagen').files[0];
    titulo = document.getElementById('titulo').value;
    descripcion = document.getElementById('descripcion').value;
    precio = document.getElementById('precio').value;

    ExpresionRegularNumerosLetras = /^[a-zA-Z0-9 ]+$/;
    ExpreRxNumeros = /^\d+$/; 

    if(imagen == "" || titulo == "" || descripcion ==  "" || precio == ""){
        Swal.fire({
            icon: "error",
            title: "error",
            text: "Todos los campos son obligatorios"
        })
        return false;
    }else if(!ExpresionRegularNuemrosLetras.test(titulo)){
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El titulo solo acepta letras y números"
        })
        return false;
    }else if(!ExpresionRegularNuemrosLetras.test(descripcion)){
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "La decripcion solo acepta letras y números"
        })
        return false;
    }
    else if(!ExpreRxNumeros.test(precio)){
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "El precio solo acepta números"
        })
        return false;
    }
}