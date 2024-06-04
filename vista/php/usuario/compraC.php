<?php
include("../../../modelo/sessiones/verificacion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/compraC.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Compra de productos</title>
</head>

<body onload="calcularPrecioTotal()">
    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../../img/index/menu.png" alt="Menu" />
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
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <img src="../../img/index/logo.png" alt="Logo" />
        </div>
    </header>

    <div class="d-flex justify-content-center">
        <div class="form">
            <div class="row">
                <form action="../../../modelo/usuarios/compra/añadirC.php" class="row g-3" method="post" onsubmit="return validar();">
                    <h1 class="form_title">Compra de productos</h1>
                    <div class="col-md-6 form-floating">
                        <input type="text" readonly class="form-control" id="nombre" name="nombre" placeholder="Nombre" autocomplete="name" value="<?php echo isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : 'N/A'; ?>" />
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="col-md-6 form-floating">
                        <input type="text" readonly class="form-control" id="apellido" name="apellido" placeholder="Apellido" autocomplete="name" value="<?php echo isset($_SESSION['apellido']) ? htmlspecialchars($_SESSION['apellido']) : 'N/A'; ?>" />
                        <label for="apellido">Apellido</label>
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="email" readonly class="form-control" id="correo" name="correo" placeholder="name@example.com" autocomplete="email" value="<?php echo isset($_SESSION['correo']) ? htmlspecialchars($_SESSION['correo']) : 'N/A'; ?>" />
                        <label for="correo">Correo</label>
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" autocomplete="address-level1" />
                        <label for="direccion">Dirección</label>
                    </div>

                    <div class="col-md-6 form-floating">
                        <input type="date" class="form-control" id="dia" name="fecha" placeholder="Día" autocomplete="address-level1" />
                        <label for="dia">Día</label>
                    </div>

                    <?php if (!empty($_SESSION['carrito'])) : ?>
                        <?php foreach ($_SESSION['carrito'] as $index => $item) : ?>
                            <div class="col-md-6 form-floating">
                                <input type="text" readonly class="form-control" id="producto_<?php echo $index; ?>" name="producto_<?php echo $index; ?>" placeholder="Producto" autocomplete="name" value="<?php echo htmlspecialchars($item['nombre']); ?>" />
                                <label for="producto_<?php echo $index; ?>">Producto</label>
                            </div>

                            <div class="col-md-6 form-floating">
                                <input type="number" class="form-control" id="cantidad_<?php echo $item['id']; ?>" name="cantidad_<?php echo $item['id']; ?>" placeholder="Cantidad" autocomplete="name" value="<?php echo htmlspecialchars($item['cantidad']); ?>" onchange="calcularPrecioTotal()" />
                                <label for="cantidad_<?php echo $item['id']; ?>">Cantidad</label>
                            </div>

                            <div class="col-md-6 form-floating">
                                <input type="number" readonly class="form-control" id="precio_<?php echo $index; ?>" name="precio_<?php echo $index; ?>" placeholder="Precio" autocomplete="cc-number" value="<?php echo htmlspecialchars($item['precio']); ?>" onchange="calcularPrecioTotal()" />
                                <label for="precio_<?php echo $index; ?>">Precio</label>
                            </div>
                        <?php endforeach; ?>

                    <?php else : ?>
                        <p class="text-center">El carrito está vacío.</p>
                    <?php endif; ?>

                    <div class="col-md-6 form-floating">
                        <input type="number" class="form-control" id="total" name="total" placeholder="Total" autocomplete="cc-number" readonly />
                        <label for="total">Total</label>
                    </div>

                    <div class="d-grid gap-2 col-12 mx-auto mb-3">
                        <button class="btn btn-primary" name="solicitar" type="submit">Pedir</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="../../../controlador/usuario/compra.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var urlParams = new URLSearchParams(window.location.search);
            var aviso = urlParams.get('aviso');

            if (aviso === 'Compra') {
                Swal.fire({
                    icon: 'info',
                    title: 'Atención',
                    text: 'Si el pedido es mayor a 100 mil pesos, el envío es gratis; de lo contrario, se paga 10 mil pesos de envío.',
                    confirmButtonText: '¡Entendido!',
                    confirmButtonColor: "#4CB2F8"
                });
            }
        });

        function calcularPrecioTotal() {
            var total = 0;
            <?php foreach ($_SESSION['carrito'] as $index => $item) : ?>
                var precio = parseFloat(document.getElementById('precio_<?php echo $index; ?>').value);
                var cantidad = parseFloat(document.getElementById('cantidad_<?php echo $item['id']; ?>').value);
                total += precio * cantidad;
            <?php endforeach; ?>
            document.getElementById("total").value = total.toFixed(2);
        }

        document.addEventListener("DOMContentLoaded", function() {
            <?php if (!empty($_SESSION['carrito'])) : ?>
                <?php foreach ($_SESSION['carrito'] as $index => $item) : ?>
                    document.getElementById('cantidad_<?php echo $item['id']; ?>').addEventListener('input', function() {
                        calcularPrecioTotal();
                    });
                <?php endforeach; ?>
            <?php endif; ?>
        });

        function validar() {
            var direccion, dia, cantidadesValidas = true;

            direccion = document.getElementById("direccion").value.trim();
            dia = document.getElementById("dia").value;

            var exprecionParaDirecciones = /^[a-zA-Z0-9\s#-]+$/;
            var fechaActual = new Date();

            if (direccion === "") {
                Swal.fire({
                    text: "El campo dirección está vacío",
                    icon: "error"
                });
                return false;
            } else if (direccion.length < 5) {
                Swal.fire({
                    text: "La dirección debe tener al menos 5 caracteres",
                    icon: "error"
                });
                return false;
            } else if (!exprecionParaDirecciones.test(direccion)) {
                Swal.fire({
                    text: "La dirección no es válida. Solo se aceptan caracteres alfanuméricos y '#' y '-'",
                    icon: "error"
                });
                return false;
            } else if (dia === "" || new Date(dia) < fechaActual) {
                Swal.fire({
                    text: "La fecha no es válida. Por favor ingresa una fecha válida.",
                    icon: "error"
                });
                return false;
            } else {
                <?php if (!empty($_SESSION['carrito'])) : ?>
                    <?php foreach ($_SESSION['carrito'] as $item) : ?>
                        var cantidad = document.getElementById('cantidad_<?php echo $item['id']; ?>').value;
                        if (!/^\d+$/.test(cantidad) || cantidad <= 0 || cantidad >= 50) {
                            cantidadesValidas = false;
                        }
                    <?php endforeach; ?>
                <?php endif; ?>
                if (!cantidadesValidas) {
                    Swal.fire({
                        text: "Las cantidades deben ser números enteros mayores a 0 y menores a 50.",
                        icon: "error"
                    });
                    return false;
                }
                return true;
            }
        }
    </script>
</body>

</html>
