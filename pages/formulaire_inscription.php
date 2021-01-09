<?php
$titre = 'Formulaire d\'inscription';
$allow = '0';
require_once '../includes/fonctions.php';
require_once '../includes/header.php';
?>


<h1 class="mt-5 text-center">Formulaire d'inscription</h1>

<section class="container-fluid d-flex justify-content-center my-5">
    <div id="formulaire_inscription" style="width:50%">
        <form class="d-flex flex-column" action="../includes/inscription.php" method="POST">

            <label class="mb-2" for="nom">Nom</label>
            <input class=" form-control mb-4" type="text" name="nom" id="nom" required pattern="[A-Za-z - ]+">

            <label class="mb-2" for="prenom">Prenom</label>
            <input class=" form-control mb-4" type="text" name="prenom" id="prenom" required pattern="[A-Za-z - é è ]+">

            <label class="mb-2" for="role">Statut</label>
            <select class="form-control mb-4" name="role" id="role" onchange="check();">
                <option>Formateur</option>
                <option>Apprenant</option>
            </select>

            <div id="promotion" style="display:none">
                <label class="mb-2" for="promotion">Promotion :</label>
                <select class="form-control mb-4" name="promotion" id="promotion">
                    <?php affichage_promotion(); ?>
                </select>
            </div>

            <label class="mb-2" for="email">Adresse email</label>
            <input class=" form-control mb-4" type="mail" name="email" id="email" required>

            <label class="mb-2" for="mdp">Mot de passe</label>
            <input class=" form-control mb-4" type="password" name="mdp" id="mdp" required pattern="[0-9a-z - ' @ ( ) ! # é è ]+">

            <label class="mb-2" for="statut_tuteur">Tuteur</label>
            <select class="form-control mb-4" name="statut_tuteur" id="statut_tuteur">
                <option>Oui</option>
                <option>Non</option>
            </select>

            <input type="hidden" name="date_creation" value="<?= date('Y-m-d h:i:s'); ?>">

            <input type="submit" class="btn btn-secondary align-self-end" value="Inscrire" name="btn_inscription" id="btn_inscription">

        </form>
    </div>
</section>
<?php

require_once '../includes/footer.php';

?>