<?php 
  // Verificar si se han enviado los datos del formulario
  // Verificar si los campos requeridos tienen datos

  if(!empty($_POST['id_curs']) && !empty($_POST["id_contingut"])) {
    // Procesar los datos del formulario
    include ('../../Model/Continguts/ModelCrearRelacioContingut.php');
    $nouContingut=new ModelCrearRelacioContingut($conn);
    $IDCurs = $_POST["id_curs"];
    $IDContingut = $_POST["id_contingut"];
    $id_contingut=$nouContingut->crearRelacioContingut($IDCurs,$IDContingut);
    header("Location: ../../Views/html/relacionar_contingut.php?id=".$IDContingut."");
    session_start();
    $_SESSION["ErrorCrearContingut"]=0;
  } else {
    // Redirigir al usuario a la página del formulario para que complete los campos requeridos
    header("Location: ../../Views/html/relacionar_contingut.php");
    session_start();
    $_SESSION["ErrorCrearContingut"]=1;
  }
?>