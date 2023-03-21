<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Relacionar Contingut</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/panells.css">
    <link rel="stylesheet" href="../css/font.css">
</head>

<body>
    <!-- NAVBAR & DROPDOWN-->
    <?php include("../../Controller/Navbar/navbar.php") ?>

    <!-- HEADER -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Relacionar Contingut</h1>
                <p class="lead text-muted">Relaciona un contingut amb els cursos existents</p>
                <?php session_start();
                if (isset($_SESSION["ErrorCrearHoraris"]) && $_SESSION["ErrorCrearHoraris"] == 1) {
                    echo "<div class='alert alert-danger col-12 text-center' id='msg-error'>NO POTS DEIXAR CAMPS EN BLANC</div>";
                    $_SESSION["ErrorCrearHoraris"] = 0;
                } ?>
            </div>
        </div>

        <form action="../../Controller/Continguts/ControllerCrearRelacioContingut.php" method="POST">
            <div class="curs col-sm-6 mx-auto">
                <h2 class="titol_curs"></h2>
                    <div class="input-group mb-3">
                        <label for="id_curs" class="m-2">Curs</label>
                        <select name="id_curs" class="rounded">
                            <option value=""></option>
                            <?php include("../../Controller/Continguts/ControllerOptionCursos.php") ?>
                        </select>
                    </div>
            </div>

            <input type="hidden" name="id_contingut" value=<?= $_GET["id"] ?>>

            <br>
            <input type="submit" class="btn btn-warning" value="Afegir relació">
            <a href="panell_continguts.php"><input type="button" class="btn btn-info" value="Tornar a el panell"></a>
        </form>
    </section>
</body>

</html>