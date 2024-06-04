<?php
// Incluir archivo de conexión
include("../../conexion.php");
// Verificar si la sesión está iniciada
include("../../sessiones/verificacion.php");

// Traer el ID del producto
$id = $_GET['id'];
$consulta = "SELECT * FROM productoshogar WHERE id = ?";
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../vista/css/adminis.css">
    <link rel="shortcut icon" href="../../../vista/img/index/lg.png" />
</head>

<body>
    <div class="sidebar close">
        <!--Logo-->
        <a href="#" class="logo-box">
            <i class='bx bxs-user-circle'></i>
            <div class="logo-name">
                <p>Hola
                    <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'N/A'; ?>
                </p>
            </div>
        </a>

        <!--Lista-->
        <ul class="sidebar-list">
            <li>
                <div class="title">
                    <a href="../../../vista/php/administrador/administrador.php" class="link">
                        <i class='bx bxs-grid-alt'></i>
                        <span class="name">Dashboard</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/administrador.php" class="link submenu-title">Dashboard</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../vista/php/administrador/usuario.php" class="link">
                        <i class='bx bx-user'></i>
                        <span class="name">Usuarios</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/usuario.php" class="link submenu-title">Usuarios</a>
                    <a href="../usuario/datos.php" class="link">Ver Datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../vista/php/administrador/proAnimales.php" class="link">
                        <i class='bx bxs-dog'></i>
                        <span class="name">Productos Animales</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/proAnimales.php" class="link submenu-title">Productos Animales</a>
                    <a href="../productoAn/datos.php" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../vista/php/administrador/proAutos.php" class="link">
                        <i class='bx bxs-car'></i>
                        <span class="name">Productos Automoviles</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/proAutos.php" class="link submenu-title">Productos Automoviles</a>
                    <a href="../productoAu/datos.php" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../vista/php/administrador/prohogar.php" class="link">
                        <i class='bx bxs-home-heart'></i>
                        <span class="name">Productos Hogar</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/prohogar.php" class="link submenu-title">Productos Hogar</a>
                    <a href="datos.php" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../pqrs/datos.php" class="link">
                        <i class='bx bxs-comment-error bx-flip-horizontal'></i>
                        <span class="name">PQRS</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="../pqrs/datos.php" class="link submenu-title">PQRS</a>

                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../modelo/sessiones/cerrar.php" class="link">
                        <i class='bx bxs-exit bx-rotate-180'></i>
                        <span class="name">Salir</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="../../../modelo/sessiones/cerrar.php" class="link submenu-title">Salir</a>

                </div>
            </li>
        </ul>
    </div>

    <!--Home section-->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text"></div>
        </div>

        <div class="main-content">
            <div class="container">
                <div class="container-fluid">
                    <form action="proActualizar.php" method="post" enctype="multipart/form-data" class="row g-3 mt-4">
                        <h1 class="h1 text-center mx-auto mt-3">Actualizar Producto</h1>
                        <input hidden type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>">

                        <div class="col-md-6">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*" onchange="previewImage(event)">
                            <input type="hidden" name="imagen_actual" value="<?php echo $row['imagen']; ?>">
                            <?php if (!empty($row['imagen'])) : ?>
                                <div style="display: flex; align-items: center; justify-content: center; background-color: #f2f2f2; padding: 20px; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    <div style="text-align: center; margin-right: 20px;">
                                        <p style="font-size: 14px; color: #666; margin-bottom: 5px;">Imagen actual</p>
                                        <img src="<?php echo htmlspecialchars($row['imagen']); ?>" alt="Imagen actual" width="100">
                                    </div>
                                    <span style="font-size: 24px; color: #666; margin: 0 20px;"> -> </span>
                                    <div style="text-align: center; margin-left: 20px;">
                                        <p style="font-size: 14px; color: #666; margin-bottom: 5px;">Imagen nueva</p>
                                        <img id="imagen-nueva-preview" alt="Nueva imagen" width="100" style="display: none;">
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>

                        <div class="col-6">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" style="max-height: 205px; min-height: 205px;"><?php echo htmlspecialchars($row['descripcion']); ?></textarea>
                        </div>

                        <div class="col-md-6">
                            <label for="titulo" class="form-label">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($row['titulo']); ?>">
                        </div>

                        <div class="col-6">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad">
                        </div>

                        <div class="col-6">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" class="form-control" name="precio" value="<?php echo htmlspecialchars($row['precio']); ?>" id="precio" step="0.01">
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="registrar" class="btn btn-primary" style="padding: 10px 20px; font-size: 20px;">Actualizar datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="../../../controlador/administrador/adminis.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('imagen-nueva-preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>

</html>