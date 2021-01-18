<?php

require_once 'bdd.php';

if (isset($_POST['envoi_justificatif'])) {

    $req_ = $bdd->prepare("SELECT `id_user`,  `date` FROM `absence_justificatif`");
    $req_->execute();
    $tab = $req_->fetchAll(PDO::FETCH_ASSOC);
    $req_->closeCursor();

    $id_user = $_POST['id_user'];
    $motif = $_POST['motif'];
    $date_motif = $_POST['date_motif'];
    //$justificatif = $_POST['justificatif'];
    $description_motif = $_POST['description_motif'];

    $justifictif_exist = false; //Variable pour voir si le justificatif n'a pas été déja envoyé


    foreach ($tab as $key => $value) {
        if ($value['id_user'] === $id_user && $value['date'] === $date_motif) {
            $justificatif_exist = true;
            break;
        }
    }

    if ($justificatif_exist) {  //Si le justificatif a déja été envoyé, on le modifie 
        $req = $bdd->prepare("UPDATE `absence_justificatif` SET `motif`='$motif',`date`='$date_motif',`description`='$description_motif' WHERE id_user = '$id_user' and  date = '$date_motif'");
        $req->execute();
        $req->closeCursor();
    } else {    //Sinon on le crée
        $req = $bdd->prepare("INSERT INTO `absence_justificatif`(`id_user`, `motif`, `date`,`description`)
             VALUES ('$id_user','$motif','$date_motif','$description_motif')");
        $req->execute();
        $req->closeCursor();
    }
    header('Location: ../pages/apprenant_edt.php');
    exit();
}
