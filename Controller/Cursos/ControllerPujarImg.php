<?php

include ('../../Model/Cursos/ModelPujarImg.php'); 

$pujarImg = new ModelPujarImg($conn);

$id_curs = $_GET["id"];

$pujarImg->pujarImg($id_curs);