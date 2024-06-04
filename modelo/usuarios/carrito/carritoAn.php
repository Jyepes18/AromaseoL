<?php
include("../../conexion.php");
include("../../sessiones/verificacion.php");

if (isset($_POST['agregar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Verifica la cantidad en la base de datos
    $query = "SELECT cantidad FROM productosanimales WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $producto = $result->fetch_assoc();

    if ($producto) {
        if ($producto['cantidad'] < $cantidad) {
            // Redirige de nuevo a la página de productos con un mensaje de error
            $_SESSION['mensaje_error'] = "No hay suficiente cantidad del producto.";
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            // Actualiza la cantidad en la base de datos
            $nuevaCantidad = $producto['cantidad'] - $cantidad;
            $updateQuery = "UPDATE productosanimales SET cantidad = ? WHERE id = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("ii", $nuevaCantidad, $id);
            $updateStmt->execute();

            // Verifica si el carrito existe en la sesión
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = array();
            }

            // Verifica si el producto ya está en el carrito
            $encontrado = false;
            foreach ($_SESSION['carrito'] as &$item) {
                if ($item['id'] == $id) {
                    $item['cantidad'] += $cantidad;
                    $encontrado = true;
                    break;
                }
            }

            // Si el producto no está en el carrito, agrégalo
            if (!$encontrado) {
                $_SESSION['carrito'][] = array(
                    'id' => $id,
                    'nombre' => $nombre,
                    'precio' => $precio,
                    'cantidad' => $cantidad
                );
            }

            // Redirige de nuevo a la página de productos
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        }
    } else {
        // Redirige de nuevo a la página de productos con un mensaje de error
        $_SESSION['mensaje_error'] = "Producto no encontrado.";
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

// Código para eliminar un producto del carrito
if (isset($_GET['eliminar'])) {
    $index = $_GET['eliminar'];
    if (isset($_SESSION['carrito'][$index])) {
        $cantidadDevuelta = $_SESSION['carrito'][$index]['cantidad'];
        $id = $_SESSION['carrito'][$index]['id'];

        // Elimina el producto del carrito
        unset($_SESSION['carrito'][$index]);
        // Reindexa el array para evitar problemas
        $_SESSION['carrito'] = array_values($_SESSION['carrito']);

        // Actualiza la cantidad en la base de datos
        $query = "UPDATE productosanimales SET cantidad = cantidad + ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $cantidadDevuelta, $id);
        $stmt->execute();
    }
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
