<?php
// Iniciar sesión
session_start();

// Verificar si hay una cuenta activa
if (!isset($_SESSION["rol"]) || ($_SESSION["rol"] != "administrador" && $_SESSION["rol"] != "cliente")) {
    // Si no hay una sesión activa o el rol no es válido, redirigir a la página de error
    header("Location: ../../../vista/html/paginaError.html");
    exit();
}
?>
