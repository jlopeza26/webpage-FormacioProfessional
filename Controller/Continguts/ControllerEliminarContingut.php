<?php
include ('../../Model/Continguts/ModelEliminarContingut.php');

$deleteContingut = new EliminarContingut($conn);

$id_contingut=$_POST["id_contingut"];

$deleteContingut->eliminarContingut($id_contingut);

header("Location: ../../Views/html/panell_continguts.php"); 

mysqli_close($conn);