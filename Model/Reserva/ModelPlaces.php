<?php

include ("../../Model/Conexion/connexio_bd.php");

class MostrarPlaces {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function places($placesDispo, $id_curs){
        $placesDispo = mysqli_real_escape_string($this->conn, $placesDispo);
        $id_curs = mysqli_real_escape_string($this->conn, $id_curs);

        $sql=$this->conn->prepare("SELECT placesDisponibles FROM curs WHERE id_curs = ?");
        $sql->bind_param("i",$id_curs);
        $sql->execute();
        $result=$sql->get_result();

        return $result;
    }

}