<?php
$titre = 'Accueil tuteur';
$allow = '3';
require_once '../includes/header.php';
require_once '../includes/pagination.php';
?>

<section class="container-fluid bg-dark">
    <h1 class="text-white text-center" style="padding:5%">Page tuteur</h1>
</section>

<section class="container text-center bg-light py-5">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Promotion</th>
                    <th scope="col">Adresse mail</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once '../includes/liste_tuteur_accueil.php';
                ?>
            </tbody>
        </table>
        <?php 
        pagination($number_of_results,$page,'tuteur_accueil');
        ?>
    </div>
</section>
<?php

require_once '../includes/footer.php';

?>