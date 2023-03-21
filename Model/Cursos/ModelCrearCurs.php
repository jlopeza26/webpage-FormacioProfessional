<?php

include ("../../Model/Conexion/connexio_bd.php");

class CrearCurs {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function crearCrus($nom_curs,$descripcio,$data_inici,$data_fi,$id_professor,$preu,$placesDisponibles){
        $nom_curs = mysqli_real_escape_string($this->conn, $nom_curs);
        $descripcio = mysqli_real_escape_string($this->conn, $descripcio);
        
        $data_inici = mysqli_real_escape_string($this->conn, $data_inici);
        $data_fi = mysqli_real_escape_string($this->conn, $data_fi);
        $id_professor = mysqli_real_escape_string($this->conn, $id_professor);
        $preu = mysqli_real_escape_string($this->conn, $preu);
        $placesDisponibles = mysqli_real_escape_string($this->conn, $placesDisponibles);

        $sql=$this->conn->prepare("INSERT INTO curs (nom_curs,curs_descripcio,data_inici,data_fi,id_profesor,preu,placesDisponibles) VALUES(?,?,?,?,?,?,?)");
        $sql->bind_param("sssssss",$nom_curs,$descripcio,$data_inici,$data_fi,$id_professor,$preu,$placesDisponibles);
        $sql->execute();
        $id_curs= $sql->insert_id;
        return $id_curs;
    }

}