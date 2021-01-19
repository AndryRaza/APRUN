<?php

require_once 'bdd.php';

if (isset($_POST['envoi_justificatif'])) {

    /****Partie PDF ***/
    $dossier = 'D:\APRUN\ressources\pdf/';
    $fichier = basename($_FILES['justificatif']['name']);

    $taille_maxi = 60000000;
    $taille = filesize($_FILES['justificatif']['tmp_name']);
    $extensions = array('.pdf');
    $extension =  strtolower(substr(strrchr($_FILES['justificatif']['name'], '.'), 1));

    /*
    if (!in_array($extension, $extensions)) {
        $erreur = 'Vous devez uploader un fichier de type pdf';
    }

    if ($taille > $taille_maxi) {
        $erreur = 'Le fichier est trop gros...';
    }

    if ($_FILES['justificatif']['name'] === ' ') {
        $erreur = 'Nom de l\'image incorrect';
    }

    if (stristr($fichier, '<') != FALSE) {
        $erreur = 'Nom de l\'image incorrect';
    }

    if (!isset($erreur)) {*/
        //$id_fichier = md5(uniqid(rand(), true));
       // if (move_uploaded_file($_FILES['justificatif']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        /*{
            echo '';
        }*/
   /* } else {
        echo $erreur;
    }*/


    $id_fichier = md5(uniqid(rand(), true));
    move_uploaded_file($_FILES['justificatif']['tmp_name'], $dossier . $id_fichier . '.pdf');

    $req_ = $bdd->prepare("SELECT `id_user`,  `date` FROM `absence_justificatif`");
    $req_->execute();
    $tab = $req_->fetchAll(PDO::FETCH_ASSOC);
    $req_->closeCursor();

    $id_user = $_POST['id_user'];
    $motif = $_POST['motif'];
    $date_motif = $_POST['date_motif'];

    $description_motif = $_POST['description_motif'];

    $justifictif_exist = false; //Variable pour voir si le justificatif n'a pas été déja envoyé


    foreach ($tab as $key => $value) {
        if ($value['id_user'] === $id_user && $value['date'] === $date_motif) {
            $justificatif_exist = true;
            break;
        }
    }

    if ($justificatif_exist) {  //Si le justificatif a déja été envoyé, on le modifie 
        $req = $bdd->prepare("UPDATE `absence_justificatif` SET `motif`='$motif',`date`='$date_motif',`justificatif`='$id_fichier',`description`='$description_motif' WHERE id_user = '$id_user' and  date = '$date_motif'");
        $req->execute();
        $req->closeCursor();
    } else {    //Sinon on le crée
        $req = $bdd->prepare("INSERT INTO `absence_justificatif`(`id_user`, `motif`, `date`, `justificatif`,`description`)
             VALUES ('$id_user','$motif','$date_motif','$id_fichier','$description_motif')");
        $req->execute();
        $req->closeCursor();
    }
    header('Location: ../pages/apprenant_edt.php?success="yes"');
    exit();
}
