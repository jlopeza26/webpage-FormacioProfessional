<?php

    $dia = $_POST["dia"];
    $hora_inici = $_POST["hora_inici"];
    $hora_fi = $_POST["hora_fi"];
    $id_curs = $_POST["id_curs"];

  // Verificar si se han enviado los datos del formulario

    // Verificar si los campos requeridos tienen datos
    if(!empty($_POST['dia'])) {
      // Procesar los datos del formulario
      include ("../../Model/Cursos/ModelHoraris.php");
      $nouHorari=new CrearHoraris($conn);

      $nouHorari->crearHoraris($dia,$hora_inici,$hora_fi,$id_curs);
      session_start();
      header("Location: ../../Views/html/horaris.php?id=".$id_curs."");
      $_SESSION["ErrorCrearHoraris"]=0;

    } else {
      // Redirigir al usuario a la página del formulario para que complete los campos requeridos
      session_start();
      $_SESSION["ErrorCrearHoraris"]=1;
      header("Location: ../../Views/html/horaris.php?id=".$id_curs."");
    }
  
?>