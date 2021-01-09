<?php 

session_start();

$id_user = $_SESSION['user'];   //On récupére l'id de l'utilisateur pour pouvoir récupérer sa promotion

require_once 'bdd.php';

//On va récupérer dans la table évènement le titre, quand ça commence et quand ça se finit

$req = $bdd->prepare("SELECT evenement.titre AS title, evenement.start AS start, evenement.end AS end
    from utilisateur
    INNER JOIN utilisateur_promotion ON utilisateur_promotion.id_user = utilisateur.id_user
    INNER JOIN evenement ON evenement.id_promo = utilisateur_promotion.id_promo
    WHERE utilisateur.id_user = '$id_user'
");

$req->execute();
$tab = $req->fetchALL(PDO::FETCH_ASSOC);

//On le transforme sous un "format json" 
echo json_encode($tab); 

?>