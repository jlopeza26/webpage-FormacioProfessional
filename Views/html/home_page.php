<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-WV6JM83');</script>
  <!-- End Google Tag Manager -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../css/font.css">
  <link rel="stylesheet" href="../css/home_page.css">
    <link rel="shortcut icon" href="../img/ico-removebg.png" type="image/x-icon">
  <title>Pàgina Principal</title>
</head>

<body>

  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WV6JM83"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <!-- NAVBAR & DROPDOWN-->
  <?php include("../../Controller/Navbar/navbar.php") ?>

  <!-- HEADER -->

  <!-- <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-dark text-white vh-100">
    <div class="container-fluid h-100">
      <div class="row h-100 align-items-center justify-content-center">
        <div class="col-md-5 p-lg-5 my-5">
          <h1 class="display-4 font-weight-normal">Formació Profesional</h1>
          <p class="lead font-weight-normal">El teu futur comença aquí: Descobreix el nostre ampli catàleg de cursos i comença a construir el teu camí cap a l'èxit.</p>
          <a class="btn btn-outline-secondary" href="#cursos">Cursos</a>
        </div>
        <div class="product-device box-shadow d-none d-md-block"></div>
        <div class="product-device product-device-2 box-shadow d-none d-md-block"></div>
      </div>
    </div>
  </div> -->

  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-7 mx-auto text-center">
          <h1 class="display-4 font-weight-normal">Formació Professional</h1>
          <p class="lead font-weight-normal">El teu futur comença aquí: Descobreix el nostre ampli catàleg de cursos i comença a construir el teu camí cap a l'èxit.</p>
          <a class="btn btn-outline-light" href="#cursos">Cursos</a>
        </div>
      </div>
    </div>
  </div>


  <!-- SECTION CURSOS -->
  <section id="cursos" class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Oferta de cursos</h1>
        <p class="lead text-muted">Aquests són el cursos que tenim disponibles.</p>
      </div>
    </div>
  </section>
  <!-- CARDS  -->
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      <?php

      include('../../Controller/Cursos/ControllerCursos.php');

      ?>
    </div>
  </div>
  <!-- FOOTER -->
  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">© 2023 Formació Professional</p>

      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap"></use>
        </svg>
      </a>

      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"><img id="flecha-arriba" src="../img/arrow-up.svg" alt="arrow-up" height="30px" width="30px"></a></li>
      </ul>
    </footer>
  </div>

  <!-- COOKIES -->
    <div class="aviso-cookies" id="aviso-cookies">
      <img class="galleta" src="../img/cookie.svg" alt="Galleta">
      <h3 class="titulo">Cookies</h3>
      <p class="parrafo">Utilizamos cookies propias y de terceros para mejorar nuestros servicios.</p>
      <button class="boton" id="btn-aceptar-cookies">De acuerdo</button>
      <a class="enlace" href="aviso-cookies.html">Aviso de Cookies</a>
    </div>
    <div class="fondo-aviso-cookies" id="fondo-aviso-cookies"></div>
  <!-- END COOKIES -->

  <script src="../js/aviso-cookies.js"></script>
</body>

</html>