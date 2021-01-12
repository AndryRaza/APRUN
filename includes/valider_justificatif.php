<?php

require_once 'bdd.php';

if (isset($_POST['Valider'])) {

    $id_user = $_POST['id_user'];
    $date = $_POST['date'];

    $req = $bdd->prepare("DELETE FROM `absence_justificatif` WHERE id_user = '$id_user' AND date = '$date' ");
    $req->execute();
    $req->closeCursor();

    $req = $bdd->prepare("UPDATE `absence` SET `justifie`= 'true' WHERE id_user = '$id_user' AND date = '$date' ");
    $req->execute();
    $req->closeCursor();

    header('Location: ../pages/admin_messagerie.php');
    exit();
} 

