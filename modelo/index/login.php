<?php
// Iniciar sesión
session_start();

// Incluir el archivo de conexión a la base de datos
include("../conexion.php");

// Verificar si el formulario de inicio de sesión ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Consultar la base de datos para verificar las credenciales del usuario
    $stmt = $conn->prepare("SELECT u.id, u.nombre, u.apellido, u.correo, r.rol, res.respuesta
                            FROM usuarios u 
                            INNER JOIN rol r ON u.id = r.usuario_id 
                            LEFT JOIN respuesta res ON u.id = res.usuario_id
                            WHERE u.correo = ? AND u.contrasena = ?");

    $stmt->bind_param("ss", $correo, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Si las credenciales son válidas, iniciar sesión y redirigir según el rol
        $row = $result->fetch_assoc();
        $_SESSION["id"] = $row["id"];
        $_SESSION["nombre"] = $row["nombre"];
        $_SESSION["apellido"] = $row["apellido"];
        $_SESSION["correo"] = $row["correo"];
        $_SESSION["rol"] = $row["rol"];
        $_SESSION["respuesta"] = $row["respuesta"]; 
        
        if ($row["rol"] == "administrador") {
            header("Location: ../../vista/php/administrador/administrador.php");
        } elseif ($row["rol"] == "cliente") {
            header("Location: ../../vista/php/usuario/indexDos.php");
        }
        exit();
    } else {
        // Si las credenciales son incorrectas, 
        header("Location: ../../vista/html/login.html?note=Encontramo");
        exit();
    }
}
?>
