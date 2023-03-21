<?php
include ("../../Model/Conexion/connexio_bd.php");

class CrearHoraris {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function crearHoraris($dia,$hora_inici,$hora_fi,$id_curs){
        $dia = mysqli_real_escape_string($this->conn, $dia);
        $hora_inici = mysqli_real_escape_string($this->conn, $hora_inici);
        $hora_fi = mysqli_real_escape_string($this->conn, $hora_fi);
        $id_curs = mysqli_real_escape_string($this->conn, $id_curs);

        $sql=$this->conn->prepare("INSERT INTO horarios (id_dia_semana,hora_inicio,hora_fin,id_curs) VALUES(?,?,?,?)");
        $sql->bind_param("ssss",$dia,$hora_inici,$hora_fi,$id_curs);
        return $sql->execute();
    }

}