<?php


$id = $_POST['id'];

$req = $bdd->prepare("SELECT * FROM `nbre_absence_utilisateur` WHERE id_user = '$id'");
$req->execute();
$tab = $req->fetch(PDO::FETCH_ASSOC);
$req->closeCursor();

$req = $bdd->prepare("SELECT promotion.duree AS duree 
                     FROM `utilisateur_promotion` 
                     INNER JOIN `promotion`ON promotion.id_promo = utilisateur_promotion.id_promo
                     WHERE id_user = '$id' ");
$req->execute();
$promo = $req->fetch();
$req->closeCursor();

$req = $bdd->prepare("SELECT `entree` FROM `utilisateur_promotion` WHERE id_user = '$id'");
$req->execute();
$date_entree = $req->fetch();
$req->closeCursor();

?>

<section class="container-fluid h-100 mt-5 text-center mb-3" id="presence_apprenant">

    <h1 class="text-center">Stats de présence</h1>

    <div class="container py-5 w-75 bg-light">
        <h2>Présence/Absence :</h2>
        <h2>Date d'entrée (Année/Mois/Jour): <?= $date_entree['entree']; ?></h2>
        <p class="py-2">
            Totale d'heures de la formation : <?= $promo['duree'] ?> heures
        </p>
        <p class="py-2">
            Nombres d'heures d'absence : <?php
                                            echo $tab['nbre'] . ' heures.';
                                            ?>
        </p>
        <p class="py-2">
            Pourcentage de présence : <?= 100 - ($tab['nbre'] / $promo['duree'] * 100) ?> %
        </p>
    </div>
</section>