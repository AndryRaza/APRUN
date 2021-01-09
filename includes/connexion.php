<?php

session_start();

require_once 'bdd.php' ;

//On réalise une jointure, on récupère dans un tableau l'id de l'utilisateur qui cherche à se connecter, ainsi que son mail, mdp et son rôle
$req = $bdd->prepare(" SELECT utilisateur.id_user, utilisateur_role.id_role, utilisateur.email, utilisateur.mdp 
FROM `utilisateur` 
INNER JOIN `utilisateur_role` ON utilisateur.id_user = utilisateur_role.id_user
");

$req->execute();

$tab_utilisateur = $req->fetchAll(PDO::FETCH_ASSOC);

$role = '4';

if (isset($_POST['connexion'])) {

    $login = $_POST['mail_utilisateur'];
    $pass = hash('md5', $_POST['mdp_utilisateur']);

    if ($login === 'admin' && $_POST['mdp_utilisateur'] === 'admin') {
        $role = '0';
    }
    
    foreach ($tab_utilisateur as $key => $value) {    //On va parcourir la liste des utilisateurs pour voir si les logins rentrés sont bons, et le renvoyer vers sa page soit apprenant soit formateur
        if ($value['email'] === $login && $value['mdp'] === $pass) {
            $id_user = $value['id_user'];   //Lorsque on trouve l'utilisateur, on stock son id pour pouvoir avoir son rôle
            $_SESSION['user'] = $id_user;
            $role = $value['id_role'];
            break;
        }
    }

    if ($role === '0') {   //Si l'utilisateur est l'admin
        $_SESSION['role'] = '0';
        header('Location: ../pages/admin_accueil.php');
        exit();
    }

    if ($role === '1') {   //Si l'utilisateur est un apprenant
        $_SESSION['role'] = '1';
        header('Location: ../pages/apprenant_edt.php');
        exit();
    }

    if ($role === '2') {   //Si l'utilisateur un est formateur
        $_SESSION['role'] = '2';
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
