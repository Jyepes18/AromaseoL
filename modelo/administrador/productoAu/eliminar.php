<?php
// Archivo de conexión
include("../../conexion.php");

// Obtener ID de datos.php de forma segura
$id = $_GET['id'];

// Preparar y ejecutar la consulta de eliminación de forma segura
if ($stmt = mysqli_prepare($conn, "DELETE FROM productosautos WHERE id = ?")) {
    // Enlazar el parámetro (el tipo "i" indica que se trata de un entero)
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Ejecutar la consulta
    if (mysqli_stmt_execute($stmt)) {
        header("location: datos.php");
        exit();
    } else {
        echo "Error al eliminar los datos: " . mysqli_stmt_error($stmt);
    }

    // Cerrar la declaración preparada
    mysqli_stmt_close($stmt);
} else {
    echo "Error en la preparación de la consulta: " . mysqli_error($conn);
}

// Cerrar conexión
mysqli_close($conn);
?>
