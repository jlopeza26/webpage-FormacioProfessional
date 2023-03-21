<?php

include ('../../Model/Continguts/ModelCursosRelacionats.php'); 

$mostrarContinguts = new ModelCursosRelacionats($conn);

if (isset($_POST["id_contingut"])) {
    $id_contingut = $_POST["id_contingut"];
    $result = $mostrarContinguts->mostrarContinguts($id_contingut);
    $div_continguts = "";
    while($contingut = $result->fetch_assoc()) {
        $nombreCurs = $contingut["nom_curs"];
        $div_continguts .= "<p><b>".$nombreCurs."</b></p>";
    }
    echo $div_continguts;
} else {
    echo "No se proporcionó un ID de contingut";
}


?>