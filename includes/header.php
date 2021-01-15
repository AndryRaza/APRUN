<?php

session_start();

if ($allow !== $_SESSION['role'] && $_SESSION['user'] === "") { //Pour ne pas accéder à la page si on est pas connecté
    header('Location: ../index.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "bdd_app_aprun";

$bdd2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$bdd2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $bdd2->prepare("SELECT COUNT(id) FROM absence_justificatif");
$req->execute();

$nbre = $req->fetch();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/jszip.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2017.2.621/js/kendo.all.min.js"></script>
    <script src="../scripts/script.js"></script>
    <script src="../scripts/script_signature.js"></script>
    <title><?= $titre ?></title>
</head>

<body>
    <header class="py-3">
        <nav class="navbar navbar-light">
            <div class="container d-flex">
                <a class="navbar-brand w-50" href="
                <?php
                if ($_SESSION['role'] === '0') {
                    echo 'admin_accueil.php';
                }
                if ($_SESSION['role'] === '1') {
                    echo 'apprenant_edt.php';
                }
                if ($_SESSION['role'] === '2') {
                    echo 'formateur_accueil.php';
                }
                ?>
                ">APRUN</a>
                <div class="justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php if ($allow ===  "0" && $nbre['COUNT(id)'] > 0) { ?> <li class="nav-item"><a href="admin_messagerie.php"><button type="button" class="btn btn-info">
                                        Message(s) non lu(s) <span class="badge bg-danger"><?= $nbre['COUNT(id)']; // Termine le traitement de la requête
                                                                                            ?></span>
                                    </button></a></li> <?php } ?>
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