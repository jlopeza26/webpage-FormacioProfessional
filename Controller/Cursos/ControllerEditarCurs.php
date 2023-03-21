<?php 
  // Verificar si se han enviado los datos del formulario
    // Verificar si los campos requeridos tienen datos
        if(!empty($_POST["id_curs"] && $_POST['nom_curs']) && !empty($_POST['curs_descripcio']) && !empty($_POST['preu']) && !empty($_POST['data_inici']) && !empty($_POST['data_fi']) && !empty($_POST['placesDisponibles']) && !empty($_POST['id_professor'])) {
          // Procesar los datos del formulario
          include ('../../Model/Cursos/ModelEditarCurs.php');
            $nouCurs=new ModelEditarCurs($conn);
            $nomCurs = $_POST["nom_curs"];
            $descripcio = $_POST["curs_descripcio"];
            $dataInici = $_POST["data_inici"];
            $dataFi = $_POST["data_fi"];
            $preu = $_POST["preu"];
            $placesDisponibles = $_POST["placesDisponibles"];
            $id_professor = $_POST["id_professor"];
            $IDCurs = $_POST["id_curs"];
    
            $id_curs=$nouCurs->editarCurs($nomCurs,$descripcio,$dataInici,$dataFi,$id_professor,$preu,$placesDisponibles,$IDCurs);
            //   header("Location: ../../Views/html/relacionar_Curs.php?id=".$id_Curs."");
            header("Location: ../../Views/html/update_img.php?id=".$IDCurs."");
            session_start();
            $_SESSION["ErrorEditarCurs"]=0;
        } else {
            // Redirigir al usuario a la página del formulario para que complete los campos requeridos
            header("Location: ../../Views/html/editar_curs.php");
            session_start();
            $_SESSION["ErrorEditarCurs"]=1;
        }
?>