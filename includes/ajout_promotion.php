<?php 

require_once 'fonctions.php';

require_once 'bdd.php' ;

if (isset($_POST['btn_ajout_promotion'])){


$erreur = array();

$id_promotion = uniqid();
$nom_promotion = validate($_POST['nom_promotion']);
$debut_promotion = $_POST['debut_promotion'];
$fin_promotion = $_POST['fin_promotion'];
$formation_promotion = validate($_POST['formation_promotion']);
$duree_formation = (int)$_POST['duree_formation'];


$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$requete="INSERT INTO `promotion`(`id_promo`, `nom`, `formation`, `debut`, `fin`, `duree`) VALUES ('$id_promotion','$nom_promotion','$formation_promotion','$debut_promotion','$fin_promotion','$duree_formation')";
$bdd->exec($requete);

header('Location: ../pages/formulaire_ajout_promotion.php?success_promotion="yes"');
exit();

}