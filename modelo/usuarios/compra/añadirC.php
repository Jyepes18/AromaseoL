<?php
include("../../conexion.php");
include("../../sessiones/verificacion.php");

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if (isset($_POST['solicitar'])) {
    // Validar y limpiar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $correo = htmlspecialchars($_POST['correo']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $fecha = $_POST['fecha']; // Formato AAAA-MM-DD

    // Validar que la fecha tenga el formato esperado
    $fecha_valida = DateTime::createFromFormat('Y-m-d', $fecha);
    if (!$fecha_valida) {
        die("Formato de fecha no válido: " . htmlspecialchars($fecha));
    }

    // Convertir datos numéricos a los tipos correctos
    $total = (float)$_POST['total'];

    // Calcular el tipo de domicilio basado en el total
    $domicilio = ($total >= 100000) ? "Domicilio gratis" : "Domicilio pagado";

    // Insertar datos en la tabla compra para cada producto en el carrito
    foreach ($_SESSION['carrito'] as $index => $item) {
        $producto = htmlspecialchars($item['nombre']);
        $precio = (float)$item['precio'];
        $cantidad = (int)$_POST['cantidad_' . $item['id']]; // Corregido para obtener la cantidad del formulario

        // Insertar datos en la tabla compra
        $sql_compra = "INSERT INTO compra (nombre, apellido, producto, correo, direccion, fecha, precio, cantidad, total) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_compra = $conn->prepare($sql_compra);
        if (!$stmt_compra) {
            die("Error al preparar la consulta de compra: " . $conn->error);
        }

        $stmt_compra->bind_param("ssssssddd", $nombre, $apellido, $producto, $correo, $direccion, $fecha, $precio, $cantidad, $total);

        if (!$stmt_compra->execute()) {
            die("Error en el registro de compra: " . $stmt_compra->error);
        }
    }

    // Redireccionar después de la inserción
    header("Location: ../../../vista/php/usuario/indexDos.php");
    exit();
}
?>
