<?php

if (isset($_POST['valider_emargement'])) {

    $id_promo = $_POST['id_promo']; // On récupère l'id de la promo
    $date = $_POST['date']; // On récupère la date de la feuille d'émargement

    require_once 'bdd.php' ;

    $req = $bdd->prepare("SELECT utilisateur.id_user as id_user
                        
                        FROM `utilisateur_promotion` 
                        INNER JOIN `utilisateur`ON utilisateur_promotion.id_user = utilisateur.id_user
                        WHERE utilisateur_promotion.id_promo = '$id_promo'
                        ");
    $req->execute();
    $tab_utilisateur = $req->fetchAll(PDO::FETCH_ASSOC);
   
    //On va parcourir la liste des checkbox absent cochées 
    foreach ($tab_utilisateur as $key => $value) {
        $id = $value['id_user'];
        if (isset($_POST['absent_' . $id])) {  //Si la case est cochée
            //On le rajoute dans la table des absents et par défaut l'absence n'est pas justifiée 
            $req_abs = $bdd->prepare("INSERT INTO `absence`(`id_user`, `date`, `duree`, `justifie`) VALUES ('$id','$date','4','false')");
            $req_abs->execute();
        }
    }

}

header('location: ../pages/formateur_accueil.php');
exit();