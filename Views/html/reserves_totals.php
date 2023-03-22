<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Reserves realitzades</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <style>
      ::selection {   
        background: orange;
      }
      .curs {
          border: 2px outset;
          padding: 2%;
      }
      .div_curs {
        color: black;
        text-decoration: none;

        padding: 1%;
      }
      .curs:hover{
        border-color: orange;
      }
      .curs:hover .titol_curs{
        color: orange;
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
            <h1 class="fw-light">Reserves realitzades</h1>
            <p class="lead text-muted">A continuació es mostra un llistat de totes les reserves que s'han realitzar amb tota la informació sobre aquesta.</p>
          </div>
        </div>

      <?php include ("../../Controller/Reserva/ControllerReservasTotals.php") ?>

      <div id="formEnviarCorreu" style="display: none;">
          <button onclick="eliminarForm()">X</button>
          <input id="msg" type="text" name="msg" placeholder="Missatge">
          <input id="asunto" type="text" name="asunto" placeholder="Asunto">
          <button onclick="enviarCorreu();">Enviar Correu</button>
      </div>
    </section>

    <script src="../js/enviarCorreu.js"></script>
    <script src="../js/ajax_dades_usuari.js"></script>
    <script>
      function mostrarForm() {
        document.getElementById("formEnviarCorreu").style.display = "block";
      }
      function eliminarForm() {
        document.getElementById("formEnviarCorreu").style.display = "none";
      }
    </script>
</body>
</html>