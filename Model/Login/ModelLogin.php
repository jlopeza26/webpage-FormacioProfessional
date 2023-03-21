<?php
function login($email, $password) {
    include ("../../Model/Conexion/connexio_bd.php");

    if ($conn ->connect_error) {
        die("Connection failed: " . $conn ->connect_error);
    }

    //EVITAR MYSQL INYECTIONS

    //Preparem la consulta sql
    // $sql=$conn->prepare("SELECT * FROM usuari WHERE email = ? and password = ?");
    $sql=$conn->prepare("SELECT password FROM usuari WHERE email = ?");

    //Vinculem els paràmetros a la consulta
    // $sql->bind_param("ss",$email,$password);
    $sql->bind_param("s",$email);

    //Executem la consulta
    $sql->execute();

    //Obtenim el resultat
    $resultado=$sql->get_result();
    $rows=mysqli_num_rows($resultado);
    $user=$resultado->fetch_assoc();

    //IDENTIFICAR
    $resultTipo = $conn->query("SELECT id_tipo_usuari FROM usuari WHERE email = '$email' ");
    $rowTipo = $resultTipo->fetch_assoc();
    $tipoUsuario = $rowTipo["id_tipo_usuari"];

    if($rows && password_verify($password, $user['password'])){
        return $tipoUsuario;
    }else{
        return false;
    }
    mysqli_close($conn);
}