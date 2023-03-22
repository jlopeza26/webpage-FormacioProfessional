function mostrar_dades(id_reserva) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4) {
      if (
        document.getElementById("dades_" + id_reserva).style.display == "none"
      ) {
        document.getElementById("dades_" + id_reserva).style.display = "block";
        document.getElementById(id_reserva).value = "Ocultar dades";
      } else if (
        document.getElementById("dades_" + id_reserva).style.display == "block"
      ) {
        document.getElementById("dades_" + id_reserva).style.display = "none";
        document.getElementById(id_reserva).value = "Mostrar dades";
      }
    }
  };
  xhr.open("POST", "../../Controller/Reserva/ControllerReservasTotals.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.send("id_reserva=" + id_reserva);
}
