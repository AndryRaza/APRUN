<?php
$titre = 'Accueil formateur';
$allow = '2';
require_once '../includes/header.php';
require_once '../includes/fonctions.php';
?>

<section class="container-fluid d-flex flex-column justify-content-center align-items-center p-5">
    <h1>Bienvenue</h1>
    <div id="choix_promo_formateur">
        <form action="formateur_emargement.php" method="POST">

            <div class="d-flex flex-column p-5  bg-light" style="border:2px solid black">
                <label for="choix_promo_formateur">Veuillez choisir une promotion :</label>
                <select class="form-control my-5" name="choix_promo_formateur">
                    <?= affichage_promotion();?>
                </select>
                <input type="submit" class="btn btn-primary w-50 align-self-end" value="Valider" name="valider_promo_formateur">
            </div>

        </form>

    </div>
</section>

<?php

require_once '../includes/footer.php';

?>