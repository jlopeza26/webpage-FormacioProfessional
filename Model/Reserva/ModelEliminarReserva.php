<?php
// function eliminarReserva($id_reserva){
//     include ("../../Model/Conexion/connexio_bd.php");

//     $id_reserva = mysqli_real_escape_string($conn, $id_reserva);

//     $sql=$conn->prepare("DELETE FROM reserva WHERE id_reserva = '?'");
//     $sql->bind_param("s",$id_reserva);
//     $sql->execute(); 
//     $result = $sql->get_result();

//     return $result;
//}

include ("../../Model/Conexion/connexio_bd.php");

class EliminarReserva {

    private $conn;
  
    public function __construct($conn) {
      $this->conn = $conn;
    }
  
    public function eliminarReserva($id_reserva) {
        $id_reserva = mysqli_real_escape_string($this->conn, $id_reserva);

        $sql1=$this->conn->prepare("SELECT * FROM reserva WHERE id_reserva = ?");
        $sql1->bind_param("s",$id_reserva);
        $sql1->execute(); 
        $result = $sql1->get_result();
        $row = mysqli_fetch_assoc($result);

        $sql=$this->conn->prepare("DELETE FROM reserva WHERE id_reserva = ?");
        $sql->bind_param("s",$id_reserva);
        $sql->execute(); 

        $id_curs=$row["id_curs"];
        $sql2 = $this->conn->prepare("INSERT INTO moviments VALUES (null,?,'cancelar');");
        $sql2->bind_param("s", $id_curs);
        $sql2->execute();

        session_start();
        $_SESSION["eliminar"]=1;

    }
  
}