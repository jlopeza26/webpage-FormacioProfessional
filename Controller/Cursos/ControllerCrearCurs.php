<?php 
  // Verificar si se han enviado los datos del formulario

    // Verificar si los campos requeridos tienen datos
    if(!empty($_POST['nom_curs']) && !empty($_POST['data_inici']) && !empty($_POST['data_fi']) && !empty($_POST['id_professor']) && !empty($_POST['preu']) && !empty($_POST['placesDisponibles']) && !empty($_POST['descripcio'])) {
      // Procesar los datos del formulario
      include ("../../Model/Cursos/ModelCrearCurs.php");
      $nouCurs=new CrearCurs($conn);
      $nom_curs = $_POST["nom_curs"];
      $descripcio = $_POST["descripcio"];
      $data_inici = $_POST["data_inici"];
      $data_fi = $_POST["data_fi"];
      $id_professor = $_POST["id_professor"];
      $preu = $_POST["preu"];
      $placesDisponibles = $_POST["placesDisponibles"];
      $id_curs=$nouCurs->crearCrus($nom_curs,$descripcio,$data_inici,$data_fi,$id_professor,$preu,$placesDisponibles);
      header("Location: ../../Views/html/horaris.php?id=".$id_curs."");
      session_start();
      $_SESSION["ErrorCrearCurs"]=0;

    } else {
      // Redirigir al usuario a la página del formulario para que complete los campos requeridos
      header("Location: ../../Views/html/crear_curs.php");
      session_start();
      $_SESSION["ErrorCrearCurs"]=1;
    }
  
?>