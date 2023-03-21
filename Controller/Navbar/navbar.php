<?php

function mostrarNavbar() {
    $navbar = "";
    $navbar .= '<div class="collapse" id="navbarToggleExternalContent"><div class="bg-dark p-4"><h5 class="text-white h4">Collapsed content</h5><span class="text-white">Toggleable via the navbar brand.</span></div></div><nav class="navbar navbar-dark bg-dark"><div class="container-fluid"><a href="home_page.php"><img src="../img/logo_blanco.png" alt="Logo Formació Professional" style="width: 100px;"></a><a href="#" class="d-block link-dark text-decoration-none dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false"><img src="../img/usuario.png" alt="mdo" class="rounded-circle" width="32" height="32"></a><ul id="user_dropdown_menu" class="dropdown-menu text-small" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(0px, 34px);" data-popper-placement="bottom-end"><li><a class="dropdown-item" href="home_page.php">Pàgina Principal</a></li><li><a class="dropdown-item" href="cursos_reservats.php">Mis Cursos</a></li>';
            session_start();
            if(isset($_SESSION["usuari"]) && $_SESSION["usuari"] == 1){
    $navbar .= "<li><a class='dropdown-item' href='panell_administrador.php'>Panell Administrador</a></li>";
            }
    $navbar .= '<li><hr class="dropdown-divider"></li><li><a class="dropdown-item" href="login.php">Sign out</a></li></ul></div></nav>';
  return $navbar;
}

$navbar = mostrarNavbar();

echo $navbar;

?>