<?php
$titre = 'Accueil tuteur';
require_once '../includes/header.php';

?>

<section class="container-fluid bg-dark">
    <h1 class="text-white text-center" style="padding:5%">Page tuteur</h1>
</section>

<section class="container">
    <div class="row row-cols-md-2 row-cols-1">
        <div class="col d-flex align-items-center flex-column py-5">
            <a href="tuteur_listeapprenant.php">
                <img src="../ressources/icones/icone1.png" class=" border border-rounded" width="200px" height="200px">
            </a>
            <p>Accèder à sa liste d'apprenant</p>
        </div>
        <div class="col d-flex align-items-center flex-column py-5">
            <a href="apprenant_edt.php">
                <img src="../ressources/icones/icone2.png" class=" border border-rounded" width="200px" height="200px">
            </a>
            <p>Accèder à son emploi du temps</p>
        </div>
    </div>
</section>
<?php

require_once '../includes/footer.php';

?>