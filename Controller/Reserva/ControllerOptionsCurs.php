<?php include ("../../Model/Reserva/ModelOptionsCurs.php");

$nouCurs=new CrearOptionsCurs($conn);

$result = $nouCurs->listadoCurs();

$optionCurs = "";
while($curs=$result->fetch_assoc()) {
    $id_curs = $curs["id_curs"];
    $nom = $curs["nom_curs"];

    $optionCurs .= "<option value=".$id_curs.">".$nom."</option>";
}
echo $optionCurs;