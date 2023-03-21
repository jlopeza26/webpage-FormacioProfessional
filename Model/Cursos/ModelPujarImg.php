<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelPujarImg {

  private $conn;
  
  public function __construct($conn) {
      $this->conn = $conn;
  }

  public function pujarImg($id_curs)
  {
    if (isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
      
        $fileExt = strtolower(end(explode('.', $fileName)));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');
      
        if (in_array($fileExt, $allowed)) {
          if ($fileError === 0) {
            if ($fileSize < 1000000) {
              $fileNameNew = uniqid('', true).".".$fileExt;
              $fileDestination = '../../Views/img/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);
              header("Location: ../../Views/html/panell_cursos.php");

              // Insertar la ruta de l'imatge a la taula d'imatges de la BD
              $sql=$this->conn->prepare("INSERT INTO img_cursos (img, id_curs) VALUES(?,?)");
              $sql->bind_param("ss",$fileNameNew,$id_curs);
              return $sql->execute();

            } else {
              $mensaje = "L'arxiu és molt gran.";
              header("location:../../Views/html/pujar_img.php?error=".urlencode($mensaje)); // redirigimos al usuario a la página de pujar_img con el mensaje en la URL
              exit();
            }
          } else {
            $mensaje = "Ha ocorregut un error en pujar l'arxiu.";
            header("location:../../Views/html/pujar_img.php?error=".urlencode($mensaje)); // redirigimos al usuario a la página de pujar_img con el mensaje en la URL
            exit();
          }
        } else {
          $mensaje = "No es permeten arxius d'aquest tipus.";
          header("location:../../Views/html/pujar_img.php?error=".urlencode($mensaje)); // redirigimos al usuario a la página de pujar_img con el mensaje en la URL
          exit();
        }
      }
  }
}

?>