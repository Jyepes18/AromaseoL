<?php
include("../../../modelo/sessiones/verificacion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../css/adminis.css">
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Animales</title>
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
                    <a href="administrador.php" class="link">
                        <i class='bx bxs-grid-alt'></i>
                        <span class="name">Dashboard</span>
                    </a>

                </div>
                <div class="submenu">
                    <a href="administrador.php" class="link submenu-title">Dashboard</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="usuario.php" class="link">
                        <i class='bx bx-user'></i>
                        <span class="name">Usuarios</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="usuario.php" class="link submenu-title">Usuarios</a>
                    <a href="../../../modelo/administrador/usuario/datos.php" class="link">Ver Datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="proAnimales.php" class="link">
                        <i class='bx bxs-dog'></i>
                        <span class="name">Productos Animales</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="proAnimales.php" class="link submenu-title">Productos Animales</a>
                    <a href="../../../modelo/administrador/productoAn/datos.php" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="proAutos.php" class="link">
                        <i class='bx bxs-car'></i>
                        <span class="name">Productos Automoviles</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="proAutos.php" class="link submenu-title">Productos Automoviles</a>
                    <a href="../../../modelo/administrador/productoAu/datos.php" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="prohogar.php" class="link">
                        <i class='bx bxs-home-heart'></i>
                        <span class="name">Productos Hogar</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="prohogar.php" class="link submenu-title">Productos Hogar</a>
                    <a href="../../../modelo/administrador/productoHo/datos.php" class="link">Ver datos</a>
                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../modelo/administrador/pqrs/datos.php" class="link">
                        <i class='bx bxs-comment-error bx-flip-horizontal '></i>
                        <span class="name">PQRS</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="../../../modelo/administrador/pqrs/datos.php" class="link submenu-title">PQRS</a>

                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="vender.php" class="link">
                    <i class='bx bx-clipboard'></i>
                        <span class="name">Pedido</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="vender.php" class="link submenu-title">Pedido</a>
                    <a href="../../../modelo/administrador/pedidos/datos.php" class="link">Ver datos</a>
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

    <!-- Home section -->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text">
            </div>
        </div>
        <div class="container">
            <div class="container-fluid">
                <form onsubmit="return validar();" action="../../../modelo/administrador/productoAn/añadir.php" method="post" class="row g-3 mt-4" enctype="multipart/form-data">
                    <h1 class="h1 text-center mx-auto mt-3">Añadir un producto Animales</h1>
                    <div class="col-md-6">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" class="form-control" name="imagen" id="imagen">
                    </div>

                    <div class="col-md-6">
                        <label for="titulo" class="form-label">Nombre del producto</label>
                        <input type="text" class="form-control" name="titulo" id="titulo">
                    </div>

                    <div class="col-6">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad">
                    </div>

                    <div class="col-6">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" step="00.001">
                    </div>

                    <div class="col-6">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" style="max-height: 200px;"></textarea>
                    </div>

                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" name="registrar" class="btn btn-primary" style="padding: 10px 20px; font-size: 20px;">Registrar producto</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="../../../controlador/administrador/adminis.js"></script>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../../../controlador/administrador/gProductos.js"></script>
</body>

</html>