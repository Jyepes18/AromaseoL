<?php
include("../../../modelo/sessiones/verificacion.php");
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Aromaseo Limpieza</title>
</head>

<body>
    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../../img/index/menu.png" alt="" />
            </label>
            <br><br>
            <nav class="navbar">
                <ul>
                    <li><a href="indexDos.php">Inicio</a></li>
                    <li>
                        <a href="pqrs.php">PQRS</a>
                    </li>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </button>
                </ul>
            </nav>
        </div>

        <div class="header-content container">
            <div class="content" id="Nosotros">
                <h1>Nosotros</h1>

                <p>
                    Producimos una amplia variedad de productos para el hogar,
                    incluyendo jabón para ropa, jabón para loza, blanqueador,
                    desinfectante, jabón de manos y más. Además, fabricamos productos
                    específicamente diseñados para el cuidado de automóviles y motos.
                    Asimismo, contamos con una destacada línea de productos cosméticos
                    para mascotas, dirigidos especialmente a perros y gatos.
                </p>
                <a href="#MisionyVision" class="btn-1">Mision y Vision</a>
            </div>
            <img src="../../img/index/logo.png" alt="" />
        </div>
    </header>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Hola <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "N/A"; ?>
                        <?php echo isset($_SESSION['apellido']) ? $_SESSION['apellido'] : "N/A"; ?>, Bienvenido
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>
                        <i class='bx bxs-brain bx-flip-horizontal bx-spin'></i> Recuerda esta palabra para cambiar tu contraseña:
                        "<?php echo (isset($_SESSION['respuesta']) && !empty($_SESSION['respuesta'])) ? $_SESSION['respuesta'] : " "; ?>"
                    </p>

                    <p>
                        <i class='bx bxs-lock bx-tada'></i><a href="contra.php"> Cambiar contraseña</a>
                    </p>

                    <p>
                        <i class='bx bxs-exit bx-rotate-180'></i><a href="../../../modelo/sessiones/cerrar.php"> Salir</a>
                    </p>

                    <p>
                        <i class='bx bxs-cart-download bx-fade-left'></i><a href="productos.php">Ver productos comprados</a>
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="card">
            <img src="../../img/servicios/hogar.jpg" alt="" />
            <div class="info">
                <p>
                    ...
                </p>
                <a class="btn" href="proHogar.php">Comprar</a>
            </div>
        </div>

        <!--Escpacio-->

        <div class="card">
            <img src="../../img/servicios/perros.png" alt="" />
            <div class="info">
                <p>
                    ...
                </p>
                <a class="btn" href="proAnimales.php">Comprar</a>
            </div>
        </div>

        <!--Espacio-->

        <div class="card">
            <img src="../../img/servicios/carros.jpg" alt="" />
            <div class="info">
                <p>
                    ...
                </p>
                <a class="btn" href="proAutos.php">Comprar</a>
            </div>
        </div>
    </div>

    <section>
        <h2>Beneficios</h2>

        <div class="container">
            <div class="g-factures">
                <div class="feature">
                    <img src="../../img/beneficios/cumplimiento.png" alt="" />
                    <h3>cumplimiento</h3>
                    <p>
                        Los productos son entregados maximo a las 24 horas siguientes de
                        haber confirmado el pedido
                    </p>
                </div>

                <div class="feature">
                    <img src="../../img/beneficios/garantia.png" alt="" />
                    <h3>garantia</h3>
                    <p>
                        Si algún producto presenta un defecto de fábrica, procederemos a
                        su cambio inmediato dentro de un plazo máximo de 7 días hábiles a
                        partir de la fecha de manipulación del producto.
                    </p>
                </div>

                <div class="feature">
                    <img src="../../img/beneficios/facil_pago.jpg" alt="" />
                    <h3>Facilidad de pago</h3>
                    <p>
                        Los pagos pueden realizarse tanto en efectivo al momento de la
                        entrega como de forma virtual a través de plataformas como Nequi,
                        Daviplata o PSE.
                    </p>
                </div>

                <div class="feature">
                    <img src="../../img/beneficios/servicio.png" alt="" />
                    <h3>servicio</h3>
                    <p>
                        Realizamos entregas a domicilio en cualquier parte de la ciudad y
                        también fuera de Bogotá. El pago se efectúa al momento de la
                        entrega de los productos.
                    </p>
                </div>

                <div class="feature">
                    <img src="../../img/beneficios/personalliza.jpg" alt="" />
                    <h3>Personalizacion de productos</h3>
                    <p>
                        Se evaluará la necesidad específica del cliente y se llevará a
                        cabo una encuesta para analizar sus requerimientos. Nuestro
                        objetivo es garantizar la plena satisfacción del cliente,
                        ofreciéndole soluciones que se ajusten a sus necesidades
                        específicas.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="info">
                <div class="info-content" id="MisionyVision">
                    <div class="info-price">
                        <h2>Mision</h2>
                        <p class="price"></p>
                        <p>
                            Nuestra misión es liderar en la limpieza, desinfección y
                            aromatización de hogares, industrias y oficinas, ofreciendo
                            servicios personalizados que faciliten la comodidad del cliente
                            sin que deba desplazarse desde su lugar de residencia, trabajo o
                            empresa.
                        </p>
                    </div>

                    <div class="info-txt">
                        <h2>vision</h2>
                        <p>
                            Para el año 2025, aspiramos a expandir nuestras ventas a nivel
                            nacional, consolidando así el reconocimiento de nuestra marca en
                            todo el país.
                        </p>
                        <a href="#Nosotros" class="btn-1">Nosotros</a>
                    </div>
                </div>
                <hr />
                <div class="enlaces">
                    <h3>Aromaseo Limpieza</h3>
                    <div class="enlace">
                        <li>
                            <a href="https://web.facebook.com/?stype=lo&jlou=AfdogElHOpP2PKirm4HQ73jcfeB9studOnzYmX23yyUnsthlcPVHU5mh2Kch2-spJV9oSpbQa2oIYl3jQ79fHpsRAesTsipMjuLV1L6nWo7vlQ&smuh=62110&lh=Ac-Zrrw3yypGIlklpnQ">facebook
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/?__coig_restricted=1">Instagram
                            </a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var urlParams = new URLSearchParams(window.location.search);
        var error = urlParams.get('aviso');

        // Si el parámetro 'aviso' es igual a 'ErrorCompra'
        if (error === 'ErrorCompra') {
            // Espera 1000 milisegundos (1 segundo) antes de mostrar el mensaje de error
            setTimeout(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Lo sentimos',
                    text: 'El producto seleccionado está agotado',
                });
            }, 1000);
        }
    });
</script>


</body>

</html>