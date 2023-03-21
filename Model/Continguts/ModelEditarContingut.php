<?php

include ("../../Model/Conexion/connexio_bd.php");

class ModelEditarContingut {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function editarContingut($nomContingut,$descripcio,$hores,$id_professor,$IDContingut){
        $nomContingut = mysqli_real_escape_string($this->conn, $nomContingut);
        $descripcio = mysqli_real_escape_string($this->conn, $descripcio);
        $hores = mysqli_real_escape_string($this->conn, $hores);
        $id_professor = mysqli_real_escape_string($this->conn, $id_professor);

        $sql=$this->conn->prepare("UPDATE continguts SET nom_contingut = ?,continguts_descripcio = ?,hores = ?,id_profesor = ? WHERE id_contingut = ?");
        $sql->bind_param("sssii",$nomContingut,$descripcio,$hores,$id_professor,$IDContingut);
        $sql->execute();
        // $id_curs= $sql->insert_id;
        // return $id_curs;
    }

}
?>