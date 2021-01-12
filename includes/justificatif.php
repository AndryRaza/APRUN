<?php 

require_once 'bdd.php';

if (isset($_POST['envoi_justificatif']))
{
    $id_user = $_POST['id_user'];
    $motif = $_POST['motif'];
    $date_motif = $_POST['date_motif'];
    //$justificatif = $_POST['justificatif'];
    $description_motif = $_POST['description_motif'];

    $req = $bdd->prepare("INSERT INTO `absence_justificatif`(`id_user`, `motif`, `date`,`description`)
             VALUES ('$id_user','$motif','$date_motif','$description_motif')");
    $req->execute();

    header('Location: ../pages/apprenant_edt.php');
    exit();
}


?>