<?php 
$titre = 'Création de comptes & promotions';
$allow = '0';
require_once '../includes/header.php';
?>


<section class="container-fluid ">
    <h1 class="text-center" style="padding:5%">Page d’administration :
        Création d’un compte & promos</h1>
</section>



<section class="container d-flex flex-column">

<?php if (isset($_GET['success_user'])) {?>
<div class="alert alert-success w-50 align-self-center text-center" role="alert">
    L'utilisateur a bien été ajouté ! 
</div>
<?php } ?>
<?php if (isset($_GET['success_promotion'])) {?>
<div class="alert alert-success w-50 align-self-center text-center" role="alert">
    La promotion a bien été ajoutée ! 
</div>
<?php } ?>
    <div class="row row-cols-md-2 row-cols-1">
        <div class="col d-flex align-items-center flex-column py-5">
            <a href="formulaire_inscription.php">
                <img src="../ressources/icones/icone1.png" class=" border border-rounded"  width="150px" height="150px">
            </a>
            <p>Créer un compte </p>
        </div>

        <div class="col d-flex align-items-center flex-column py-5">
            <a href="formulaire_ajout_promotion.php">
                <img src="../ressources/icones/icone5.png" class=" border border-rounded" width="150px" height="150px">
            </a>
            <p>Créer une promotion</p>
        </div>
    </div>
</section>

<?php 

require_once '../includes/footer.php';

?>
