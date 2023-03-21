<?php

include ("../../Model/Conexion/connexio_bd.php");

class ModelCrearContingut {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function crearContingut($nomContingut,$descripcio,$hores,$id_professor){
        $nomContingut = mysqli_real_escape_string($this->conn, $nomContingut);
        $descripcio = mysqli_real_escape_string($this->conn, $descripcio);
        $hores = mysqli_real_escape_string($this->conn, $hores);
        $id_professor = mysqli_real_escape_string($this->conn, $id_professor);

        $sql=$this->conn->prepare("INSERT INTO continguts (nom_contingut,continguts_descripcio,hores,id_profesor) VALUES(?,?,?,?)");
        $sql->bind_param("sssi",$nomContingut,$descripcio,$hores,$id_professor);
        $sql->execute();
        $id_curs= $sql->insert_id;
        return $id_curs;
    }

}