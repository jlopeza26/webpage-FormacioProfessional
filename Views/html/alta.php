<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="shortcut icon" href="../img/ico-removebg.png" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;700;900&display=swap" rel="stylesheet">
    <!-- Mis estilos -->
    <link rel="stylesheet" href="../css/register.css">
</head>
<body class="container-fluid">
<!-- img -->
    <main class="row">

        <section class="col-md-6" id="panel-left">
            <div class="container">
                <div class="row mb-5">
                    <h2 class="col-12 text-center" style="color:black;">Donar Alta</h2>
                    <?php
                        session_start();
                        if(isset($_SESSION["error"]) && $_SESSION["error"] == "emailExists"){
                            echo "<div class='alert alert-danger col-12 text-center' id='msg-error'>El correu electrònic ja està registrat</div>";
                            $_SESSION["error"] = "";
                        }
                        if(isset($_SESSION["error"]) && $_SESSION["error"] == "usernameExists"){
                            echo "<div class='alert alert-danger col-12 text-center' id='msg-error'>El nom d'usuari no està disponible</div>";
                            $_SESSION["error"] = "";
                        }
                    ?>  
                </div>

                <div class="row">                    
                    <form action="../../Controller/Register/ControllerAlta.php" method="post" class="col-12 col-md-8 offset-md-2" id="myForm">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Nom d'usuari" value="">
                            <p class="er-" id="er-username" style="color:rgb(248, 82, 82);"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                            <p class="er-" id="er-nom"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="cognom" id="cognom" placeholder="Cognom" >
                            <p class="er-" id="er-cognom"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI o NIE" >
                            <p class="er-" id="er-dni"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" id="email" placeholder="Mail" >
                            <p class="er-" id="er-mail"></p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="numTelf" id="numTelf" placeholder="Número telefònic" ">
                            <p class="er-" id="er-telf"></p>
                        </div>
                        <div class="form-group">
                            <div class="d-inline-block">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contrasenya">
                            </div>
                            <div class="d-inline-block" id="eyes" onclick="showPass()">
                                <img src="../img/eye-slash.svg" alt="eye">
                            </div>
                            <p class="er-" id="er-pas"></p>
                        </div>

                        <div class="form-group">
                            <div class="d-inline-block">
                                <input type="password" class="form-control" name="confPassword" id="confPassword" placeholder="Confirmar Contrasenya">
                            </div>
                            <div class="d-inline-block" id="ceyes" onclick="showCPass()">
                                <img src="../img/eye-slash.svg" alt="eye">
                            </div>
                            <p class="er-" id="er-cpas"></p>
                        </div>
<!-- 
                        <div class="form-group">
                            <input type="text" class="form-control" name="tipoUsuario" id="tipoUsuario" placeholder="Tipo de Usuario" ">
                            <p class="er-" id="er-cpas"></p>
                        </div> -->
                        <select id="tipoUsuario" name="tipoUsuario" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="">Tipus d'usuari</option>
                            <option value="1">Administrador</option>
                            <option value="2">Professor</option>  
                        </select>
                        <p class="er-" id="er-tip"></p>
                        <span></span>
                        <div class="form-group text-center pt-4">
                            <input type="submit" id="loginbtn2" class="btn" value="Registrar" >
                        </div>

                    </form>
                </div>
                <div class="row mt-5">
                    <div class="col-12 links text-center">
                        <div>
                            <a href="panell_administrador.php">Tornar</a>
                        </div>        
                    </div>
                </div>
            </div>
        </section>



        <section class="col-md-6" id="panel-right">
           
        <div class="container align-self-center" style="margin-top:-150px; user-select: none;">
            <div class="row mt-5">                    
                    <div class="col-12 logo-container d-flex justify-content-center">
                        <img src="../img/logo1.png" alt="l1">
                    </div>
                </div>
                <div class="row">
                    <h1 class="col-12 text-center">APLICATION<br>SIGN UP PAGE</h1>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="../js/alta.js"></script>
</html>