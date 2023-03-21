<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Pàgina Principal</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scroll.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <style>
      ::selection {   
        background: orange;
      }




      
    </style>
  </head>
  <body>
    <!-- NAVBAR & DROPDOWN-->
    <?php include ("../../Controller/Navbar/navbar.php") ?>
    <!-- HEADER -->
    <div>
      <div class="col-md-6 px-0">
        <!-- <h1 class="display-4 fst-italic" style="font-weight: bold; -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: black; font-family:arial;">Formació Professional</h1> -->
      </div>
    </div>
   
    <!-- SECTION CURSOS -->
    <section id="cursos" class="py-5 text-center container">
      <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
          <h1 class="fw-light">Oferta de cursos</h1>
          <p class="lead text-muted">Aquests són el curssos el cursos que tenim disponibles.</p>

        </div>
      </div>
    </section>
    <!-- CARDS  -->
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <?php 
          
          include ('../../Controller/Cursos/ControllerCursos.php');
        
        ?>
      </div>
    </div>
    <!-- FOOTER -->
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2023 Formació Professional</p>
    
        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        </a>
    
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pàgina Principal</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Cursos</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Atenció al client</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Sobre nosaltres</a></li>
        </ul>
      </footer>
    </div>

  </body>
</html>