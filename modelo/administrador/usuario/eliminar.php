<?php
// Archivo de conexión
include("../../conexion.php");

// Obtener ID de datos.php y sanitizar la entrada
$id = $_GET['id'];

// Preparar y ejecutar consultas de eliminación
$eliminar_respuestas = $conn->prepare("DELETE FROM respuesta WHERE usuario_id = ?");
$eliminar_rol = $conn->prepare("DELETE FROM rol WHERE usuario_id = ?");
$eliminar_usuario = $conn->prepare("DELETE FROM usuarios WHERE id = ?");

$eliminar_respuestas->bind_param("i", $id);
$eliminar_rol->bind_param("i", $id);
$eliminar_usuario->bind_param("i", $id);

if ($eliminar_respuestas->execute() && $eliminar_rol->execute() && $eliminar_usuario->execute()) {
    header("location: datos.php");
    exit();
} else {
    echo "Error al eliminar los datos: " . $conn->error;
}

// Cerrar declaraciones y conexión
$eliminar_respuestas->close();
$eliminar_rol->close();
$eliminar_usuario->close();
$conn->close();
?>
