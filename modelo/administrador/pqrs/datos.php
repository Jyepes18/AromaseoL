<?php
// Incluir conexion a la bd
include("../../conexion.php");

//Incluir verificacion para saber si la sesion esta iniciada
include("../../sessiones/verificacion.php");

$pqrs = "SELECT * FROM pqrs"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../../vista/css/adminis.css">
    <link rel="shortcut icon" href="../../../vista/img/index/lg.png" />
    <title>Administrador</title>
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
                    <a href="datos.php" class="link">Ver datos</a>
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
                    <a href="" class="link">
                        <i class='bx bxs-comment-error bx-flip-horizontal'></i>
                        <span class="name">PQRS</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="" class="link submenu-title">PQRS</a>

                </div>
            </li>

            <li class="dropdown">
                <div class="title">
                    <a href="../../../vista/php/administrador/vender.php" class="link">
                        <i class='bx bx-clipboard'></i>
                        <span class="name">Pedido</span>
                    </a>
                    <i class='bx bxs-chevron-down'></i>
                </div>
                <div class="submenu">
                    <a href="../../../vista/php/administrador/vender.php" class="link submenu-title">Pedido</a>
                    <a href="../pedidos/datos.php" class="link">Ver datos</a>
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
                <main class="main col">
                    <div class="row justify-content-start">
                        <div class="columna col-lg-12">

                            <!-- Formulario de búsqueda -->
                            <div class="container-fluid">
                                <form class="d-flex input" action="busqueda.php" method="post">
                                    <input class="form-control me-2" type="search" placeholder="Buscar" name="busqueda">
                                    <button class="btn btn-outline-info" type="submit" name="enviar"><b>Buscar</b></button>
                                </form>
                            </div>

                            <!-- Tabla de datos con Bootstrap -->
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Correo</th>
                                            <th>Direccion</th>
                                            <th>Fecha <br>
                                                AA/MM/DD</th>
                                            <th class="text-center">Imagen</th>
                                            <th>Descripcion</th>
                                            <th class="text-center">Operacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultado = mysqli_query($conn, $pqrs);
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                        ?>
                                            <tr>
                                                <td> <?php echo $row["nombre"]; ?> </td>
                                                <td> <?php echo $row["apellido"]; ?> </td>
                                                <td>
                                                    <?php
                                                    echo !empty($row["correo"]) ? $row["correo"] : (!empty($row["correoDos"]) ? $row["correoDos"] : "Sin correo disponible");
                                                    ?>
                                                </td>
                                                <td> <?php echo !empty($row['direccion']) ? $row['direccion'] : "El usuario no coloco direccion";  ?> </td>
                                                <td> <?php echo $row["fecha"]; ?> </td>
                                                <td class="text-center">
                                                    <?php
                                                    // Asumiendo que $row["imagen"] contiene la ruta o el nombre del archivo de la imagen.
                                                    $rutaImagen = $row["imagen"];
                                                    echo '<img src="' . $rutaImagen . '" alt="Imagen" width="150" height="150" />';
                                                    ?>
                                                </td>
                                                <td> <?php echo $row["descripcion"]; ?> </td>
                                                <td class="text-center">
                                                    <a href="respuesta.php.?id=<?php echo $row["id"]; ?>" class="btn btn-success">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-reply-all-fill" viewBox="0 0 16 16">
                                                            <path d="M8.021 11.9 3.453 8.62a.72.72 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
                                                            <path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945l-.042.028a.147.147 0 0 0 0 .252l.042.028 4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        mysqli_free_result($resultado);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>



    </section>

    <script src="../../../controlador/administrador/adminis.js"></script>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnEliminar = document.querySelectorAll('.eliminar');

            btnEliminar.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const id = button.getAttribute('data-id');

                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Sí, eliminarlo!',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = `eliminar.php?id=${id}`;
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>