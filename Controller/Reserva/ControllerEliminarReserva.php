<?php
include ('../../Model/Reserva/ModelEliminarReserva.php');

$eliminarReserva = new EliminarReserva($conn);

$id_reserva=$_POST["id_reserva"];
   
$eliminarReserva->eliminarReserva($id_reserva);
header("Location: ../../Views/html/cursos_reservats.php"); 

mysqli_close($conn);
