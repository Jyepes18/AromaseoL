<?php
// Incluir archivo de conexión
include("../../conexion.php");
// Verificar si la sesión está iniciada
include("../../sessiones/verificacion.php");

// Traer el ID del producto
$id = $_GET['id'];
$consulta = "SELECT * FROM pqrs WHERE id = ?";
$stmt = mysqli_prepare($conn, $consulta);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($resultado);
mysqli_stmt_close($stmt);

if (!$row) {
    echo "Producto no encontrado.";
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../../vista/css/formularios.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../../../vista/img/index/lg.png" />
    <title>Compra de productos</title>
</head>

<body>
    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../../../vista/img/index/menu.png" alt="menu" />
            </label>
            <br /><br />
            <nav class="navbar">
                <ul>
                    <li>
                        <a href="datos.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <img src="../../../vista/img/index/logo.png" alt="logo" />
        </div>
    </header>

    <div class="d-flex justify-content-center">
        <div class="form">
            <form id="miFormulario" action="../compra/añadir.php" onsubmit="return validar();" method="POST" enctype="multipart/form-data">
                <h1 class="form_title">Quejas y Reclamos</h1>

                <div class="form-floating mb-3">
                    <input type="text" readonly class="form-control" id="nombre" name="nombre" placeholder="Nombre" autocomplete="name" value="<?php echo htmlspecialchars($row['nombre']); ?>" />
                    <label for="nombre">Nombre</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" readonly class="form-control" id="apellido" name="apellido" placeholder="Apellido" autocomplete="name" value="<?php echo htmlspecialchars($row['apellido']); ?>" />
                    <label for="apellido">Apellido</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" readonly class="form-control" id="usuario" name="usuario" placeholder="Correo" autocomplete="email" value="<?php echo htmlspecialchars($row['correo']); ?>" />
                    <label for="usuario">Correo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="dia" name="dia" placeholder="Día" autocomplete="address-level1" value="<?php echo htmlspecialchars($row['fecha']); ?>" />
                    <label for="dia">Día de reclamo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="time" class="form-control" id="hora" name="hora" placeholder="Hora" autocomplete="name" value="<?php echo htmlspecialchars($row['hora']); ?>" />
                    <label for="hora">Hora del reclamo</label>
                </div>

                <div class="col-md-6 text-center">
                    <label for="imagen" class="form-label">Imagen</label>
                    <div class="d-flex justify-content-center">
                        <?php
                        // Asumiendo que $row["imagen"] contiene la ruta completa o el nombre del archivo de la imagen.
                        $rutaImagen = $row["imagen"];
                        if ($rutaImagen) {
                            echo '<img src="' . htmlspecialchars($rutaImagen) . '" alt="Imagen" width="150" height="150" />';
                        } else {
                            echo '<p>No hay imagen disponible</p>';
                        }
                        ?>
                    </div>
                    <input type="hidden" name="imagen_actual" value="<?php echo htmlspecialchars($rutaImagen); ?>">
                </div>

                <br>

                <div class="form-floating mb-3">
                    <textarea class="form-control" id="asunto" name="asunto" readonly placeholder="Descripción de PQRS"><?php echo htmlspecialchars($row['descripcion']); ?></textarea>
                    <label for="asunto">Queja del cliente</label>
                </div>



                <div class="form-floating mb-3">
                    <textarea class="form-control" id="asunto" name="asunto" placeholder="Descripción de PQRS"></textarea>
                    <label for="descripcion">Asunto</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de PQRS"></textarea>
                    <label for="descripcion">respuesta</label>
                </div>

                <div class="d-grid gap-2 col-12 mx-auto mb-3">
                    <button class="btn btn-primary" name="enviar" id="enviarBtn" type="submit">Enviar</button>
                </div>
            </form>

        </div>
    </div>

    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../controlador/usuario/pqrs.js"></script>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>