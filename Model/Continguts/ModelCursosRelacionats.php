<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelCursosRelacionats {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function mostrarContinguts($id_contingut) {

    //Buscar datos de continguts
        $sql = $this->conn->prepare("SELECT nom_curs FROM curs JOIN curs_contingut ON curs.id_curs = curs_contingut.id_curs WHERE curs_contingut.id_contingut = ?"); 
        $sql->bind_param("i", $id_contingut);
    // Executem la consulta
        $sql->execute();
    //Obtenim el resultat de la consulta
        $result = $sql->get_result();
    // Retornem les dades de la consulta
        return $result;
    }
}
