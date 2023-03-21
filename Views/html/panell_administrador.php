<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Panell Administrador</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/panells.css">
    <link rel="stylesheet" href="../css/font.css">
</head>

<body>
    <!-- NAVBAR -->
    <?php include("../../Controller/Navbar/navbar.php") ?>

    <!-- MAIN -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Opcions d'administrador</h1>
                <p class="lead text-muted">A continuació es mostraran les diferents opcions de les quals disposes com a administrador.</p>
            </div>
        </div>

        <!-- DIFERENTS OPCIONS -->

        <a class="div_curs" href="panell_cursos.php">
            <div class="curs col-sm-6 mx-auto">
                <h2 class="titol_curs">Panell de Cursos</h2>
            </div>
        </a>

        <a class="div_curs" href="alta.php">
            <div class="curs col-sm-6 mx-auto">
                <h2 class="titol_curs">Donar D'alta</h2>
            </div>
        </a>

        <a class="div_curs" href="reserves_totals.php">
            <div class="curs col-sm-6 mx-auto">
                <h2 class="titol_curs">Consultar Reserves</h2>
            </div>
        </a>

        <a class="div_curs" href="panell_continguts.php">
            <div class="curs col-sm-6 mx-auto">
                <h2 class="titol_curs">Panell de continguts</h2>
            </div>
        </a>

    </section>

</body>

</html>