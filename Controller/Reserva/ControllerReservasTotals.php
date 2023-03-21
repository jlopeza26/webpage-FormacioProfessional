<?php

include ('../../Model/Reserva/ModelReservasTotals.php'); 

$result = new ReservasTotals($conn);

$reservas = $result->mostrar_resrves();

if($reservas){
    $div_reservas = "";
    while($reserva=$reservas->fetch_assoc()) {
        $email = $reserva["email"];
        $nomCurs = $reserva["nom_curs"];
        $id_reserva = $reserva["id_reserva"];

        $div_reservas .= '
        <div class="curs col-sm-6 mx-auto">
            <h2 class="titol_curs">Reserva '.$id_reserva.'</h2>
            <br>
            <p> ID Reserva: '.$id_reserva.'</p>
            <p> Curs Reservat: '.$nomCurs.'</p>
            <p id="email" email='.$email.'> Email del usuari: '.$email.'</p>
            <button onclick="mostrarForm()">Enviar Correu</button>
        </div> <br>
      ';
}
echo $div_reservas;

}

mysqli_close($conn);