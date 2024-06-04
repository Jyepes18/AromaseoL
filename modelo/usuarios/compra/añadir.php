<?php
include("../../conexion.php");

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['solicitar'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $producto = htmlspecialchars($_POST['producto']);
    $correo = htmlspecialchars($_POST['correo']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $fecha = $_POST['fecha']; // Formato AAAA-MM-DD

    // Validar que la fecha tenga el formato esperado
    if (!DateTime::createFromFormat('Y-m-d', $fecha)) {
        die("Formato de fecha no válido: " . htmlspecialchars($fecha));
    }

    // Verificar si la cantidad del producto es mayor que cero
    $verificar_stmt = $conn->prepare("SELECT cantidad FROM productosanimales WHERE titulo = ?");
    if ($verificar_stmt === false) {
        die("Error al preparar la consulta de verificación: " . $conn->error);
    }
    $verificar_stmt->bind_param("s", $producto);

    if (!$verificar_stmt->execute()) {
        die("Error al ejecutar la consulta de verificación: " . $verificar_stmt->error);
    }

    $verificar_result = $verificar_stmt->get_result();
    $row = $verificar_result->fetch_assoc();
    $cantidad_disponible = $row['cantidad'];

    // Si la cantidad es mayor que cero, proceder con la compra
    if ($cantidad_disponible > 0) {
        $precio = (float)$_POST['precio'];
        $cantidad = (int)$_POST['cantidad'];
        $total = (float)$_POST['total'];

        // Calcular el tipo de domicilio basado en el total
        $domicilio = $total >= 100000 ? "Domicilio gratis" : "Domicilio pagado";

        // Insertar datos en la tabla compra
        $stmt = $conn->prepare("INSERT INTO compra (nombre, apellido, producto, correo, direccion, fecha, precio, cantidad, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error al preparar la consulta: " . $conn->error);
        }
        $stmt->bind_param("ssssssdis", $nombre, $apellido, $producto, $correo, $direccion, $fecha, $precio, $cantidad, $total);

        if (!$stmt->execute()) {
            die("Error en el registro: " . $stmt->error);
        }

        // Actualizar la cantidad en la tabla productosanimales
        $update_stmt = $conn->prepare("UPDATE productosanimales SET cantidad = cantidad - ? WHERE titulo = ?");
        if ($update_stmt === false) {
            die("Error al preparar la consulta de actualización: " . $conn->error);
        }
        $update_stmt->bind_param("is", $cantidad, $producto);

        if (!$update_stmt->execute()) {
            die("Error al actualizar la cantidad: " . $update_stmt->error);
        }

        // Redireccionar al usuario después de la compra
        header("Location: ../../../vista/php/usuario/indexDos.php");
        exit();
    } else {
        // Si la cantidad es cero, mostrar una alerta
        header("Location: ../../../vista/php/usuario/indexDos.php?aviso=ErrorCompra");

    }
}
?>
