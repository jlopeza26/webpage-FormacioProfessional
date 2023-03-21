<?php
function register($username, $nom, $cognom, $dni, $email, $numTelf, $password, $confPassword) {
    include ("../../Model/Conexion/connexio_bd.php");

    if ($conn ->connect_error) {
        die("Connection failed: " . $conn ->connect_error);
    }

    $username = mysqli_real_escape_string($conn, $username);
    $nom = mysqli_real_escape_string($conn, $nom);
    $cognom = mysqli_real_escape_string($conn, $cognom);
    $dni = mysqli_real_escape_string($conn, $dni);
    $email = mysqli_real_escape_string($conn, $email);
    $numTelf=mysqli_real_escape_string($conn, $numTelf);
    $password = mysqli_real_escape_string($conn, $password);
    $confPassword = mysqli_real_escape_string($conn, $confPassword);
    
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
    $errorExists = false;
    
    $stmt = $conn->prepare("SELECT email FROM usuari WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultEmailExists = $stmt->get_result();

    if ($resultEmailExists->num_rows > 0) {
        $errorExists = 1;
    }
    
    $stmt2 = $conn->prepare("SELECT username FROM usuari WHERE username = ?");
    $stmt2->bind_param("s", $username);
    $stmt2->execute();
    $resultUsernameExists = $stmt2->get_result();
    
    if ($resultUsernameExists->num_rows > 0) {
        $errorExists = 2;
    }   

    if($errorExists!=0){
        return $errorExists;
    }else{
        // If email does not exist, insert user into table
        $stmt = $conn->prepare("INSERT INTO usuari (username, nom, cognom, dni, email, numero_telefono, password, id_tipo_usuari) VALUES (?,?, ?, ?, ?, ?, ?, 3)");
        $stmt->bind_param("sssssss",$username,$nom,$cognom,$dni,$email,$numTelf,$password_hash);
        $stmt->execute();
        return 0;
    }
    mysqli_close($conn);
}