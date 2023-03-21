<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelPanellEditar {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function mostrarContinguts($IDContingut) {
    //Buscar datos de continguts
        $sql = $this->conn->prepare("SELECT * FROM continguts WHERE id_contingut=$IDContingut"); 
    // Executem la consulta
        $sql->execute();
    //Obtenim el resultat de la consulta
        $result = $sql->get_result();
    // Retornem les dades de la consulta
        return $result;
    }
}
