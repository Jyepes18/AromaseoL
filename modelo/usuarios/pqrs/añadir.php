<?php
// Incluir el archivo de conexión a la base de datos
include("../../conexion.php");

// Verificar si se ha enviado un archivo de imagen
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $imagen_nombre = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $imagen_ruta = "../../../../imagnes".$imagen_nombre; // Ruta donde se guardará la imagen en el servidor

    // Mover la imagen al directorio de destino
    if(move_uploaded_file($imagen_temp, $imagen_ruta)) {
        // La imagen se movió correctamente, ahora puedes guardar la ruta en la base de datos
        $query = "INSERT INTO pqrs (nombre, apellido, correo, correoDos, direccion, fecha, hora, imagen, descripcion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $conn->prepare($query);
        $statement->bind_param("sssssssss", $nombre, $apellido, $correo, $correoDos, $direccion, $fecha, $hora, $imagen_ruta, $descripcion);
        
        // Asignar valores a las variables (reemplaza estas con las variables que recibes del formulario)
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['usuario'];
        $correoDos = $_POST['correoDos'];
        $direccion = $_POST['direccion'];
        $fecha = $_POST['dia'];
        $hora = $_POST['hora'];
        $descripcion = $_POST['descripcion'];

        // Ejecutar la consulta
        if($statement->execute()) {
            // La inserción fue exitosa
            header("Location: ../../../vista/php/usuario/indexDos.php");
        } else {
            // Hubo un error al ejecutar la consulta
            echo "Error al enviar la PQRS";
        }
    } else {
        // Hubo un error al mover la imagen
        echo "Error al subir la imagen";
    }
} else {
    // No se recibió ningún archivo de imagen o hubo un error al subirlo
    if(isset($_FILES['imagen'])) {
        echo "Error al subir la imagen: " . $_FILES['imagen']['error'];
    } else {
        echo "No se ha seleccionado ninguna imagen";
    }
}
?>