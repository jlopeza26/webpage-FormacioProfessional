<?php

include ('../../Model/Register/ModelAlta.php'); 

//Rebre dades del formulari
$username = $_POST['username'];
$nom = $_POST['nom'];
$cognom = $_POST['cognom'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$password = $_POST['password'];
$confPassword = $_POST['confPassword'];
$tipoDeUsuario = $_POST['tipoUsuario'];
$numTelf = $_POST['numTelf'];

$registerError = alta($username, $nom, $cognom, $dni, $email, $numTelf, $password, $confPassword, $tipoDeUsuario);

if($registerError == 0) {
    header("location:../../Views/html/home_page.php");
} else {
    session_start();
    if($registerError == 2) {
        $_SESSION["error"] = "usernameExists";
    } else if($registerError == 1) {
        $_SESSION["error"] = "emailExists";
    } else if($registerError == 3) {
        $_SESSION["error"] = "dniExists";
    }
    header("location:../../Views/html/alta.php");
}
