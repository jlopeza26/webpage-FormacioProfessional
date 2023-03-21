<?php include ("../../Model/Cursos/ModelOptionProfesors.php");

$nouCurs=new CrearOptionsProfessors($conn);

$result = $nouCurs->listadoProfesors();

$optionProfessor = "";
while($professor=$result->fetch_assoc()) {
    $IdProfessor = $professor["id_profesor"];
    $nomProfessor = $professor["nom"];
    $cognomProfessor = $professor["cognom"];

    $optionProfessor .= "<option value=".$IdProfessor.">".$nomProfessor." ".$cognomProfessor."</option>";
}
echo $optionProfessor;