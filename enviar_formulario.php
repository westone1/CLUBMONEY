<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function limpiar($campo) {
        return htmlspecialchars(trim($campo));
    }

    $nombre = limpiar($_POST["nombre"]);
    $apellido = limpiar($_POST["apellido"]);
    $correo = limpiar($_POST["correo"]);
    $telefono = limpiar($_POST["telefono"]);
    $mensaje = limpiar($_POST["mensaje"]);

    $to = "diegoberde18@gmail.com"; 
    $subject = "Nuevo mensaje desde el sitio web";
    $body = "Nombre: $nombre\nApellido: $apellido\nCorreo: $correo\nTeléfono: $telefono\nMensaje: $mensaje";
    $headers = "From: $correo";

    if (mail($to, $subject, $body, $headers)) {
        echo "Mensaje enviado correctamente.";
    } else {
        echo "Error al enviar el mensaje.";
    }
}
?>