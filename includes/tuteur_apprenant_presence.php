<?php


$id = $_POST['id'];

$req = $bdd->prepare("SELECT * FROM `nbre_absence_utilisateur` WHERE id_user = '$id'");
$req->execute();
$tab = $req->fetch(PDO::FETCH_ASSOC);
$req->closeCursor();

?>

<section class="container-fluid h-100 mt-5" id="presence_apprenant">

    <h1 class="text-center">Stats de présence</h1>

    <div class="container py-5 w-75 bg-light">
        <h2>Présence/Absence :</h2>
        <p class="py-2">
            Totale d'heures de sa promotion :
        </p>
        <p class="py-2">
            Nombres d'heures d'absence : <?php
                                            echo $tab['nbre'] . ' heures.';
                                            ?>
        </p>
        <p class="py-2">
            Pourcentage de présence :
        </p>
    </div>
</section>