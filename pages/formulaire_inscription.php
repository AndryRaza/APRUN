<?php
$titre = 'Formulaire d\'inscription';
$allow = '0';
require_once '../includes/fonctions.php';
require_once '../includes/header.php';

$erreur = NULL;

if (isset($_GET['error'])) {
    $erreur = unserialize($_GET['error']);
}

?>



<h1 class="mt-5 text-center">Formulaire d'inscription</h1>

<section class="container-fluid d-flex justify-content-center my-5">
    <div id="formulaire_inscription" style="width:50%">
        <form class="d-flex flex-column" action="../includes/inscription.php" method="POST">

            <label class="mb-2" for="nom">Nom</label>
            <input class=" form-control <?php if(!$erreur['nom']) echo 'mb-4'; else {echo 'erreur';} ?>" type="text" name="nom" id="nom" required pattern="[A-Za-z - ]+">
            <div class="erreur mb-4">
                <?php if ($erreur['nom']) echo $erreur['nom']; ?>
            </div>

            <label class="mb-2" for="prenom">Prenom</label>
            <input class=" form-control <?php if(!$erreur['prenom']) echo 'mb-4'; else {echo 'erreur';} ?>" type="text" name="prenom" id="prenom"  pattern="[A-Za-z - é è ]+">
            <div class="erreur mb-4">
                <?php if ($erreur['prenom']) echo $erreur['prenom']; ?>
            </div>

            <label class="mb-2" for="role">Statut</label>
            <select class="form-control <?php if(!$erreur['statut']) echo 'mb-4' ; else {echo 'erreur';}?>" name="role" id="role" required onchange="check();">
                <option>Formateur</option>
                <option>Apprenant</option>
            </select>
            <div class="erreur mb-4">
                <?php if ($erreur['statut']) echo $erreur['statut']; ?>
            </div>

            <div id="promotion" style="display:none">
                <label class="mb-2" for="promotion">Promotion :</label>
                <select class="form-control <?php if(!$erreur['promotion']) echo 'mb-4'; else {echo 'erreur';} ?>" name="promotion" id="promotion" required>
                    <?php affichage_promotion(); ?>
                </select>
            </div>
            <div class="erreur mb-4">
                <?php if ($erreur['promotion']) echo $erreur['promotion']; ?>
            </div>

            <label class="mb-2" for="email">Adresse email</label>
            <input class=" form-control <?php if(!$erreur['email']) echo 'mb-4'; else {echo 'erreur';} ?>" type="mail" name="email" id="email" required>
            <div class="erreur mb-4">
                <?php if ($erreur['email']) echo $erreur['email']; ?>
            </div>

            <label class="mb-2" for="mdp">Mot de passe</label>
            <input class=" form-control <?php if(!$erreur['mdp']) echo 'mb-4'; else {echo 'erreur';} ?>" type="password" name="mdp" id="mdp" pattern="[0-9a-z - ' @ ( ) ! # é è ]+" required>
            <div class="erreur mb-4">
                <?php if ($erreur['mdp']) echo $erreur['mdp']; ?>
            </div>

            <label class="mb-2" for="statut_tuteur">Tuteur</label>
            <select class="form-control <?php if(!$erreur['statut_tuteur']) echo 'mb-4'; else {echo 'erreur';} ?> " name="statut_tuteur" id="statut_tuteur" required>
                <option>Oui</option>
                <option>Non</option>
            </select>
            <div class="erreur mb-4">
                <?php if ($erreur['statut_tuteur']) echo $erreur[6]; ?>
            </div>

            <input type="hidden" name="date_creation" value="<?= date('Y-m-d h:i:s'); ?>" required>

            <input type="submit" class="btn btn-secondary align-self-end" value="Inscrire" name="btn_inscription" id="btn_inscription">

        </form>
    </div>
</section>
<?php

require_once '../includes/footer.php';

?>