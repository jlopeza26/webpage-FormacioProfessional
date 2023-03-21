<?php 
  // Verificar si se han enviado los datos del formulario
    // Verificar si los campos requeridos tienen datos
        if(!empty($_POST["id_contingut"] && $_POST['nomContingut']) && !empty($_POST['descContingut']) && !empty($_POST['hores']) && !empty($_POST['id_professor'])) {
          // Procesar los datos del formulario
          include ('../../Model/Continguts/ModelEditarContingut.php');
            $nouContingut=new ModelEditarContingut($conn);
            $nomContingut = $_POST["nomContingut"];
            $descripcio = $_POST["descContingut"];
            $hores = $_POST["hores"];
            $id_professor = $_POST["id_professor"];
            $IDContingut = $_POST["id_contingut"];
    
            $id_contingut=$nouContingut->editarContingut($nomContingut,$descripcio,$hores,$id_professor,$IDContingut);
            //   header("Location: ../../Views/html/relacionar_contingut.php?id=".$id_contingut."");
            header("Location: ../../Views/html/panell_continguts.php");
            session_start();
            $_SESSION["ErrorEditarContingut"]=0;
        } else {
            // Redirigir al usuario a la página del formulario para que complete los campos requeridos
            header("Location: ../../Views/html/editar_contingut.php");
            session_start();
            $_SESSION["ErrorEditarContingut"]=1;
        }
?>