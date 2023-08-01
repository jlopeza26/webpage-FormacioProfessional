<?php

include ('../../Model/Register/ModelRegister.php'); 

//Rebre dades del formulari
$username = $_POST['username'];
$nom = $_POST['nom'];
$cognom = $_POST['cognom'];
$dni = $_POST['dni'];
$email = $_POST['email'];
$password = $_POST['password'];
$confPassword = $_POST['confPassword'];
$numTelf = $_POST['numTelf'];

$registerError = register($username, $nom, $cognom, $dni, $email, $numTelf, $password, $confPassword);

if($registerError == 0) {
    header("location:../../Views/html/login.php");
} else {
    session_start();
    if($registerError == 2) {
        $_SESSION["error"] = "usernameExists";
    } else if($registerError == 1) {
        $_SESSION["error"] = "emailExists";
    } else if($registerError == 3) {
        $_SESSION["error"] = "dniExists";
    }
    header("location:../../Views/html/register.php");
}
