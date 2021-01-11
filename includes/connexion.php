<?php

session_start();
require_once 'fonctions.php';

if (isset($_POST['connexion'])) {

    require_once 'bdd.php';

    //On réalise une jointure, on récupère dans un tableau l'id de l'utilisateur qui cherche à se connecter, ainsi que son mail, mdp et son rôle

    $req = $bdd->prepare(" SELECT utilisateur.id_user AS id_user, utilisateur_role.id_role AS id_role, utilisateur.email AS email, utilisateur.mdp AS mdp
                            FROM `utilisateur` 
                            INNER JOIN `utilisateur_role` ON utilisateur.id_user = utilisateur_role.id_user
                            ");

    $req->execute();

    $tab_utilisateur = $req->fetchAll(PDO::FETCH_ASSOC);


    /* Se connecter en tant qu'admin - A CHANGER ET A STOCKER DANS LA BDD */
    if ($_POST['mail_utilisateur'] === 'admin' && $_POST['mdp_utilisateur'] === 'admin') {
        $_SESSION['role']  = '0';
        header('Location: ../pages/admin_accueil.php');
        exit();
    }

    /* SINON */
    $login = validate($_POST['mail_utilisateur']);
    $pass = hash('md5', $_POST['mdp_utilisateur']);

    $role = "";


    foreach ($tab_utilisateur as $key => $value) {
        //On va parcourir la liste des utilisateurs pour voir si les logins rentrés sont bons, et le renvoyer vers sa page soit apprenant soit formateur
        if ($value['email'] === $login && $value['mdp'] === $pass) {
            //Lorsque on trouve l'utilisateur, on stock son id pour pouvoir avoir son rôle
            $id_user = $value['id_user'];
            $_SESSION['user'] = $id_user;
            $role = $value['id_role'];
            $_SESSION['role']  = $role;
            if ($role === "1") {
                $req = $bdd->prepare(" SELECT utilisateur_promotion.id_promo AS id_promo
                            FROM `utilisateur` 
                            INNER JOIN `utilisateur_promotion` ON '$id_user' = utilisateur_promotion.id_user
                            ");
                $req->execute();
                $tab_promo = $req->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['promo'] = $tab_promo['id_promo'];
            }
        }
    }

    if ($role === "1") {   //Si l'utilisateur est un apprenant

        header('Location: ../pages/apprenant_edt.php');
        exit();
    }

    if ($role === "2") {   //Si l'utilisateur un est formateur
        header('Location: ../pages/formateur_accueil.php');
        exit();
    }

    header('Location: ../index.php');   //Si la connexion a échouée 
    exit();
}

if (isset($_POST['deconnexion'])) { //Lorsque l'utilisateur souhaite se déconnexion
    session_destroy();
    header('Location: ../index.php');
}
