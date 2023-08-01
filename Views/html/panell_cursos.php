<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/ico-removebg.png" type="image/x-icon">
    <title>Panell de cursos</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <style>
        .div_cursos {
            border: 2px outset;
            padding: 2%;
        }
    </style>
  </head>
  <body>
    <!-- NAVBAR & DROPDOWN-->
    <?php include ("../../Controller/Navbar/navbar.php") ?>
    <!-- HEADER -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Panell de cursos</h1>
            <p class="lead text-muted">Aquesta pàgina proporciona la funcionalitat d'editar/esborrar els cursos existents i crear de nous.</p>
            <p><a class="btn btn-info" href="crear_curs.php">Afegir curs</a></p>
          </div>
        </div>
    </section>
    <!-- SECTION LLISTA CURSOS -->
    <?php include ("../../Controller/Cursos/ControllerPanellCursos.php") ?>

</body>
<script src="../js/mostrar_error.js"></script>
</html>