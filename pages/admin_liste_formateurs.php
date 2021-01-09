<?php
$titre = 'Liste des formateurs';
$allow = '0';
require_once '../includes/header.php';
require_once '../includes/fonctions.php';
?>

<div class="d-flex flex-column text-center mt-5">
    <h1>
        Liste des formateurs
    </h1>

</div>

<section class="container text-center bg-light py-5">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prénom</th>
                <th scope="col">Adresse mail</th>
                <th scope="col">Tuteur</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                affichage_liste_formateur();
            ?>
        </tbody>
    </table>


</section>

<?php

require_once '../includes/footer.php';

?>