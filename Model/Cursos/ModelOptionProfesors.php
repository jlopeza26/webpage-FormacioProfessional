<?php

include ("../../Model/Conexion/connexio_bd.php");

class CrearOptionsProfessors {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function listadoProfesors()
    {
        //realizamos la consulta de todos los profesores
        $consulta = $this->conn->prepare("SELECT * FROM profesors");
        $consulta->execute();
        $result = $consulta->get_result();
        $consulta->close();
        return $result;
    }

}