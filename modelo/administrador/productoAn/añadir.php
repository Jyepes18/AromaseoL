<?php
// Conexión a la base de datos
include("../../conexion.php");

// Verificar la conexión
if (!$conn) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

// Verificamos si se ha cargado una imagen
if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    // Ruta donde se guardará la imagen en el servidor
    $directorio_destino = '../../../../imagnes';
    
    // Creamos el directorio si no existe
    if (!file_exists($directorio_destino)) {
        mkdir($directorio_destino, 0777, true);
    }
    
    // Generamos un nombre único para la imagen
    $nombre_imagen = uniqid('imagen_') . '_' . $_FILES['imagen']['name'];
    
    // Movemos la imagen al directorio destino
    if(move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio_destino . $nombre_imagen)) {
        // La imagen se ha subido correctamente, ahora podemos guardar la ruta en la base de datos
        $imagen = $directorio_destino . $nombre_imagen;
    } else {
        // Ocurrió un error al mover la imagen
        echo "Error al subir la imagen.";
        exit;
    }
} else {
    // No se ha cargado ninguna imagen, puedes manejar este caso según tus necesidades
    // Por ejemplo, podrías asignar una imagen por defecto
    $imagen = 'ruta/a/imagen/por/defecto.jpg';
}

// Datos del formulario
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$cantidad = $_POST['cantidad'];
$precio = $_POST['precio'];

// Preparar la consulta SQLs
$stmt_productos = mysqli_prepare($conn, "INSERT INTO productosanimales (imagen, titulo, descripcion, cantidad, precio ) VALUES (?, ?, ?, ?, ?)");

// Vincular parámetros
mysqli_stmt_bind_param($stmt_productos, "sssss", $imagen, $titulo, $descripcion, $cantidad, $precio);

// Ejecutar la consulta
if(mysqli_stmt_execute($stmt_productos)) {
    header("location: ../../../vista/php/administrador/proAnimales.php");
} else {
    echo "Error al añadir el producto: " . mysqli_error($conn);
}

// Cerrar la declaración
mysqli_stmt_close($stmt_productos);

// Cerrar la conexión
mysqli_close($conn);
?>
