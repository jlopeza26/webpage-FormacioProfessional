<?php

include ('../../Model/Continguts/ModelPanellContinguts.php'); 

$mostrarContinguts = new ModelPanellContinguts($conn);

$result = $mostrarContinguts->mostrarContinguts();
// Declarem la variable $div_cusos com a una cadena de string buïda
$div_continguts = "";
// Fem un bucle per que creï aquesta estructura HTML per a cada contingut existent a la taula contingut
while($contingut=$result->fetch_assoc()) {
    $IdContingut = $contingut["id_contingut"];
    $nombreContingut = $contingut["nom_contingut"];

    $div_continguts .= 
    "<section class='py-5 text-center container'>
        <div class='div_continguts col-sm-6 mx-auto'>
            <h2 class='fw-normal'>".$nombreContingut."</h2>
            <p><a class='btn btn-secondary' href='relacionar_contingut.php?id=".$IdContingut."'>Relacionar contingut a curs</a></p>
            <p><a class='btn btn-warning' href='editar_contingut.php?id=".$IdContingut."'>Editar contingut</a></p>
            <form action='../../Controller/Continguts/ControllerEliminarContingut.php' method='POST'>
            <input type='hidden' name='id_contingut' value=".$IdContingut.">
            <p><input id='".$IdContingut."' type='button' onclick='mostrar_confirmacion(\"confirmacion_".$IdContingut."\"); mostrar_cursos_relacionats(\"".$IdContingut."\");' class='btn btn-danger contingut' value='Eliminar contingut'></p>
            <div id='confirmacion_".$IdContingut."' style='display:none; padding:15px; widht: 300px;'>
                <p>Estàs segur que vols eliminar aquest contingut?</p>
                <p>Aquest contingut esta vinculat amb el/els curs/cursos:</p>
                <p id='contingut_".$IdContingut."'></p>
                <input id='".$IdContingut."' type='submit' class='btn btn-danger' name='eliminar' onclick='eliminar_contingut(\"".$IdContingut."\")' value='Eliminar contingut'>
                <input type='button' class='btn btn-success' onclick='ocultar_confirmacion(\"confirmacion_".$IdContingut."\")' value='Cancel·lar'>
            </div>
            </form>
        </div>
    </section>";

}
echo $div_continguts;


?>