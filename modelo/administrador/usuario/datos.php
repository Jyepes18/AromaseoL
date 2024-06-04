<?php
// Incluir conexion a la bd
include("../../conexion.php");

//Incluir verificacion para saber si la sesion esta iniciada
include("../../sessiones/verificacion.php");

$usuario = "SELECT * FROM usuarios"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos del cliente</title>

    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
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
                                    <button class="btn btn-outline-primary" type="submit" name="enviar"><b>Buscar</b></button>
                                </form>
                            </div>

                            <!-- Tabla de datos con Bootstrap -->
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th class="text-center">Operacion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $resultado = mysqli_query($conn, $usuario);
                                        while ($row = mysqli_fetch_assoc($resultado)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row["nombre"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["apellido"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["telefono"]; ?>
                                                </td>
                                                <td>
                                                    <?php echo $row["correo"]; ?>
                                                </td>
                                                <td class="text-center">

                                                    <a href="editar.php.?id=<?php echo $row["id"]; ?>" class="btn btn-warning">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                        </svg>
                                                    </a>

                                                    <a href="eliminar.php?id=<?php echo $row["id"]; ?>" data-id="<?php echo $row["id"]; ?>" class="btn btn-danger eliminar">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                                                            <path d="M2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z" />
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
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
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

        document.addEventListener("DOMContentLoaded", function() {
            var urlParams = new URLSearchParams(window.location.search);
            var error = urlParams.get('bien');

            // Si el parámetro 'bien' es igual a 'Bienvenido'
            if (error === 'Actualizado') {
                // Espera 3000 milisegundos (2 segundos) antes de mostrar el mensaje de bienvenida
                setTimeout(function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Actulizado'
                    });
                }, 1000);
            }
        });
    </script>


</body>
</body>

</html>