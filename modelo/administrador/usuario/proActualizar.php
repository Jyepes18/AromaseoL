<?php
// Incluir archivo de conexion
include("../../conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$rol = $_POST['rol'];

//Actualizar datos 
$actualizar = "UPDATE usuarios u
                LEFT JOIN rol r ON u.id = r.usuario_id
                SET 
                u.nombre = '$nombre',
                u.apellido = '$apellido',
                u.telefono = '$telefono',
                u.correo = '$correo',
                r.rol = '$rol'
                 WHERE u.id = '$id'";

if(mysqli_query($conn, $actualizar)){
    header("location: datos.php?bien=Actualizado");
    exit();
}else{
    echo "Error al actualizar los datos: " . mysqli_error($conn);
}

mysqli_close($conn);

?>
