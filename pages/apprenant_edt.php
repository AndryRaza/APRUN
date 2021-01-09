<?php
$titre = 'Emploi du temps';
$allow = '1';

session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.js"></script>
    <title><?= $titre ?></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-light">
            <div class="container d-flex">
                <a class="navbar-brand" href="
                <?php 
                    if ($_SESSION['role'] === '0'){
                        echo 'admin_accueil.php';
                    }
                    if ($_SESSION['role'] === '1'){
                        echo 'apprenant_edt.php';
                    }
                    if ($_SESSION['role'] === '2'){
                        echo 'formateur_accueil.php';
                    }
                ?>
                ">APRUN</a>
                <div class="justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form action="../includes/connexion.php" method="POST">
                                <button class="btn" type="submit" name="deconnexion">Se déconnecter
                                    <img src="../ressources/icones/logout.png" width="20px" height="20px">
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<section class="container-fluid h-100 text-center mt-5" id="edt_apprenant">

    <h1>Bonjour</h1>

    <h2>Emploi du temps</h2>

    <div class="container" id='calendar'>
        <?php 
            require_once '../includes/edt.php';
        ?>
    </div>
</section>
<?php

require_once '../includes/footer.php';

?>