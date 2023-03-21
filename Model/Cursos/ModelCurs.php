<?php
// Connexió a la BD
include ("../../Model/Conexion/connexio_bd.php");

class ModelCurs {

    private $conn;
    
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function mostrarCurs($id_curs) {
        $id_curs = mysqli_real_escape_string($this->conn, $id_curs);

    //Buscar datos del curs
        $sql = $this->conn->prepare("SELECT * FROM curs WHERE id_curs = ?"); 
        $sql->bind_param("s", $id_curs);
        $sql->execute();
    //Obtenim el resultat de la consulta
        $result = $sql->get_result();
        $row = mysqli_fetch_assoc($result);

    // Busquem els continguts que estiguin relacionats amb el curs
        $check = $this->conn->prepare("SELECT curs_contingut.*, continguts.*, profesors.nom FROM curs_contingut JOIN continguts ON continguts.id_contingut = curs_contingut.id_contingut JOIN profesors ON continguts.id_profesor = profesors.id_profesor WHERE id_curs = ?");
        $check->bind_param("s", $id_curs);
        $check->execute();
    //Obtenim el resultat de la consulta
        $result2 = $check->get_result();

        $array = $result2->fetch_all(MYSQLI_ASSOC);
        $array_num = count($array);

    //Buscar les imatges del curs
        $sql = $this->conn->prepare("SELECT img FROM img_cursos WHERE id_curs = ?");
        $sql->bind_param("s", $id_curs);
        $sql->execute();
    //Obtenim el resultat de la consulta
        $result = $sql->get_result();
        $img = $result->fetch_all(MYSQLI_ASSOC);

    // Retornem les dades de les consulta
    return array("row" => $row, "array_num" => $array_num, "array" => $array, "img" => $img);
    }
}
