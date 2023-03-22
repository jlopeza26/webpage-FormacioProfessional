<?php

include ('../../Model/Reserva/ModelReservasTotals.php'); 

$result = new ReservasTotals($conn);

$reservas = $result->mostrar_resrves();

if($reservas){
    $div_reservas = "";
    while($reserva=$reservas->fetch_assoc()) {
        $email = $reserva["email"];
        $dni = $reserva["dni"];
        $num_telefonic = $reserva["numero_telefono"];
        $nom = $reserva["nom"];
        $cognom = $reserva["cognom"];
        $nomCurs = $reserva["nom_curs"];
        $id_reserva = $reserva["id_reserva"];
        $nom_usuari=$reserva["username"];

        $div_reservas .= '
        <div class="curs col-sm-6 mx-auto" id="reserva_'.$id_reserva.'">
            <h2 class="titol_curs">Reservat per '.$nom_usuari.'</h2>
            <br>
            <p> ID Reserva: '.$id_reserva.'</p>
            <p> Curs Reservat: '.$nomCurs.'</p>

            <div id="dades_'.$id_reserva.'" style="display:none;">
                <p> Email: '.$email.'</p>
                <p> DNI: '.$dni.'</p>
                <p> Número Telefònic: '.$num_telefonic.'</p>
                <p> Nom: '.$nom.'</p>
                <p> Cognom: '.$cognom.'</p>
            </div>
            <input type="button" id="'.$id_reserva.'" class="btn btn-outline-warning" onclick="mostrar_dades('.$id_reserva.')" value="Mostrar dades">
        </div> <br>
      ';
    }
    echo $div_reservas;
}

mysqli_close($conn);
?>