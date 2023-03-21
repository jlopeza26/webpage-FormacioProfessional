<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelPanellEditar {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function mostrarCursos($IDCurs) {
    //Buscar datos de continguts
        $sql = $this->conn->prepare("SELECT * FROM curs WHERE id_curs=$IDCurs"); 
    // Executem la consulta
        $sql->execute();
    //Obtenim el resultat de la consulta
        $result = $sql->get_result();
    // Retornem les dades de la consulta
        return $result;
    }
}
