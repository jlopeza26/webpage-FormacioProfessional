<?php
include ('../../Model/Cursos/ModelEliminarCurs.php');

$deleteCurs = new EliminarCurs($conn);

$id_curs=$_POST["id_curs"];

$deleteCurs->eliminarCurs($id_curs);
header("Location: ../../Views/html/panell_cursos.php"); 

mysqli_close($conn);