<?php

include ("../../Model/Conexion/connexio_bd.php");

class ReservasTotals {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }

    public function mostrar_resrves(){
        $sql=$this->conn->prepare("SELECT reserva.id_reserva, usuari.*, curs.nom_curs FROM reserva 
        JOIN usuari ON reserva.id_usuari = usuari.id_usuari 
        JOIN curs ON reserva.id_curs = curs.id_curs");
        $sql->execute();
        return $sql->get_result();
    }
}