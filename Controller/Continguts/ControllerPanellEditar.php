<?php

include ('../../Model/Continguts/ModelPanellEditar.php'); 

$mostrarContinguts = new ModelPanellEditar($conn);

$IDContingut = $_GET["id"];

$result = $mostrarContinguts->mostrarContinguts($IDContingut);
// Declarem la variable $div_cusos com a una cadena de string buïda
$div_continguts = "";
// Fem un bucle per que creï aquesta estructura HTML per a cada contingut existent a la taula contingut
while($contingut=$result->fetch_assoc()) {
    $nombreContingut = $contingut["nom_contingut"];
    $desc = $contingut["continguts_descripcio"];
    $hores = $contingut["hores"];

    $div_continguts .= "
        <div class='input-group mb-3'>
            <input type='text' name='nomContingut' class='form-control' placeholder='Nom del contingut' aria-label='Nom del contingut' aria-describedby='basic-addon2' value='".$nombreContingut."'>
        </div>

        <div class='input-group mb-3'>
            <input type='text' name='descContingut' class='form-control' placeholder='Descripció del contingut' aria-label='Descripció del contingut' aria-describedby='basic-addon2' value='".$desc."'>
        </div>
        
        <div class='input-group mb-3'>
            <input type='text' name='hores' class='form-control' placeholder='Hores' aria-label='Hores' aria-describedby='basic-addon2' value='".$hores."'>
        </div>";

}
echo $div_continguts;


?>