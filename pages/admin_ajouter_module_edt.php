<?php
$titre = 'Ajouter un module';
$id_promo = $_POST['id_promo'];
$allow = '0';

require_once '../includes/fonctions.php';
require_once '../includes/header.php';
?>


<h1 class="mt-5 text-center">Ajouter un module</h1>

<section class="container-fluid d-flex justify-content-center my-5">
    <div id="formulaire_inscription" style="width:50%">
        <form class="d-flex flex-column" action="../includes/ajouter_evenements.php" method="POST">

            <label class="mb-2" for="titre">Titre</label>
            <input class=" form-control mb-4" type="text" name="titre" id="titre" required pattern="[A-Za-z - ]+">

            <label class="mb-2" for="date">Date</label>
            <input class="form-control mb-4" type="date" name="date" id="date">

            <label class="mb-2" for="debut">Heure du début du module</label>
            <input class="form-control mb-4" type="time" name="debut" id="debut">

            <label class="mb-2" for="fin">Heure de fin du module</label>
            <input class="form-control mb-4" type="time" name="fin" id="fin">

            <input type="hidden" name="id_promo" value="<?= $id_promo ?>">
            <input type="submit" class="btn btn-secondary align-self-end" value="Ajouter" name="btn_ajouter" id="btn_ajouter_module">

        </form>
    </div>
</section>
<?php

require_once '../includes/footer.php';

?>