<?php
//Archivo de verificacion de sesion
include("../../../modelo/sessiones/verificacion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir usuario</title>
    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/adminis.css">
    <link rel="shortcut icon" href="../../img/index/lg.png" />
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

    <!--Home section-->
    <section class="home">
        <div class="toggle-sidebar">
            <i class='bx bx-menu'></i>
            <div class="text">
            </div>
        </div>

        <div class="main-content">
            <div class="container">
                <div class="container-fluid">
                    <form action="../../../modelo/administrador/usuario/anadir.php" onsubmit="return validar();" method="post" class="row g-3 mt-4">
                        <h1 class="h1 text-center mx-auto mt-3">Registar un usuario nuevo</h1>
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>

                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido">
                        </div>
                        <div class="col-6">
                            <label for="telefono" class="form-label">Telefono</label>
                            <input type="tel" class="form-control" name="telefono" id="telefono" />
                        </div>

                        <div class="col-6">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" name="correo" id="correo" />
                        </div>

                        <div class="col-md-6">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" name="contrasena" id="contrasena">
                        </div>

                        <div class="col-md-6">
                            <label for="respuesta" class="form-label">Palabra clave</label>
                            <input type="text" class="form-control" name="respuesta" id="respuesta">
                        </div>

                        <div class="col-md-6">
                            <label for="rol" class="form-label">Rol</label>
                            <select id="rol" name="rol" class="form-select">
                                <option selected>Cliente o administrador</option>
                                <option value="cliente">Cliente</option>
                                <option value="administrador">Administrador</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="registrar" class="btn btn-primary" style="padding: 10px 20px; font-size: 20px;">Registar usuario</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>

    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../controlador/administrador/adminis.js"></script>
    <script src="../../../controlador/administrador/usuarios.js"></script>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var urlParams = new URLSearchParams(window.location.search);
            var error = urlParams.get('error');
            var hola = urlParams.get('hola');

            // Si el parámetro 'error' es igual a 'Yaesta'
            if (error === 'Yaesta') {
                Swal.fire({
                    icon: 'info',
                    title: 'Ooopss',
                    text: 'Este correo o telefono ya está registrados',
                    confirmButtonColor: "#4CB2F8",
                });
            }

            // Si el parámetro 'hola' es igual a 'Mundo'
            if (hola === 'Mundo') {
                Swal.fire({
                    icon: 'success',
                    text: 'Usuario añadido con éxito',
                    confirmButtonColor: "#4CB2F8",
                });
            }
        });
    </script>


</body>


</html>