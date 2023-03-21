<?php 
include ('../../Model/Reserva/ModelReserva.php');


session_start();

$reservarCursoModel = new ReservarCursoModel($conn);

$email = $_SESSION["email"];

$id_curs=$_POST["id"];

$reservarCursoModel->reservarCurso($email, $id_curs);

header("Location: ../../Views/html/cursos_reservats.php");
