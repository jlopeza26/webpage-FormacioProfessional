<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelUpdateImg {

  private $conn;
    
  public function __construct($conn) {
      $this->conn = $conn;
  }

  public function updateImg($id_curs) 
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

              // Obtener la ruta de la imagen a eliminar
              $sqlImgOld = $this->conn->prepare("SELECT img FROM img_cursos WHERE id_curs = ?");
              $sqlImgOld->bind_param("s", $id_curs);
              $sqlImgOld->execute();
              $result = $sqlImgOld->get_result();

              if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $imgName = $row['img'];

                // Eliminar el archivo actual
                unlink("../../Views/img/$imgName");
              }

              $fileNameNew = uniqid('', true).".".$fileExt;
              $fileDestination = '../../Views/img/'.$fileNameNew;
              move_uploaded_file($fileTmpName, $fileDestination);
              echo "El archivo se ha subido correctamente.";

              // Update la ruta de l'imatge a la taula d'imatges de la BD
              $sql = $this->conn->prepare("UPDATE img_cursos SET img = ? WHERE id_curs= ?");
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