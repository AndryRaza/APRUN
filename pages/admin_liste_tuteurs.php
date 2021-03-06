<?php
$titre = 'Liste des tuteurs';
$allow = '0';
require_once '../includes/header.php';
require_once '../includes/fonctions.php';
require_once '../includes/pagination.php';
?>

<div class="d-flex flex-column text-center mt-5">
    <h1>
        Liste des tuteurs
    </h1>

</div>

<section class="container text-center bg-light py-5 d-flex flex-column">
    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success w-50 align-self-center text-center" role="alert">
            La modification a bien été effectuée !
        </div>
    <?php } ?>
    <?php if (isset($_GET['success_delete'])) { ?>
        <div class="alert alert-success w-50 align-self-center text-center" role="alert">
            L'utilisateur a été supprimé !
        </div>
    <?php } ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse mail</th>
                    <th scope="col">Voir sa liste d'apprenants</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../includes/liste_tuteur.php';
                ?>
            </tbody>
        </table>
        <?php
        pagination($number_of_results, $page, 'admin_liste_tuteurs');
        ?>
    </div>

</section>

<?php

require_once '../includes/footer.php';

?>