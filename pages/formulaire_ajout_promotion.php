<?php
$titre = 'Formulaire d\'ajout de promotions';
$allow = '0';
require_once '../includes/header.php';
?>

<h1 class="mt-5 text-center">Formulaire d'ajout d'une promotion</h1>

<section class="container-fluid d-flex justify-content-center my-5">
    <div id="formulaire_promotion" style="width:50%">
        <form class="d-flex flex-column" action="../includes/ajout_promotion.php" method="POST">

            <label class="mb-2" for="nom_promotion">Nom</label>
            <input class=" form-control mb-4" type="text" name="nom_promotion" id="nom_promotion" required pattern="[A-Za-z - ]+">

            <label class="mb-2" for="annee">Annees (Début - Fin)</label>
            <div class="d-flex">
                <input class="form-control mb-4 w-50" type="number" name="debut_promotion" id="debut_promotion" required min="2020">
                <input class="form-control mb-4 w-50" type="number" name="fin_promotion" id="fin_promotion" required min="2021">
            </div>

            <label class="mb-2" for="formation_promotion">Formation</label>
            <select class="form-control mb-4" name="formation_promotion" id="formation_promotion">
                <option>CPJEPS</option>
                <option>BPJEPS</option>
                <option>DEJEPS</option>
            </select>

            <label class="mb-2" for="duree_formation">Durée de la formation (en h) :</label>
            <input class=" form-control mb-4" type="number" name="duree_formation" id="duree_formation" required min=1>


            <input type="submit" class="btn btn-secondary align-self-end" value="Ajouter" name="btn_ajout_promotion" id="btn_ajout_promotion">

        </form>
    </div>
</section>


<?php

require_once '../includes/footer.php';

?>