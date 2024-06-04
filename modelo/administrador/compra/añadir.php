<?php
include("../../conexion.php");

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['registrar'])) {
    // Recoger y validar datos
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $apellido = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
    $producto = isset($_POST['producto']) ? $_POST['producto'] : [];
    $correo = isset($_POST['email']) ? trim($_POST['email']) : ''; // Cambiar 'correo' a 'email'
    $direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : '';
    $fecha = isset($_POST['fecha']) ? trim($_POST['fecha']) : '';
    $precio = isset($_POST['precio']) ? $_POST['precio'] : [];
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : [];
    $total = isset($_POST['total']) ? $_POST['total'] : [];

    // Validar datos básicos
    if (empty($nombre) || empty($apellido) || empty($correo) || empty($direccion) || empty($fecha)) {
        die("Por favor, complete todos los campos requeridos.");
    }

    // Validar correo electrónico
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("Correo electrónico inválido.");
    }

    // Validar arrays de productos, precios, cantidades y totales
    if (count($producto) !== count($precio) || count($precio) !== count($cantidad) || count($cantidad) !== count($total)) {
        die("Datos de productos no coinciden.");
    }

    // Preparar consulta
    $stmt = mysqli_prepare($conn, "INSERT INTO compra (nombre, apellido, producto, correo, direccion, fecha, precio, cantidad, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . mysqli_error($conn));
    }

    // Ejecutar la inserción para cada producto
    foreach ($producto as $index => $prod) {
        $precio_ind = $precio[$index];
        $cantidad_ind = $cantidad[$index];
        $total_ind = $total[$index];

        mysqli_stmt_bind_param($stmt, "sssssssss", $nombre, $apellido, $prod, $correo, $direccion, $fecha, $precio_ind, $cantidad_ind, $total_ind);
        if (!mysqli_stmt_execute($stmt)) {
            die("Error al insertar los datos: " . mysqli_stmt_error($stmt));
        }
    }

    // Cerrar la declaración
    mysqli_stmt_close($stmt);

    // Redirigir después de la inserción exitosa
    header("Location: ../../../vista/php/administrador/vender.php");
    exit();
}

// Cerrar la conexión
mysqli_close($conn);
?>
