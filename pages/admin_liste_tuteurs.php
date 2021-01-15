<?php
$titre = 'Liste des formateurs';
$allow = '0';
require_once '../includes/header.php';
require_once '../includes/fonctions.php';
?>

<div class="d-flex flex-column text-center mt-5">
    <h1>
        Liste des tuteurs
    </h1>

</div>

<section class="container text-center bg-light py-5">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse mail</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../includes/liste_tuteur.php';
                ?>
            </tbody>
        </table>
    </div>
    <?php 
        require_once '../includes/pagination_tuteur.php';
    ?>
</section>

<?php

require_once '../includes/footer.php';

?>