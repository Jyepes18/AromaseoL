<?php
//Archivo para verificar sesion
include("../../../modelo/sessiones/verificacion.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../css/adminis.css">
    <link rel="shortcut icon" href="../../img/index/lg.png" />
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
                    <a href="../../../modelo/administrador/pedidos/datos.php" class="link">
                        <i class='bx bx-clipboard'></i>
                        <span class="name">Pedidos</span>
                    </a>
                </div>
                <div class="submenu">
                    <a href="vender.php" class="link submenu-title">Pedidos</a>
                    <a href="../../../modelo/administrador/pedidos/datos.php" class="link submenu-title">Ver datos</a>
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
                <form action="../../../modelo/administrador/compra/añadir.php" method="post" class="mt-4" id="formulario">
                    <h1 class="text-center mt-3">Registrar una nueva venta</h1>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" required>
                        </div>
                        <div class="col-md-6">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" class="form-control" name="apellido" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="producto" class="form-label">Producto:</label>
                            <input type="text" class="form-control" id="producto" name="producto[]" required>
                        </div>
                        <div class="col-md-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad[]" min="1" required>
                        </div>
                        <div class="col-md-3">
                            <label for="precio" class="form-label">Precio unitario:</label>
                            <input type="number" class="form-control" id="precio" name="precio[]" min="0.01" step="0.01" required>
                        </div>
                        <div class="col-md-6">
                            <label for="total">Total:</label>
                            <input type="text" class="form-control total" name="total[]" id="totalProducto0">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <label for="fecha" class="form-label">Fecha:</label>
                            <input type="date" class="form-control" name="fecha" required>
                        </div>
                        <div class="col-md-6">
                            <label for="direccion" class="form-label">Dirección:</label>
                            <input type="text" class="form-control" name="direccion" required>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>


                    <div class="d-grid gap-2 mt-4">
                        <div class="text-center">
                            <button type="button" class="btn btn-primary mt-3" id="agregarCampo">Añadir Producto</button>
                        </div>
                        <button type="submit" name="registrar" class="btn btn-primary">Registrar Venta</button>
                        <div class="col-md-6 mt-4">
                            <label for="totalG" class="form-label">Total general:</label>
                            <input type="text" class="form-control" id="totalG" readonly require>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <script src="../../../controlador/administrador/adminis.js"></script>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var totalGenerado = document.getElementById('totalG');
            var formulario = document.getElementById('formulario');
            var btnAgregarCampo = document.getElementById('agregarCampo');
            var camposCantidad = document.querySelectorAll('input[name^="cantidad"]');
            var camposPrecio = document.querySelectorAll('input[name^="precio"]');
            var camposTotales = document.querySelectorAll('.total');

            function agregarEventos() {
                camposCantidad.forEach(function(campoCantidad, index) {
                    campoCantidad.addEventListener('input', function() {
                        calcularTotal(index);
                        calcularTotalGeneral();
                    });
                });

                camposPrecio.forEach(function(campoPrecio, index) {
                    campoPrecio.addEventListener('input', function() {
                        calcularTotal(index);
                        calcularTotalGeneral();
                    });
                });
            }

            function calcularTotal(index) {
                var cantidad = parseFloat(camposCantidad[index].value) || 0;
                var precio = parseFloat(camposPrecio[index].value) || 0;
                camposTotales[index].value = (cantidad * precio).toFixed(2);
            }

            function calcularTotalGeneral() {
                var total = 0;
                camposTotales.forEach(function(campoTotal) {
                    total += parseFloat(campoTotal.value) || 0;
                });
                totalGenerado.value = total.toFixed(2);
            }

            btnAgregarCampo.addEventListener('click', function() {
                var divCampos = document.createElement('div');
                divCampos.classList.add('row', 'g-3');
                divCampos.innerHTML = `
                <div class="col-md-6">
                    <label for="producto">Producto:</label>
                    <input type="text" class="form-control" name="producto[]" required>
                </div>
                <div class="col-md-3">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad[]" min="1" required>
                </div>
                <div class="col-md-3">
                    <label for="precio">Precio unitario:</label>
                    <input type="number" class="form-control" name="precio[]" min="0.01" step="0.01" required>
                </div>
                <div class="col-md-6">
                    <label for="total">Total:</label>
                    <input type="text" class="form-control total" name="total[]">
                </div>`;
                formulario.insertBefore(divCampos, formulario.lastElementChild);

                // Actualiza la lista de campos
                camposCantidad = document.querySelectorAll('input[name^="cantidad"]');
                camposPrecio = document.querySelectorAll('input[name^="precio"]');
                camposTotales = document.querySelectorAll('.total');

                agregarEventos();
            });

            agregarEventos();

            formulario.addEventListener('submit', function(event) {
                event.preventDefault();

                var nombre = formulario.querySelector('input[name="nombre"]');
                var apellido = formulario.querySelector('input[name="apellido"]');
                var producto = formulario.querySelectorAll('input[name="producto[]"]');
                var cantidad = formulario.querySelectorAll('input[name="cantidad[]"]');
                var precio = formulario.querySelectorAll('input[name="precio[]"]');
                var fecha = formulario.querySelector('input[name="fecha"]');
                var direccion = formulario.querySelector('input[name="direccion"]');
                var email = formulario.querySelector('input[name="email"]');

                // Validaciones específicas
                if (!nombre.value) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Campo requerido',
                        text: 'El campo Nombre es obligatorio.'
                    });
                    return;
                }

                if (!apellido.value) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Campo requerido',
                        text: 'El campo Apellido es obligatorio.'
                    });
                    return;
                }

                for (let i = 0; i < producto.length; i++) {
                    if (!producto[i].value) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Campo requerido',
                            text: 'El campo Producto es obligatorio.'
                        });
                        return;
                    }
                }

                for (let i = 0; i < cantidad.length; i++) {
                    if (!cantidad[i].value || cantidad[i].value <= 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Campo requerido',
                            text: 'El campo Cantidad es obligatorio y debe ser mayor que 0.'
                        });
                        return;
                    }
                }

                for (let i = 0; i < precio.length; i++) {
                    if (!precio[i].value || precio[i].value <= 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Campo requerido',
                            text: 'El campo Precio unitario es obligatorio y debe ser mayor que 0.'
                        });
                        return;
                    }
                }

                if (!fecha.value) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Campo requerido',
                        text: 'El campo Fecha es obligatorio.'
                    });
                    return;
                }

                if (!direccion.value) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Campo requerido',
                        text: 'El campo Dirección es obligatorio.'
                    });
                    return;
                }

                if (!email.value) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Campo requerido',
                        text: 'El campo Correo electrónico es obligatorio.'
                    });
                    return;
                }

                // Si todos los campos son válidos, se puede enviar el formulario
                formulario.submit();
            });
        });
    </script>



</body>

</html>