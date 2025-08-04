document.getElementById('form-contacto').addEventListener('submit', function(e) {
  e.preventDefault();

  const form = e.target;
  const formData = new FormData(form);

  fetch('enviar_formulario.php', {
    method: 'POST',
    body: formData
  })
  .then(res => res.text())
  .then(response => {
    if (response.includes("Mensaje enviado correctamente")) {
      Swal.fire({
        icon: 'success',
        title: '¡Mensaje enviado!',
        text: 'Nos pondremos en contacto contigo pronto.',
        confirmButtonColor: '#084c4c'
      });
      form.reset();
    } else {
      Swal.fire({
        icon: 'error',
        title: 'Hubo un error',
        text: 'No se pudo enviar el mensaje. Intenta nuevamente.',
        confirmButtonColor: '#dc3545'
      });
    }
  })
  .catch(error => {
    Swal.fire({
      icon: 'error',
      title: 'Error de red',
      text: 'No se pudo conectar al servidor.',
      confirmButtonColor: '#dc3545'
    });
  });
});