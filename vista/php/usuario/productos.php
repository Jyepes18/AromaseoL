<?php
include("../../../modelo/sessiones/verificacion.php");
include("../../../modelo/conexion.php");

// Obtener el correo del usuario desde la sesión
$correo_usuario = $_SESSION["correo"];

// Función para obtener las compras
function obtener_compras($correo, $tabla, $conn)
{
    // Preparar la consulta SQL para obtener todas las compras agrupadas por fecha
    $sql = "SELECT fecha, GROUP_CONCAT(producto SEPARATOR ',<br>') AS productos, GROUP_CONCAT(precio SEPARATOR '<br>') AS precios_unitarios, SUM(cantidad) AS total_cantidad, SUM(total) AS total_general FROM $tabla WHERE correo = ? GROUP BY fecha";
    // Preparar la sentencia
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    // Ejecutar la consulta
    $stmt->execute();
    // Obtener el resultado
    $result = $stmt->get_result();
    return $result;
}

$result = obtener_compras($correo_usuario, 'compra', $conn);
$total_general = 0;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Compra de productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table-container {
            max-width: 1000px;
            margin: 20px auto;
        }

        .table-responsive {
            width: auto;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot td {
            font-weight: bold;
        }

        tfoot tr:last-child td {
            border-top: 2px solid #333;
        }
    </style>
</head>

<body>
    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../../img/index/menu.png" alt="menu" />
            </label>
            <br /><br />
            <nav class="navbar">
                <ul>
                    <li>
                        <a href="indexDos.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Ver todas las compras echas anteriormente" data-bs-toggle="modal" data-bs-target="#mCompras">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-backpack2-fill" viewBox="0 0 16 16">
                                <path d="M5 13h6v-3h-1v.5a.5.5 0 0 1-1 0V10H5z" />
                                <path d="M6 2v.341C3.67 3.165 2 5.388 2 8v1.191l-1.17.585A1.5 1.5 0 0 0 0 11.118V13.5A1.5 1.5 0 0 0 1.5 15h1c.456.607 1.182 1 2 1h7c.818 0 1.544-.393 2-1h1a1.5 1.5 0 0 0 1.5-1.5v-2.382a1.5 1.5 0 0 0-.83-1.342L14 9.191V8a6 6 0 0 0-4-5.659V2a2 2 0 1 0-4 0m2-1a1 1 0 0 1 1 1v.083a6 6 0 0 0-2 0V2a1 1 0 0 1 1-1m0 3a4 4 0 0 1 3.96 3.43.5.5 0 1 1-.99.14 3 3 0 0 0-5.94 0 .5.5 0 1 1-.99-.14A4 4 0 0 1 8 4M4.5 9h7a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5" />
                            </svg>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <img src="../../img/index/logo.png" alt="logo" />
        </div>
    </header>

    <div class="table-container">
        <div class="table-responsive">
            <h1 class="text-center">Compras en proceso</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Fecha de entrega <br> AAAA/MM/DD</th>
                        <th>Productos</th>
                        <th>Precios unitarios</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row["fecha"]) . "</td>";
                            echo "<td>" . htmlspecialchars_decode($row["productos"]) . "</td>";
                            echo "<td>" . htmlspecialchars_decode($row["precios_unitarios"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row["total_cantidad"]) . "</td>";
                            echo "<td>$" . number_format($row["total_general"], 0, '', '.') . "</td>";
                            echo "</tr>";
                            $total_general += $row["total_general"];
                        }
                    } else {
                        echo "<tr><td class='text-danger' colspan='5'>No se encontraron compras.</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align: right;">Total General:</td>
                        <td><?php echo "$" . number_format($total_general, 0, '', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mCompras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Estas son tus compras
                        <?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : "N/A"; ?>
                        <?php echo isset($_SESSION['apellido']) ? htmlspecialchars($_SESSION['apellido']) : "N/A"; ?>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $result = obtener_compras($correo_usuario, 'comprarealizada', $conn);
                    $total_general = 0;
                    ?>
                    <div class="table-container">
                        <div class="table-responsive">
                            <h1 class="text-center">Tus compras en total</h1>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha de entrega <br> AAAA/MM/DD</th>
                                        <th>Productos</th>
                                        <th>Precios unitarios</th>
                                        <th>Total cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr>";
                                            echo "<td>" . htmlspecialchars($row["fecha"]) . "</td>";
                                            echo "<td>" . htmlspecialchars_decode($row["productos"]) . "</td>";
                                            echo "<td>" . htmlspecialchars_decode($row["precios_unitarios"]) . "</td>";
                                            echo "<td>" . htmlspecialchars($row["total_cantidad"]) . "</td>";
                                            echo "<td>$" . number_format($row["total_general"], 0, '', '.') . "</td>";
                                            echo "</tr>";
                                            $total_general += $row["total_general"];
                                        }
                                    } else {
                                        echo "<tr><td class='text-danger' colspan='5'>No se encontraron compras.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" style="text-align: right;">Total General:</td>
                                        <td><?php echo "$" . number_format($total_general, 0, '', '.'); ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <?php
                    if (!empty($_SESSION['carrito'])) : ?>
                        <a href="compraC.php?aviso=Compra" class="btn btn-secondary">Proceder al pago</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
<?php
$conn->close();
?>