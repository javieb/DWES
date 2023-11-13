document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("formulario").addEventListener('submit', validarFormulario); 
  });
  
  function validarFormulario(evento) {
    evento.preventDefault();
    let email = document.getElementById('f_email').value;
    if(email.length == 0) {
      alert('El campo email no puede estar vacio');
      return;
    }
    let password = document.getElementById('f_password').value;
    if (password.length == 0) {
      alert('El campo contraseña no puede estar vacío');
      return;
    }
    this.submit();
}