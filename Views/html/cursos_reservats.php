<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Cursos reservats</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/panells.css">
    <link rel="stylesheet" href="../css/font.css">
  </head>
  <body>
    <!-- NAVBAR & DROPDOWN-->
    <?php include ("../../Controller/Navbar/navbar.php") ?>

    <!-- HEADER -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Cursos reservats</h1>
            <p class="lead text-muted">A continuació es mostra un llistat dels cursos que has reservat.</p>
            <?php
              session_start();
              if(isset($_SESSION["eliminar"]) && $_SESSION["eliminar"] == 1){
                  echo "<div class='alert alert-warning col-12 text-center' id='msg-error'>HAS ELIMINAT EL CURS, POTS TORNAR-LO A RESERVAR SI AIXÍ HO DESITGES</div>";
                  $_SESSION["eliminar"] = 0;
              }

              else if(isset($_SESSION["reserva"]))
                if($_SESSION["reserva"] == 1){
                echo "<div class='alert alert-info col-12 text-center' id='msg-error'>JA HAS RESERVAT AQUEST CURS</div>";
                $_SESSION["reserva"] = 0;
                }else if($_SESSION["reserva"]==2){
                  echo "<div class='alert alert-warning col-12 text-center' id='msg-error'>NO POTS RESERVAR CURSOS COM A ADMINISTRADOR</div>";
                  $_SESSION["reserva"] = 0;
                }

            ?>
          </div>
        </div>
        <?php 
            include ('../../Controller/Reserva/ControllerCursosReservats.php');
          ?>
    </section>
</body>
</html>