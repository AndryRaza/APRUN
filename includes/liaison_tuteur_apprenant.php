<?php 

require_once 'bdd.php';

$id_user_tuteur = $_POST['id_tuteur'] ;
$id_user_apprenant = $_POST['id_apprenant'];

$req = $bdd->prepare("UPDATE `utilisateur_tuteur` SET `id_user_tuteur`='$id_user_tuteur' WHERE id_user_apprenant = '$id_user_apprenant'");
$req->execute();
$req->closeCursor();

header('Location: ../pages/admin_gestion_compte_liste.php');
exit();