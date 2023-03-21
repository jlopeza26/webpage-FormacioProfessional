<?php

include ("../../Model/Conexion/connexio_bd.php");

class ReservarCursoModel {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }
  
    public function reservarCurso($email, $id_curs) {
      $email = mysqli_real_escape_string($this->conn, $email);
      $id_curs = mysqli_real_escape_string($this->conn, $id_curs);
  
      //Buscar datos del usuario a partir de su correo electrónico
      $sql = $this->conn->prepare("SELECT * FROM usuari WHERE email = ?"); 
      $sql->bind_param("s", $email);
      $sql->execute();
  
      $result = $sql->get_result();
      $row = mysqli_fetch_assoc($result);
  
      //Insertar un campo en la tabla de reserva utilizando su id
      
      $id_usuario = $row["id_usuari"];
      $tipo_usuari=$row["id_tipo_usuari"];

      $check = $this->conn->prepare("SELECT * FROM reserva 
      WHERE id_usuari = ? AND id_curs = ?");
      $check->bind_param("ss",$id_usuario, $id_curs);
      $check->execute();

      $result2 = $check->get_result();
      $row2 = mysqli_fetch_assoc($result2);

      if($row2){
        $_SESSION["reserva"]=1;
      }else if ($tipo_usuari==1){
        $_SESSION["reserva"]=2;
      }
      else{
        $sql1 = $this->conn->prepare("INSERT INTO reserva (id_usuari, id_curs) VALUES (?,?)");
        $sql1->bind_param("ss", $id_usuario, $id_curs);
        $sql1->execute();
    
        //Reducir en 1 el número de plazas disponibles en el curso
        $sql2 = $this->conn->prepare("UPDATE curs SET placesDisponibles = placesDisponibles-1 WHERE id_curs = ?");
        $sql2->bind_param("s", $id_curs);
        $sql2->execute();
        $_SESSION["reserva"]=0;
      }


    }
  
}



