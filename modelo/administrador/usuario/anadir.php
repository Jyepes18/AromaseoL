<?php
// Archivo de conexión
include("../../conexion.php");

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['registrar'])) {
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    // Ver si teléfono y correo ya existen
    $consultaTelefonoYCorreo = "SELECT * FROM usuarios WHERE telefono = ? OR correo = ?";
    $stmt = mysqli_prepare($conn, $consultaTelefonoYCorreo);
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "ss", $telefono, $correo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $rows = mysqli_stmt_num_rows($stmt);

    if ($rows > 0) {
        // Redireccionar al dashboard donde lanza mensaje que ya existe el usuario
        header("Location: ../../../vista/php/administrador/usuario.php?error=Yaesta");
        exit();
    }

    // Liberar el statement
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $contrasena = $_POST['contrasena'];
    $contrasenaDos = $contrasena;
    $respuesta = $_POST['respuesta'];
    $rol = $_POST['rol'];

    // Insertar datos en la tabla "usuarios"
    $stmt_usuarios = mysqli_prepare($conn, "INSERT INTO usuarios (nombre, apellido, telefono, correo, contrasena, contrasenaDos) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt_usuarios === false) {
        die("Error en la preparación de la consulta: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt_usuarios, "ssssss", $nombre, $apellido, $telefono, $correo, $contrasena, $contrasenaDos);
    if (!mysqli_stmt_execute($stmt_usuarios)) {
        header("Location: ../../../vista/php/adminitrados/usuario.php?hola=Mundo");
        exit();
    }

    // Obtener id del usuario insertado
    $usuario_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt_usuarios);

    // Insertar respuesta en la tabla respuesta
    $stmt_respuesta = mysqli_prepare($conn, "INSERT INTO respuesta (respuesta, usuario_id) VALUES (?, ?)");
    if ($stmt_respuesta === false) {
        die("Error en la preparación de la consulta: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt_respuesta, "si", $respuesta, $usuario_id);
    if (!mysqli_stmt_execute($stmt_respuesta)) {
        header("Location: ../../../vista/html/paginaError.html");
        exit();
    }
    mysqli_stmt_close($stmt_respuesta);

    // Insertar rol del usuario
    $stmt_rol = mysqli_prepare($conn, "INSERT INTO rol (rol, usuario_id) VALUES (?, ?)");
    if ($stmt_rol === false) {
        die("Error en la preparación de la consulta: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt_rol, "si", $rol, $usuario_id);
    if (!mysqli_stmt_execute($stmt_rol)) {
        header("Location: ../../../vista/html/paginaError.html");
        exit();
    }
    mysqli_stmt_close($stmt_rol);

    // Si todo sale bien redirigir al dashboard con un mensaje
    header("Location: ../../../vista/php/administrador/usuario.php?bien=Bienvenido");
    exit();
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
