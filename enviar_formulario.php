<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING);
  $apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING);
  $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
  $correo = filter_input(INPUT_POST, 'correo', FILTER_VALIDATE_EMAIL);
  $mensaje = filter_input(INPUT_POST, 'mensaje', FILTER_SANITIZE_STRING);

  if ($nombre && $correo && $mensaje) {
    $to = "tucorreo@tudominio.com";
    $subject = "Nuevo mensaje desde el sitio web";
    $body = "Nombre: $nombre\nApellido:$apellido\nTelefono:$telefono\nCorreo: $correo\nMensaje:\n$mensaje";
    $headers = "From: $correo";

    if (mail($to, $subject, $body, $headers)) {
      echo "Mensaje enviado correctamente.";
    } else {
      echo "Error al enviar el mensaje.";
    }
  } else {
    echo "Por favor completa todos los campos correctamente.";
  }
}
?>
