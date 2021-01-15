<?php

require_once 'bdd.php';

if (isset($_POST['go_un'])) {

    for ($i = 0; $i < 21; $i++) {
        $id = uniqid();
        $nom = 'apprenant' . $i;
        $mail = 'apprenant' . $i . '@mail.com';

        $req = $bdd->prepare("INSERT INTO `utilisateur`(`id_user`, `nom`, `prenom`, `email`, `mdp`) 
    VALUES ('$id','$nom','$nom','$mail','098f6bcd4621d373cade4e832627b4f6')");
        $req->execute();
        $req->closeCursor();

        if ($i < 11) {
            $req = $bdd->prepare("INSERT INTO `utilisateur_promotion`(`id_user`, `id_promo`, `entree`) 
    VALUES ('$id','5ff81d1502e4d','2021-01-12')");
            $req->execute();
            $req->closeCursor();
        } else {
            $req = $bdd->prepare("INSERT INTO `utilisateur_promotion`(`id_user`, `id_promo`, `entree`) 
        VALUES ('$id','5ff8e46e857dd','2021-01-12')");
            $req->execute();
            $req->closeCursor();
        }

        $req = $bdd->prepare("INSERT INTO `utilisateur_tuteur`(`id_user_apprenant`, `id_user_tuteur`) VALUES ('$id',NULL)");
        $req->execute();
        $req->closeCursor();

        $req = $bdd->prepare("INSERT INTO `utilisateur_role`(`id_user`, `id_role`) VALUES ('$id','1')");
        $req->execute();
        $req->closeCursor();

        $req = $bdd->prepare("INSERT INTO `nbre_absence_utilisateur`( `id_user`, `nbre`) VALUES ('$id','0')");
        $req->execute();
        $req->closeCursor();
    }
}

if (isset($_POST['go_deux'])) {
    for ($i = 0; $i < 21; $i++) {
        $id = uniqid();
        $nom = 'formateur' . $i;
        $mail = 'formateur' . $i . '@mail.com';

        $req = $bdd->prepare("INSERT INTO `utilisateur`(`id_user`, `nom`, `prenom`, `email`, `mdp`) 
    VALUES ('$id','$nom','$nom','$mail','098f6bcd4621d373cade4e832627b4f6')");
        $req->execute();
        $req->closeCursor();

        $req = $bdd->prepare("INSERT INTO `utilisateur_role`(`id_user`, `id_role`) VALUES ('$id','2')");
        $req->execute();
        $req->closeCursor();
    }
}




header('Location: ../pages/admin_accueil.php');
exit();
