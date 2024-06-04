<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el correo electrónico del formulario
    $correo = $_POST['correo'];

    // Generar un código de verificación de 5 dígitos
    $codigo_verificacion = rand(10000, 99999);

    // Asunto del correo electrónico
    $asunto = "Código de Verificación";

    // Mensaje del correo electrónico
    $mensaje = "Su código de verificación es: $codigo_verificacion";

    // Enviar el correo electrónico
    if (mail($correo, $asunto, $mensaje)) {
        echo "Se ha enviado un código de verificación a su correo electrónico.";
    } else {
        echo "Error al enviar el correo electrónico. Por favor, inténtelo de nuevo.";
    }
}
?>
