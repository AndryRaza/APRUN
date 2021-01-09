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
    if ($_POST['promotion']) {
        $promotion = $_POST['promotion'];

        $req_promotion = $bdd->prepare("UPDATE `utilisateur_promotion` SET `id_promo`='$promotion' WHERE id_user = '$id'");
        $req_promotion->execute();
    }

}

header('Location: ../pages/admin_gestion_compte_liste.php');
exit();
