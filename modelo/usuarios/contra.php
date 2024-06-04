<?php
include("../conexion.php");

if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}

if (isset($_POST['cambiar'])){

    //Recibir datos del formulario
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $respuesta = mysqli_real_escape_string($conn, $_POST['respuesta']);

    //Consulta sql
    $stmt = $conn->prepare("SELECT * FROM usuarios INNER JOIN respuesta ON usuarios.id = respuesta.usuario_id WHERE usuarios.correo = ? AND respuesta.respuesta = ?");
    
    // Cambiar el orden de los parámetros de bind_param y pasar las variables por referencia
    $stmt->bind_param("ss", $correo, $respuesta);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $contrasena = mysqli_real_escape_string($conn, $_POST['contrasena']);
        $contrasenaDos = mysqli_real_escape_string($conn, $_POST['contrasenaDos']);
        
        // Actualizar la contraseña si la consulta devuelve filas
        $stmtUpdate = $conn->prepare("UPDATE usuarios SET contrasena = ?, contrasenaDos = ?  WHERE correo = ?");
        $stmtUpdate->bind_param("sss", $contrasena, $contrasenaDos, $correo);
        $stmtUpdate->execute();

        if ($stmtUpdate->affected_rows > 0) {
            header("location: ../../vista/php/usuario/indexDos.php?bien=exitoso");
        } else {
            header("location: ../../vista/php/usuario/indexDos.php?error=Nofun");
        }
        
        // Cerrar la declaración de actualización
        $stmtUpdate->close();

    } else {
        header("location: ../../vista/php/usuario/contra.php?error=Yaesta");
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
