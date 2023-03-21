<?php

include ('../../Model/Cursos/ModelPanellEditar.php'); 

$mostrarCursos = new ModelPanellEditar($conn);

$IDCurs= $_GET["id"];

$result = $mostrarCursos->mostrarCursos($IDCurs);
// Declarem la variable $div_cusos com a una cadena de string buïda
$div_cursos = "";
// Fem un bucle per que creï aquesta estructura HTML per a cada contingut existent a la taula contingut
while($contingut=$result->fetch_assoc()) {
    $nomCurs = $contingut["nom_curs"];
    $desc = $contingut["curs_descripcio"];
    $dataInici = $contingut["data_inici"];
    $dataFi = $contingut["data_fi"];
    $preu = $contingut["preu"];
    $placesDisponibles = $contingut["placesDisponibles"];

    $div_cursos .= "
        <div class='input-group mb-3'>
            <input type='text' name='nom_curs' class='form-control' placeholder='Nom del curs' aria-label='Nom del curs' aria-describedby='basic-addon2' value='".$nomCurs."'>
        </div>

        <div class='input-group mb-3'>
            <input type='text' name='curs_descripcio' class='form-control' placeholder='Descripció del curs' aria-label='Descripció del curs' aria-describedby='basic-addon2' value='".$desc."'>
        </div>
        
        <div class='input-group mb-3'>
            <input type='date' name='data_inici' class='form-control' placeholder='dd-mm-yyyy' aria-label='Data Inici' aria-describedby='basic-addon2' value='".$dataInici."'>
        </div>

        <div class='input-group mb-3'>
            <input type='date' name='data_fi' class='form-control' placeholder='dd-mm-yyyy' aria-label='Data Fi' aria-describedby='basic-addon2' value='".$dataFi."'>
        </div>

        <div class='input-group mb-3'>
            <input type='text' name='placesDisponibles' class='form-control' aria-label='Places disponibles' aria-describedby='basic-addon2' value='".$placesDisponibles."'>
        </div>

        <div class='input-group mb-3'>
            <input type='text' name='preu' class='form-control' placeholder='Preu' aria-label='Preu' aria-describedby='basic-addon2' value='".$preu."'>
        </div>";
}
echo $div_cursos;
?>