<?php
function mostrar_cursos_reservats($email){

    include ("../../Model/Conexion/connexio_bd.php");
    
    $email = mysqli_real_escape_string($conn, $email);
    
    //Buscar datos del usuario a partir de su correo electrónico
    $sql = $conn->prepare("SELECT reserva.*, usuari.id_usuari, curs.id_curs, curs.nom_curs, curs.preu FROM reserva 
    JOIN usuari ON reserva.id_usuari = usuari.id_usuari
    JOIN curs ON reserva.id_curs = curs.id_curs
    WHERE usuari.email = ?"); 
    $sql->bind_param("s", $email);
    $sql->execute();
    
    $result = $sql->get_result();
    
    $count = $conn->prepare("SELECT COUNT(*) FROM (SELECT reserva.id_reserva FROM reserva
    JOIN usuari ON reserva.id_usuari = usuari.id_usuari
    WHERE usuari.email = ?) AS reservas_realizadas");
    $count->bind_param("s", $email);
    $count->execute();
    $count_result = $count->get_result();
    $count_row = $count_result->fetch_row();
    $count = $count_row[0];
    
    return $result;
}