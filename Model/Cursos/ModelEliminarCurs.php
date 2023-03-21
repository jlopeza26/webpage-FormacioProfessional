<?php

include ("../../Model/Conexion/connexio_bd.php");

class EliminarCurs {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }
  
    public function eliminarCurs($id_curs) {
        $id_curs = mysqli_real_escape_string($this->conn, $id_curs);

        $eliminarReserva=$this->conn->prepare("DELETE FROM reserva WHERE id_curs = ?");
        $eliminarReserva->bind_param("s",$id_curs);
        $eliminarReserva->execute();

        $eliminarHorarios=$this->conn->prepare("DELETE FROM horarios WHERE id_curs = ?");
        $eliminarHorarios->bind_param("s",$id_curs);
        $eliminarHorarios->execute();

        $eliminarHorarios=$this->conn->prepare("DELETE FROM img_cursos WHERE id_curs = ?");
        $eliminarHorarios->bind_param("s",$id_curs);
        $eliminarHorarios->execute();

        $eliminarHorarios=$this->conn->prepare("DELETE FROM curs_contingut WHERE id_curs = ?");
        $eliminarHorarios->bind_param("s",$id_curs);
        $eliminarHorarios->execute();

        $eliminarCurs=$this->conn->prepare("DELETE FROM curs WHERE id_curs = ?");
        $eliminarCurs->bind_param("s",$id_curs);
        $eliminarCurs->execute();

    }
  
}