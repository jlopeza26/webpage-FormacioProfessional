<?php

include ("../../Model/Conexion/connexio_bd.php");

class ModelEditarCurs {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function editarCurs($nomCurs,$descripcio,$dataInici,$dataFi,$id_professor,$preu,$placesDisponibles,$IDCurs){
        $nomCurs = mysqli_real_escape_string($this->conn, $nomCurs);
        $descripcio = mysqli_real_escape_string($this->conn, $descripcio);
        $dataInici = mysqli_real_escape_string($this->conn, $dataInici);
        $dataFi = mysqli_real_escape_string($this->conn, $dataFi);
        $preu = mysqli_real_escape_string($this->conn, $preu);
        $placesDisponibles = mysqli_real_escape_string($this->conn, $placesDisponibles);
        $id_professor = mysqli_real_escape_string($this->conn, $id_professor);
        $IDCurs = mysqli_real_escape_string($this->conn, $IDCurs);

        $sql=$this->conn->prepare("UPDATE curs SET nom_curs = ?, curs_descripcio = ?, data_inici = ?, data_fi = ?, id_profesor = ?, preu = ?, placesDisponibles = ? WHERE id_curs = ?");
        $sql->bind_param("ssssiiii",$nomCurs,$descripcio,$dataInici,$dataFi,$id_professor,$preu,$placesDisponibles,$IDCurs);
        $sql->execute();
        // $id_curs= $sql->insert_id;
        // return $id_curs;
    }

}
?>