<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
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
            <h1 class="fw-light">Crear cursos</h1>
            <p class="lead text-muted">Aquesta pàgina proporciona la funcionalitat de crear nous cursos.</p>
            <?php session_start();
              if(isset($_SESSION["ErrorCrearCurs"]) && $_SESSION["ErrorCrearCurs"] == 1){
                  echo "<div class='alert alert-danger col-12 text-center' id='msg-error'>NO POTS DEIXAR CAMPS EN BLANC</div>";
                  $_SESSION["ErrorCrearCurs"] = 0;
              } ?>
          </div>
        </div>
    </section>
        
    <!-- SECTION FORM -->
    <form action="../../Controller/Cursos/ControllerCrearCurs.php" method="POST">
    <section class="py-5 text-center container">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
            </div>
            <input type="text" name="nom_curs" class="form-control" placeholder="Nom del curs" aria-label="Nom del curs" aria-describedby="basic-addon1">
        </div>
     
        <div class="input-group mb-3">
          <input type="text" name="data_inici" class="form-control" placeholder="Data inici" aria-label="Data inici" aria-describedby="basic-addon2">
          <div class="input-group-append">
          <span class="input-group-text" id="basic-addon2">Ejemplo: 2008-10-29</span>
          </div>
      </div>

      <div class="input-group mb-3">
        <input type="text" name="data_fi" class="form-control" placeholder="Data fi" aria-label="Data fi" aria-describedby="basic-addon2">
        <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">Ejemplo: 2008-10-29</span>
        </div>
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

      <div class="input-group mb-3">
        <input type="text" name="preu" class="form-control" placeholder="Preu" aria-label="Preu" aria-describedby="basic-addon2">
        <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">€</span>
        </div>
      </div>

      <div class="input-group mb-3">
        <input type="text" name="placesDisponibles" class="form-control" placeholder="Plaçes disponibles" aria-label="Plaçes disponibles" aria-describedby="basic-addon2">
        <div class="input-group-append">
        </div>
      </div>

      <div class="input-group">
          <div class="input-group-prepend">
          <span class="input-group-text">Descripció del curs</span>
          </div>
          <input class="form-control" type="text" name="descripcio" aria-label="With textarea"></input>
      </div>
      <div class="crear_curs">
          <p><input type="submit" class="btn btn-warning" value="Crear curs"></p>
      </div>
    </section>
    </form>
</body>
</html>