<?php
$titre = 'Accueil administration';
$allow = '0';
require_once '../includes/header.php';

?>

<section class="container-fluid bg-dark bandeau_administration">
    <h1 class="text-center" style="padding:5%">Page d'administration</h1>
</section>

<section class="container">
    <div class="row row-cols-md-3 row-cols-1">
        <div class="col d-flex align-items-center flex-column py-5">
            <a href="admin_accueil_creation.php">
                <img src="../ressources/icones/icone7.png" width="150px" height="150px">
            </a>
            <p>Création compte & promos</p>
        </div>
        <div class="col d-flex align-items-center flex-column py-5">
            <a href="admin_gestion_compte_liste.php">
                <img src="../ressources/icones/icone6.png"  width="150px" height="150px">
            </a>
            <p>Gestion des comptes</p>
        </div>
        <div class="col d-flex align-items-center flex-column py-5">
            <a href="admin_choix_promo_edt.php">
                <img src="../ressources/icones/icone2.png"  width="150px" height="150px">
            </a>
            <p>Emploi du temps</p>
        </div>

        <div class="col d-flex align-items-center flex-column py-5">
            <a href="admin_messagerie.php">
                <img src="../ressources/icones/icone4.png"  width="150px" height="150px">
            </a>
            <p>Voir sa messagerie</p>
        </div>

        <div class="col">
        </div>

        <div class="col d-flex align-items-center flex-column py-5">
            <a href="apprenant_edt.php">
                <img src="../ressources/icones/logout.png"  width="150px" height="150px">
            </a>
            <p>Déconnexion</p>
        </div>

    </div>
</section>

<?php

require_once '../includes/footer.php';

?>