<?php

include ('../../Model/Cursos/ModelUpdateImg.php'); 

$updateImg = new ModelUpdateImg($conn);

$id_curs = $_GET["id"];

$updateImg->updateImg($id_curs);

