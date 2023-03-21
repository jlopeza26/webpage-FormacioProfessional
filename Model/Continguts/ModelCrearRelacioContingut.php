<?php

include ("../../Model/Conexion/connexio_bd.php");

class ModelCrearRelacioContingut {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function crearRelacioContingut($IDCurs,$IDContingut){
        $IDCurs = mysqli_real_escape_string($this->conn, $IDCurs);
        $IDContingut = mysqli_real_escape_string($this->conn, $IDContingut);

        $sql=$this->conn->prepare("INSERT INTO curs_contingut (id_curs, id_contingut) VALUES(?,?)");
        $sql->bind_param("ii",$IDCurs,$IDContingut);
        $sql->execute();
        $id_curs= $sql->insert_id;
        return $id_curs;
    }

}