<?php

include ("../../Model/Conexion/connexio_bd.php");

class EliminarContingut {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }
  
    public function eliminarContingut($id_contingut) {
        $id_contingut = mysqli_real_escape_string($this->conn, $id_contingut);

        $eliminarContingut=$this->conn->prepare("DELETE FROM curs_contingut WHERE id_contingut = ?");
        $eliminarContingut->bind_param("i",$id_contingut);
        $eliminarContingut->execute();

        $eliminarContingut=$this->conn->prepare("DELETE FROM continguts WHERE id_contingut = ?");
        $eliminarContingut->bind_param("i",$id_contingut);
        $eliminarContingut->execute();

    }
  
}