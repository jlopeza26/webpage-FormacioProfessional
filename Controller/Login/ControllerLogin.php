<?php
// controller.php
include ('../../Model/Login/ModelLogin.php'); // incluimos el archivo con la función de login

// Recibimos los datos del formulario de inicio de sesión
$email = $_POST["email"];
$password = $_POST["password"];

// Llamamos a la función de login y almacenamos el resultado en una variable
$tipoUsuario = login($email, $password);

// Si el resultado es verdadero, el usuario es válido y podemos iniciar sesión
if ($tipoUsuario) {
    session_start();
    $_SESSION["email"]=$email;
    if($tipoUsuario==1){
        $_SESSION["usuari"] = 1;
        header("location:../../Views/html/panell_administrador.php");
    }else if($tipoUsuario==2){
        $_SESSION["usuari"] = 2;
        header("location:../../Views/html/home_page.php"); // redirigimos al usuario a la página de inicio
    }else if($tipoUsuario==3){
        $_SESSION["usuari"] = 3;
        header("location:../../Views/html/home_page.php"); // redirigimos al usuario a la página de inicio
    }
    $_SESSION["error"] = 0;

// Si el resultado es falso, el usuario no es válido y debemos mostrar un error
} else {
    session_start();
    $_SESSION["error"] = 1;
    header("location:../../Views/html/login.php"); // redirigimos al usuario a la página de inicio de sesión con un mensaje de error
}