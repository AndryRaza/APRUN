<?php

require_once '../includes/bdd.php';

$id = $_SESSION['user'];

$req = $bdd->prepare("SELECT * FROM `nbre_absence_utilisateur` WHERE id_user = '$id'");
$req->execute();
$tab = $req->fetch(PDO::FETCH_ASSOC);
$req->closeCursor();

$req = $bdd->prepare("SELECT `date` FROM `absence` WHERE id_user = '$id' and justifie = 'false' ");
$req->execute();
$tab_date = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();

$req = $bdd->prepare("SELECT promotion.duree AS duree 
                     FROM `utilisateur_promotion` 
                     INNER JOIN `promotion`ON promotion.id_promo = utilisateur_promotion.id_promo
                     WHERE id_user = '$id' ");
$req->execute();
$promo = $req->fetch();
$req->closeCursor();



?>

<section class="container-fluid h-100 mt-5" id="presence_apprenant">

    <h1 class="text-center">Stats de présence</h1>

    <div class="container py-5 w-75 bg-light">
        <h2>Présence/Absence :</h2>
  
        <p class="py-2">
           Totale d'heures de la formation : <?= $promo['duree'] ?> heures
        </p>
        <p class="py-2">
            Nombres d'heures d'absence : <?php
                                            echo $tab['nbre'] . ' heures.';
                                            ?>
        </p>
        <p class="py-2">
            Pourcentage de présence :   <?= round(100 - ($tab['nbre'] / $promo['duree'] * 100 ),0) ?> %
        </p>
    </div>

    <div class="container mt-5 text-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-light border " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Justifier une absence
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Absence</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../includes/justificatif.php" method="POST" enctype="multipart/form-data">
                            <select class="form-control" id="motif" name="motif">Choisir un motif
                                <option value="Maladie">Maladie</option>
                                <option value="Rendez-vous">Rendez-vous</option>
                                <option value="Autre">Autre</option>
                            </select>
                            <select class="form-select" id="date_motif" name="date_motif">
                                <?php
                                foreach ($tab_date as $key => $value) { ?>
                                    <option value="<?= $value['date'] ?>"><?= $value['date'] ?></option>
                                <?php
                                }

                                ?>
                            </select>
                            <input type="file" class="form-control my-2" id="justificatif" name="justificatif"  accept="application/pdf">
                            <textarea class="form-control my-2" id="description_motif" name="description_motif" rows="10"></textarea>
                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['user']; ?>">
                            <input type="submit" class="btn btn-secondary" value="Envoyer" name="envoi_justificatif">
                        </form>
                    </div>
                    <div class="modal-footer">  
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>