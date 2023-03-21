<?php
include ('../../Model/Reserva/ModelEnviarCorreu.php');

$email = $_POST["email"];
$msg = $_POST["msg"];
$asunto = $_POST["asunto"];

$mostrarEnviarCorreu = new MostrarEnviarCorreu($conn);

$mostrarEnviarCorreu->enviarCorreu($email, $msg, $asunto);

// echo $mostrarEnviarCorreu;

