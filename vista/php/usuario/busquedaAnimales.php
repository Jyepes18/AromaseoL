<?php
include("../../../modelo/sessiones/verificacion.php");
include("../../../modelo/conexion.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../node_modules/boxicons/css/boxicons.min.css">
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Animales</title>
    <style>
        .card img {
            height: 400px;
            object-fit: cover;
        }

        .card-body {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title,
        .card-text {
            margin-bottom: auto;
        }
    </style>
</head>

<body>
    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../../img/index/menu.png" alt="Menú" />
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
                    <li>
                        <button type="button" class="btn btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                            </svg>
                        </button>
                    </li>
                    <li>
                        <a href="">
                            <i class='bx bxs-brush-alt bx-tada'>Pesonaliza tu producto</i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <img src="../../img/index/logo.png" alt="Logo" />
        </div>
    </header>

    <div class="container mt-4">
        <!-- Formulario de búsqueda -->
        <div class="container-fluid">
            <form class="d-flex input" action="busquedaAnimales.php" method="post">
                <input class="form-control me-2" type="search" placeholder="Buscar" name="busqueda">
                <button class="btn btn-outline-primary" type="submit" name="enviar"><b>Buscar</b></button>
            </form>
        </div>
        <br><br>

        <?php
        if (isset($_POST['enviar'])) {
            // Obtener el valor de búsqueda
            $busqueda = $_POST['busqueda'];

            // Preparar la consulta SQL
            $consulta = $conn->prepare("SELECT * FROM productosanimales WHERE titulo LIKE ? OR descripcion LIKE ? OR precio LIKE ?");
            $busqueda_param = "%$busqueda%";
            $consulta->bind_param("sss", $busqueda_param, $busqueda_param, $busqueda_param);

            // Ejecutar la consulta
            $consulta->execute();

            // Obtener los resultados
            $resultado = $consulta->get_result();

            // Mostrar los resultados
            while ($producto = $resultado->fetch_assoc()) {
                echo '<div class="row row-cols-1 row-cols-md-3 g-4">';
                echo '<div class="col-12 col-md-4">';
                echo '<div class="card h-100">';
                echo '<img src="' . htmlspecialchars($producto['imagen']) . '" class="card-img-top" alt="Productos para animales">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($producto['titulo']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($producto['descripcion']) . '</p>';
                echo '<p class="card-text">Precio: ' . htmlspecialchars($producto['precio']) . '</p>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<form action="../../../modelo/usuarios/carrito/carritoAn.php" method="post" class="mt-auto">';
                echo '<input type="hidden" name="id" value="' . htmlspecialchars($producto['id']) . '">';
                echo '<input type="hidden" name="nombre" value="' . htmlspecialchars($producto['titulo']) . '">';
                echo '<input type="hidden" name="precio" value="' . htmlspecialchars($producto['precio']) . '">';
                echo '<input type="hidden" name="cantidad" value="1">';
                echo '<button type="submit" name="agregar" class="btn btn-primary btn-block">Añadir al carrito</button>';
                echo '<a href="compraU.php?producto=' . urlencode($producto['titulo']) . '&precio=' . urlencode($producto['precio']) . '&aviso=Compra" class="btn btn-secondary btn-block mt-2">Comprar</a>';
                echo '</form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
        <?php
        if ($resultado->num_rows > 0) : ?>
            <p>Se encontro esto</p>
        <?php else : ?>
            <p class="text-center text-danger h3 ">No se han encontrado resultados</p>
        <?php endif  ?>
    </div>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                        Hola <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "N/A"; ?>
                        <?php echo isset($_SESSION['apellido']) ? $_SESSION['apellido'] : "N/A"; ?>, Bienvenido
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (!empty($_SESSION['carrito'])) : ?>
                        <ul class="list-group">
                            <?php foreach ($_SESSION['carrito'] as $index => $item) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Producto: <?php echo htmlspecialchars($item['nombre']); ?> - <?php echo htmlspecialchars($item['precio']); ?>$ Cantidad: <?php echo htmlspecialchars($item['cantidad']); ?>
                                    <span>
                                        <a href="../../../modelo/usuarios/carrito/carritoAn.php?eliminar=<?php echo $index; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else : ?>
                        <p class="text-center">El carrito está vacío.</p>
                    <?php endif; ?>
                </div>
                <div class="modal-footer">
                    <a href="compraC.php?aviso=Compra" class="btn btn-secondary">Proceder al pago</a>
                </div>
            </div>
        </div>
    </div>

    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>