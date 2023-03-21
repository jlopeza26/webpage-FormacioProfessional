<?php

include ('../../Model/Cursos/ModelCursos.php'); 

$mostrarCursos = new ModelCursos($conn);

$result = $mostrarCursos->mostrarCursos();

$div_cursos = "";
while($curs=$result->fetch_assoc()) {
    $IdCurso = $curs["id_curs"];
    $nombreCurso = $curs["nom_curs"];
    $descripcionCurso = $curs["curs_descripcio"];
    $precioHora = $curs["preu"];
    $imagenCurso = "../img/".$curs["img"]."";

    $div_cursos .= "<div class='col'><div class='card shadow-sm'><img src='".$imagenCurso."' class='bd-placeholder-img card-img-top' width='100%' height='225' xmlns='http://www.w3.org/2000/svg' role='img' preserveAspectRatio='xMidYMid slice' focusable='false'></img>
    <div class='card-body'>
        <p class='card-text'>".$nombreCurso."</p>
        <p class='card-text'>".$descripcionCurso."</p>
            <div class='d-flex justify-content-between align-items-center'>
                <div class='btn-group'>
                    <button type='button' class='btn btn-sm btn-outline-secondary' onclick=window.location.href='curs.php?id=".$IdCurso."'>Veure</button>";
                    session_start(); 
                    if(isset($_SESSION["usuari"]) && $_SESSION["usuari"] == 1){ 
                    $div_cursos .= "<button onclick=window.location.href='panell_cursos.php' type='button' class='btn btn-sm btn-outline-secondary'>Edit</button>"; 
                    }
                $div_cursos .= "</div>
                <small class='text-muted'>".$precioHora."€</small>
            </div>
        </div>
    </div>
</div>";
}
echo $div_cursos;
?>