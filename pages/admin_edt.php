<?php
$titre = "Emploi du temps";
$allow = "0";
require_once '../includes/header.php';
require_once '../includes/evenements_admin.php';
?>

<section class="container py-3 d-flex flex-column">
    <?php if (isset($_GET['success'])) { ?>
        <div class="alert alert-success w-50 align-self-center text-center" role="alert">
            Module rajouté ! 
        </div> <?php } ?>
    <div class=" row row-cols-2 mb-md-5 ">
        <div class="col text-end">
            <form action="admin_ajouter_module_edt.php" method="POST">
                <input type="hidden" name="id_promo" value="<?= $id_promo ?>">
                <button type="submit" name="ajouter" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
        <div class="col text-start">
            <form>
                <input type="hidden" name="id_promo" value="<?= $id_promo ?>">
                <button type="submit" name="modifier" class="btn btn-primary" disabled>Modifier</button>
            </form>
        </div>
    </div>
</section>

<section class="container-fluid h-100 text-center">
    <div class="container" id='calendar_admin'>

    </div>

</section>

<?php

require_once '../includes/footer.php';

?>

<style>
    @media all and (max-width: 870px) {


        .fc-header-toolbar {
            display: flex;
            flex-direction: column;
        }
    }
</style>