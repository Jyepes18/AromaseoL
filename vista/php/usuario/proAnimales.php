<?php
include("../../../modelo/sessiones/verificacion.php");
include("../../../modelo/conexion.php");

//Consulta sql 
$sql = "SELECT id, imagen, titulo, precio, cantidad, descripcion FROM productosanimales";
$resultado = mysqli_query($conn, $sql);

// Verificar si hay resultados
if (mysqli_num_rows($resultado) > 0) {
    // Array para almacenar los productos
    $productos = array();

    // Obtener los productos de la consulta
    while ($row = mysqli_fetch_assoc($resultado)) {
        $productos[] = $row;
    }
}

// Cerrar la conexión
mysqli_close($conn);
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
        <?php if (!empty($productos)) : ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($productos as $producto) : ?>
                    <div class="col-12 col-md-4">
                        <div class="card h-100">
                            <img src="<?php echo htmlspecialchars($producto['imagen']); ?>" class="card-img-top" alt="Productos para animales">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo htmlspecialchars($producto['titulo']); ?></h5>
                                <p class="card-text"><?php echo htmlspecialchars($producto['descripcion']); ?></p>
                                <p class="card-text">Precio: <?php echo htmlspecialchars($producto['precio']); ?></p>
                                <p class="card-text">Cantidad: <?php echo htmlspecialchars($producto['cantidad']); ?></p>
                            </div>
                            <div class="card-footer">
                                <form action="../../../modelo/usuarios/carrito/carritoAn.php" method="post" class="mt-auto">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($producto['id']); ?>">
                                    <input type="hidden" name="nombre" value="<?php echo htmlspecialchars($producto['titulo']); ?>">
                                    <input type="hidden" name="precio" value="<?php echo htmlspecialchars($producto['precio']); ?>">
                                    <input type="hidden" name="cantidad" value="1">
                                    <button type="submit" name="agregar" class="btn btn-primary btn-block">Añadir al carrito</button>
                                    <a href="compraU.php?producto=<?php echo urlencode($producto['titulo']); ?>&precio=<?php echo urlencode($producto['precio']); ?>&aviso=Compra" class="btn btn-secondary btn-block mt-2">Comprar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p class="text-center h3">No hay productos disponibles.</p>
        <?php endif; ?>
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
                    <?php
                    if (!empty($_SESSION['carrito'])) : ?>
                        <a href="compraC.php?aviso=Compra" class="btn btn-secondary">Proceder al pago</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['mensaje_error'])) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $_SESSION['mensaje_error'];
        echo '</div>';
        // Elimina el mensaje de la sesión para que no se muestre de nuevo
        unset($_SESSION['mensaje_error']);
    }
    ?>

    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</body>

</html>