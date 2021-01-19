<?php

require_once('fonctions.php');

require_once '../includes/bdd.php';

if (isset($_POST['btn_modifier'])) {

    $erreur = [
        'id'=>$_POST['id'],'role'=>$_POST['role'] ,'nom' => NULL, 'prenom' => NULL, 'promotion' => NULL, 'email' => NULL
    ];

    if (!$_POST['nom']) {    //On regarde si le champ nom n'est pas vide
        $erreur['nom'] = 'Nom incorrect';
    }

    if (!$_POST['prenom']) {    //On regarde si le champ nom n'est pas vide
        $erreur['prenom'] = 'Prénom incorrect';
    }

    if (!$_POST['email']) {    //On regarde si le champ nom n'est pas vide
        $erreur['email'] = 'Nom incorrect';
    }

    if (!$_POST['nom']) {    //On regarde si le champ nom n'est pas vide
        $erreur['nom'] = 'Nom incorrect';
    }


    if ($_POST['role'] === '1') {    //On regarde si le champ nom n'est pas vide
        if (!$_POST['promotion']) {    //On regarde si le champ nom n'est pas vide
            $erreur['promotion'] = 'Promotion incorrect';
        }
    }

    if ($erreur ===  [
        'id'=>$_POST['id'],'role'=>$_POST['role'] ,'nom' => NULL, 'prenom' => NULL, 'promotion' => NULL, 'email' => NULL
    ]) {

        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        //On va modifier les infos persos de l'utilisateur
        $req_utilisateur = $bdd->prepare("UPDATE `utilisateur` SET `nom`='$nom',`prenom`='$prenom',`email`='$email' WHERE id_user = '$id'");
        $req_utilisateur->execute();

        //Si c'est un apprenant, on modifie sa promotion
        if ($_POST['promotion']) {
            $promotion = $_POST['promotion'];

            $req_promotion = $bdd->prepare("UPDATE `utilisateur_promotion` SET `id_promo`='$promotion' WHERE id_user = '$id'");
            $req_promotion->execute();
        }

        if ($role === '1'){
            header('Location: ../pages/admin_liste_apprenants.php?page=1&success=yes');
            exit();
        }

        if ($role === '2'){
            header('Location: ../pages/admin_liste_formateurs.php?page=1&success=yes');
            exit();
        }

        if ($role === '3'){
            header('Location: ../pages/admin_liste_tuteurs.php?page=1&success=yes');
            exit();
        }
     
        
    }else {
        $erreur_serialiser = serialize($erreur);
        header('location: ../pages/formulaire_modification.php?error=' . $erreur_serialiser);
        exit();
    }
}
