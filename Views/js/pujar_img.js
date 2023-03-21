// Leer el parámetro 'error' de la URL
const params = new URLSearchParams(window.location.search);
const error = params.get("error");

// Mostrar el mensaje de error si existe
if (error) {
  const errorMessage = document.getElementById("error-message");
  errorMessage.innerText = error;
}
