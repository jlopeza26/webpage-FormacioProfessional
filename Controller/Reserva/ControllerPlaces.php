<?php
include ('../../Model/Reserva/ModelPlaces.php');

// $id_curs = $_GET["id"];

$mostrarPlaces = new MostrarPlaces($conn);

$mostrarPlaces->places($placesDispo, $id_curs);

echo $mostrarPlaces;

