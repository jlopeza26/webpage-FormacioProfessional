<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelPanellCursos {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function mostrarCurs() {

    //Buscar datos del curs
        $sql = $this->conn->prepare("SELECT * FROM curs"); 
    // Executem la consulta
        $sql->execute();
    //Obtenim el resultat de la consulta
        $result = $sql->get_result();
    // Retornem les dades de la consulta
        return $result;
    }
}
