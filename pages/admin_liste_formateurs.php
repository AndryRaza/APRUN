<?php
$titre = 'Liste des formateurs';
$allow = '0';
require_once '../includes/header.php';
require_once '../includes/fonctions.php';
require_once '../includes/pagination.php';
?>

<div class="d-flex flex-column text-center mt-5">
    <h1>
        Liste des formateurs
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
                require_once '../includes/liste_formateur.php';
                ?>
            </tbody>
        </table>
        <?php
        pagination($number_of_results, $page, 'admin_liste_formateurs');
        ?>
    </div>
</section>

<?php

require_once '../includes/footer.php';

?>