<?php
$titre = 'Liste des apprenants';
$allow = '0';
require_once '../includes/header.php';
require_once '../includes/fonctions.php';
require_once '../includes/pagination.php';
?>
<div class="d-flex flex-column text-center mt-5">
    <h1>
        Liste d'apprenants
    </h1>

</div>

<section class="container text-center bg-light py-5 d-flex flex-column">
    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success w-50 align-self-center text-center" role="alert">
            La modification a bien été effectuée !
        </div>
    <?php } ?>
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
                require_once '../includes/liste_apprenant.php';
                ?>
            </tbody>
        </table>
        <?php
        pagination($number_of_results, $page, 'admin_liste_apprenants');
        ?>
    </div>
</section>

<?php

require_once '../includes/footer.php';

?>