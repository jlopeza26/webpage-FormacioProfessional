<?php

include ("../../Model/Conexion/connexio_bd.php");

class CrearOptionsCurs {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }
    
    public function listadoCurs()
    {
        //realizamos la consulta de todos los profesores
        $consulta = $this->conn->prepare("SELECT * FROM curs");
        $consulta->execute();
        $result = $consulta->get_result();
        $consulta->close();
        return $result;
    }

}