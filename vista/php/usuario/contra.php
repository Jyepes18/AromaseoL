<?php
include("../../../modelo/sessiones/verificacion.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/formularios.css" />
    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="shortcut icon" href="../../img/index/lg.png" />
    <title>Cambiar contraseña</title>
</head>

<body>
    <header>
        <div class="menu container">
            <a href="#" class="logo"></a>
            <input type="checkbox" id="menu" />
            <label for="menu">
                <img src="../../img/index/menu.png" alt="" />
            </label>
            <br /><br />
            <nav class="navbar">
                <ul>
                    <li>
                        <a href="indexDos.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708z" />
                            </svg></a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="header-content container">
            <img src="../../img/index/logo.png" alt="" />
        </div>
    </header>

    <div class="d-flex justify-content-center">
        <div class="form">
            <form action="../../../modelo/usuarios/contra.php" method="post" onsubmit="return validar();">
                <h1 class="form_title">Cambiar contraseña</h1>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" name="correo" id="correo" placeholder="name@example.com" autocomplete="email" aria-label="Correo electrónico" />
                    <label for="correo">Correo</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="respuesta" id="respuesta" placeholder="Respuesta" autocomplete="on" aria-label="Respuesta" />
                    <label for="respuesta">Palabra clave</label>
                </div>

                <div class="form-floating mb-4 position-relative">
                    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Password" autocomplete="new-password" aria-label="Contraseña" />
                    <label for="contraseña">Contraseña</label>
                    <i id="togglePassword" class="position-absolute top-50 translate-middle-y end-0 me-3" style="cursor: pointer;" aria-label="Mostrar/ocultar contraseña">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </i>
                </div>

                <div class="form-floating mb-4 position-relative">
                    <input type="password" class="form-control" id="contrasenaVerificada" name="contrasenaDos" placeholder="Verificar contraseña" autocomplete="new-password" aria-label="Verificar contraseña" />
                    <label for="contraVerificada">Verificar contraseña</label>
                    <i id="verContra" class="position-absolute top-50 translate-middle-y end-0 me-3" style="cursor: pointer;" aria-label="Mostrar/ocultar contraseña">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                    </i>
                </div>

                <div class="d-grid gap-2 col-12 mx-auto mb-3">
                    <button class="btn btn-primary" name="cambiar" type="submit">Cambiar contraseña</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../../../node_modules/sweetalert2/dist/sweetalert2.all.js"></script>
    <script src="../../../controlador/usuario/contras.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>