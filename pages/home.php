<?php

session_start();

if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "";
}

if (!isset($_SESSION['role'])) {
    $_SESSION['role'] = "";
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/style.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <title>APRUN Carnet de bord</title>
</head>

<body>

    <section class="container-fluid d-flex flex-column justify-content-center align-items-center" id="connexion">

        <div class="box">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <div id="formulaire_connexion">

                <form action="../includes/connexion.php" method="POST">

                    <div class="d-flex flex-column p-5 align-items-end">
                        <h1 class="align-self-center">Connexion</h1>
                        <input class="my-2 form-control" type="text" name="mail_utilisateur" id="mail_utilisateur" placeholder="Adresse email">

                        <input class="my-2 form-control" type="password" name="mdp_utilisateur" id="mdp_utilisateur" placeholder="Mot de passe">
                        <button type="submit" class="btn w-75" name="connexion"  id="btn_connexion">Se connecter</button>
                    </div>

                </form>

            </div>
        </div>
    </section>
</body>

</html>