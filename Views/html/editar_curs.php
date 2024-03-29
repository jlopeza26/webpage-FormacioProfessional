<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/ico-removebg.png" type="image/x-icon">
    <title>Editar contingut</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/font.css">
    <style>
        ::selection {
            background: orange;
        }

        .crear_curs {
            margin: 2rem;
        }
    </style>
</head>

<body>
    <!-- NAVBAR & DROPDOWN-->
    <?php include("../../Controller/Navbar/navbar.php") ?>

    <!-- HEADER -->
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Editar curs</h1>
                <p class="lead text-muted">Aquesta pàgina proporciona la funcionalitat d'editar nous cursos.</p>
                <?php session_start();
                if (isset($_SESSION["ErrorEditarCurs"]) && $_SESSION["ErrorEditarCurs"] == 1) {
                    echo "<div class='alert alert-danger col-12 text-center' id='msg-error'>NO POTS DEIXAR CAMPS EN BLANC</div>";
                    $_SESSION["ErrorEditarCurs"] = 0;
                } ?>
            </div>
        </div>
    </section>

    <!-- SECTION FORM -->

    <form action='../../Controller/Cursos/ControllerEditarCurs.php' method='POST'>
        <section class='py-5 text-center container'>

            <?php include("../../Controller/Cursos/ControllerPanellEditar.php") ?>

            <div class='input-group mb-3'>
                <div class='input-group-prepend'>
                </div>
                <label for='id_professor' class='m-2'>Professor</label>
                <select name='id_professor' class='rounded'>
                    <option value=''></option>
                    <?php include('../../Controller/Cursos/ControllerOptionProfesors.php') ?>
                </select>
            </div>

            <input type='hidden' name='id_curs' value=<?= $_GET['id'] ?>>

            <div class='crear_curs'>
                <input type='submit' class='btn btn-warning' value='Editar curs'>
                <a class='btn btn-info' href="panell_cursos.php" style="text-decoration: none; color: black;">Tornar enrere</a>
            </div>
        </section>
    </form>

</body>

</html>