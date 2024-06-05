<?php
// Incluir el archivo de conexión a la base de datos
include("../conexion.php");

// Verificar la conexión a la base de datos
if (!$conn) {
    die("Conexion fallida: " . mysqli_connect_error());
}

if (isset($_POST['registro'])) {
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $consultaTelefonoYCorreo = "SELECT * FROM usuarios WHERE telefono = ? OR correo = ?";
    $stmt = mysqli_prepare($conn, $consultaTelefonoYCorreo);
    mysqli_stmt_bind_param($stmt, "ss", $telefono, $correo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rows = mysqli_stmt_num_rows($stmt);

    if ($rows > 0) {
        // Mensaje de error si el correo o el teléfono ya están en la base de datos
        header("Location: ../../vista/html/login.html?error=Yaesta");
        exit();
    }

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contrasena = $_POST['contrasena'];
    $contrasenaDos = $_POST['contrasenaDos'];
    $respuesta = $_POST['respuesta'];

    $rol_nombre = "cliente";

    $stmt_usuarios = mysqli_prepare($conn, "INSERT INTO usuarios (nombre, apellido, telefono, correo, contrasena, contrasenaDos) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt_usuarios, "ssssss", $nombre, $apellido, $telefono, $correo, $contrasena, $contrasenaDos);
    if (!mysqli_stmt_execute($stmt_usuarios)) {
        echo "Error en el registro";
        exit();
    }

    $usuario_id = mysqli_insert_id($conn);

    $stmt_respuesta = mysqli_prepare($conn, "INSERT INTO respuesta (respuesta, usuario_id) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt_respuesta, "si", $respuesta, $usuario_id);
    if (!mysqli_stmt_execute($stmt_respuesta)) {
        echo "Error en el registro";
        exit();
    }

    $stmt_rol = mysqli_prepare($conn, "INSERT INTO rol (rol, usuario_id) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt_rol, "si", $rol_nombre, $usuario_id);
    if (!mysqli_stmt_execute($stmt_rol)) {
        echo "Error en el registro";
        exit();
    }

    header("Location: ../../vista/html/login.html?bien=Bienvenido");
    exit();
}

mysqli_close($conn);
