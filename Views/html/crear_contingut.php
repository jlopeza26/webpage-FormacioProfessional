<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/ico-removebg.png" type="image/x-icon">
    <title>Crear curs</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <style>
      ::selection {   
        background: orange;
      }
      .crear_curs{
          margin: 2rem;
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
            <h1 class="fw-light">Crear contingut</h1>
            <p class="lead text-muted">Aquesta pàgina proporciona la funcionalitat de crear nous continguts.</p>
            <?php session_start();
              if(isset($_SESSION["ErrorCrearContingut"]) && $_SESSION["ErrorCrearContingut"] == 1){
                  echo "<div class='alert alert-danger col-12 text-center' id='msg-error'>NO POTS DEIXAR CAMPS EN BLANC</div>";
                  $_SESSION["ErrorCrearContingut"] = 0;
              } ?>
          </div>
        </div>
    </section>
        
    <!-- SECTION FORM -->
    <form action="../../Controller/Continguts/ControllerCrearContingut.php" method="POST">
    <section class="py-5 text-center container">

        <div class="input-group mb-3">
            <input type="text" name="nomContingut" class="form-control" placeholder="Nom del contingut" aria-label="Nom del contingut" aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3">
            <input type="text" name="descContingut" class="form-control" placeholder="Descripció del contingut" aria-label="Descripció del contingut" aria-describedby="basic-addon2">
        </div>
        
        <div class="input-group mb-3">
            <input type="text" name="hores" class="form-control" placeholder="Hores" aria-label="Hores" aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <label for="id_professor" class="m-2">Professor</label> 
            <select name="id_professor" class="rounded">
            <option value=""></option>
            <?php include ("../../Controller/Cursos/ControllerOptionProfesors.php") ?>
            </select>
        </div>

        <div class="crear_curs">
            <p><input type="submit" class="btn btn-warning" value="Crear contingut"></p>
        </div>

    </section>
    </form>
</body>
</html>