<?php
//Archivo de conexxion 
include("../../conexion.php");

//Obtener id de la tabla compra
$idCompra = $_GET['id'];

// Consultar la fila correspondiente en la tabla compra
$consultaCompra = "SELECT * FROM compra WHERE id = $idCompra";
$resultadoCompra = mysqli_query($conn, $consultaCompra);
$datosCompra = mysqli_fetch_assoc($resultadoCompra);


// Insertar los datos en la tabla compraRealizada
$insertarCompraRealizada = "INSERT INTO compraRealizada (nombre, apellido, producto, correo, direccion, fecha, precio, cantidad, total) 
                            VALUES ('{$datosCompra['nombre']}', '{$datosCompra['apellido']}', '{$datosCompra['producto']}', '{$datosCompra['correo']}', '{$datosCompra['direccion']}', '{$datosCompra['fecha']}', {$datosCompra['precio']}, {$datosCompra['cantidad']}, {$datosCompra['total']})";
mysqli_query($conn, $insertarCompraRealizada);


// Eliminar la fila de la tabla compra
$eliminarCompra = "DELETE FROM compra WHERE id = $idCompra";
mysqli_query($conn, $eliminarCompra);

// Redirigir de vuelta a la página anterior
header("Location: datos.php");
exit();
?>