<?php
// Incluir archivo de conexión
include("../../conexion.php");
// Verificar si la sesión está iniciada
include("../../sessiones/verificacion.php");

// Datos del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

// Verificar si se ha cargado una nueva imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Ruta donde se guardará la imagen en el servidor
    $directorio_destino = '../../../../imagenes/';

    // Crear el directorio si no existe
    if (!file_exists($directorio_destino)) {
        mkdir($directorio_destino, 0777, true);
    }

    // Generar un nombre único para la imagen
    $nombre_imagen = uniqid('imagen_') . '_' . basename($_FILES['imagen']['name']);

    // Mover la imagen al directorio destino
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio_destino . $nombre_imagen)) {
        // La imagen se ha subido correctamente, ahora podemos guardar la ruta en la base de datos
        $imagen = $directorio_destino . $nombre_imagen;
    } else {
        // Ocurrió un error al mover la imagen
        echo "Error al subir la imagen.";
        exit;
    }
} else {
    // No se ha cargado una nueva imagen, usar la imagen actual
    $imagen = $_POST['imagen_actual'];
}

// Preparar la consulta SQL
$actualizar = "UPDATE productoshogar SET imagen = ?, titulo = ?, descripcion = ?, cantidad = ?,  precio = ? WHERE id = ?";

// Preparar la declaración
if ($stmt = mysqli_prepare($conn, $actualizar)) {
    // Enlazar los parámetros
    mysqli_stmt_bind_param($stmt, "sssssi", $imagen, $titulo, $descripcion, $cantidad, $precio, $id);

    // Ejecutar la declaración
    if (mysqli_stmt_execute($stmt)) {
        header("location: datos.php?bien=Actualizado");
        exit();
    } else {
        echo "Error al actualizar los datos: " . mysqli_stmt_error($stmt);
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);
} else {
    echo "Error al preparar la consulta: " . mysqli_error($conn);
}

// Cerrar la conexión
mysqli_close($conn);
?>
