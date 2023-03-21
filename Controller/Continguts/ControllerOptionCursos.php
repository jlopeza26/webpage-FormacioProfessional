<?php include ("../../Model/Continguts/ModelOptionCursos.php");

$nouRelacioContinguts=new CrearOptionsCursos($conn);

$result = $nouRelacioContinguts->listadoCursos();

$optionCursos = "";
while($cursos=$result->fetch_assoc()) {
    $IdCurs = $cursos["id_curs"];
    $nomCurs = $cursos["nom_curs"];

    $optionCursos .= "<option value=".$IdCurs.">".$nomCurs."</option>";
}
echo $optionCursos;