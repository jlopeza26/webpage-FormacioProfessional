<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelCursos {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function mostrarCursos() {

    //Buscar datos del curs
        $sql = $this->conn->prepare("SELECT * FROM curs JOIN img_cursos WHERE img_cursos.id_curs = curs.id_curs"); 
    // Executem la consulta
        $sql->execute();
    //Obtenim el resultat de la consulta
        $result=$sql->get_result();
    // Retornem les dades de la consulta
        return $result;
    }
}