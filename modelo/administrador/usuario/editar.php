<?php
//Incluir conexion a la bd
include("../../conexion.php");
//Verificar si la sesion esta inicada
include("../../sessiones/verificacion.php");
//Traer el id 
$id = $_GET['id'];
$usuarios = "SELECT u.*, r.rol 
             FROM usuarios u 
             LEFT JOIN rol r ON u.id = r.usuario_id 
             WHERE u.id = '$id'";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
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
                    <a href="datos.php" class="link">Ver Datos</a>
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
                    <a href="../productoHo/datos.php" class="link">Ver datos</a>
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
            <div class="text">
            </div>
        </div>

        <div class="main-content">
            <div class="container">
                <div class="container-fluid">
                    <form action="proActualizar.php" method="post" class="row g-3 mt-4">
                        <h1 class="h1 text-center mx-auto mt-3">Actualizar datos del usuario</h1>
                        <?php
                        $resultado = mysqli_query($conn, $usuarios);
                        while ($row = mysqli_fetch_assoc($resultado)) {
                        ?>
                            <input hidden type="text" name="id" class="form-control" value="<?php echo $row['id']; ?>">

                            <div class="col-md-6">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $row['apellido']; ?>">
                            </div>
                            <div class="col-6">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>" />
                            </div>

                            <div class="col-6">
                                <label for="correo" class="form-label">Correo</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $row['correo']; ?>" />
                            </div>

                            <div class="col-md-6">
                                <label for="rol" class="form-label">Rol</label>
                                <select id="rol" name="rol" class="form-select">
                                    <option selected><?php echo $row['rol']; ?></option>
                                    <option value="cliente">Cliente</option>
                                    <option value="administrador">Administrador</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" name="registrar" class="btn btn-primary" style="padding: 10px 20px; font-size: 20px;">Actualizar datos</button>
                            </div>
                        <?php
                        }
                        mysqli_free_result($resultado);
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>


    
    <script src="../../../controlador/administrador/adminis.js"></script>
    <script src="../../../controlador/administrador/usuarios.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>