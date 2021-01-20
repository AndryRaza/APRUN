<?php

require_once 'fonctions.php';

$id_promo = $_POST['id_promo'];

$titre=validate($_POST['titre']);
$date = $_POST['date'];
$debut=$_POST['debut'];
$fin=$_POST['fin'];

$date_debut = $date.' '.$debut.':00';
$date_fin = $date.' '.$fin.':00';

$id = uniqid();

require_once 'bdd.php';

$req = $bdd->prepare("INSERT INTO `evenement`(`id_evenement`, `id_promo`, `titre`, `start`, `end`) 
VALUES ('$id','$id_promo','$titre','$date_debut','$date_fin')");

$req->execute();

header('Location: ../pages/admin_edt.php?success=yes&choix_promo='.$id_promo);
exit();