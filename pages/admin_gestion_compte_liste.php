<?php
$titre = 'Choisir une liste ';
$allow = '0';
require_once '../includes/header.php';

?>

<section class="container-fluid">
    <h1 class="text-center" style="padding:5%">Page d'administration : Gestion des comptes</h1>
</section>

<section class="container">
    <div class="row row-cols-md-2 row-cols-1">
        <div class="col d-flex align-items-center flex-column py-5">
            <a href="admin_liste_apprenants.php?page=1">
                <img src="../ressources/icones/icone8.png" class=" border border-rounded"  width="150px" height="150px">
            </a>
            <p>Liste des apprenants </p>
        </div>
        <div class="col d-flex align-items-center flex-column py-5">
            <a href="admin_liste_formateurs.php?page=1">
                <img src="../ressources/icones/icone9.png" class=" border border-rounded"  width="150px" height="150px">
            </a>
            <p>Liste formateurs</p>
        </div>
    </div>
</section>
<?php

require_once '../includes/footer.php';

?>