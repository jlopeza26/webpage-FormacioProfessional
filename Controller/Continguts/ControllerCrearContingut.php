<?php 

include ('../../Model/Continguts/ModelCrearContingut.php');

  // Verificar si se han enviado los datos del formulario

    // Verificar si los campos requeridos tienen datos
    if(!empty($_POST['nomContingut']) && !empty($_POST['descContingut']) && !empty($_POST['hores']) && !empty($_POST['id_professor'])) {
      // Procesar los datos del formulario
      include ("../../Model/Cursos/ModelCrearContingut.php");
      $nouContingut=new ModelCrearContingut($conn);
      $nomContingut = $_POST["nomContingut"];
      $descripcio = $_POST["descContingut"];
      $hores = $_POST["hores"];
      $id_professor = $_POST["id_professor"];
      $id_contingut=$nouContingut->crearContingut($nomContingut,$descripcio,$hores,$id_professor);
      header("Location: ../../Views/html/relacionar_contingut.php?id=".$id_contingut."");
      session_start();
      $_SESSION["ErrorCrearContingut"]=0;
    } else {
      // Redirigir al usuario a la página del formulario para que complete los campos requeridos
      header("Location: ../../Views/html/crear_contingut.php");
      session_start();
      $_SESSION["ErrorCrearContingut"]=1;
    }
  
?>