<?php

require_once('fonctions.php');

$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "bdd_app_aprun";

$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); //On se connecte à notre bdd 

if (isset($_POST['btn_modifier'])) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $email = $_POST['email'];
    $statut_tuteur = $_POST['statut_tuteur'];

    //On va modifier les infos persos de l'utilisateur
    $req_utilisateur = $bdd->prepare("UPDATE `utilisateur` SET `nom`='$nom',`prenom`='$prenom',`email`='$email' WHERE id_user = '$id'");
    $req_utilisateur->execute();

    //Si c'est un apprenant, on modifie sa promotion
    if ($_POST['role'] === '1') {
        $promotion = $_POST['promotion'];

        $req_promotion = $bdd->prepare("UPDATE `utilisateur_promotion` SET `id_promo`='$promotion' WHERE id_user = '$id'");
        $req_promotion->execute();
    }

    /*
    if ($_POST['statut_tuteur'] === 'Oui') {    //On regarde si l'utilisateur aura un statut de tuteur ou pas
        $requete_role = "INSERT INTO `utilisateur_role`(`id_user`, `id_role`) VALUES ('$id','3')";
        $bdd->exec($requete_role);
    }

    if ($_POST['statut_tuteur'] === 'Non') {   
        $requete_role = "DELETE FROM `utilisateur_role` WHERE id_user = $id and id_role = '3'";
        $bdd->exec($requete_role);
    }
    */
}

header('Location: ../pages/admin_gestion_compte_liste.php');
exit();
