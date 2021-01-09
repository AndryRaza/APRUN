<?php

require_once 'fonctions.php';

require_once 'bdd.php' ;


/*On récupère sous forme de tableau les mails existant dans notre bdd */

$recup_mail = $bdd->prepare("SELECT `email` FROM `utilisateur` ");

$recup_mail->execute();

$tab_mail = $recup_mail->fetchALL(PDO::FETCH_ASSOC);

$mail_existant = false;
/**************************/



if (isset($_POST['btn_inscription'])) {

    $erreur = [];  //Tableau qui contiendra les messages d'erreur

    /*On vérifie que les données envoyées ne sont pas vides */

    if (!isset($_POST['nom'])) {    //On regarde si le champ nom n'est pas vide
        array_push($erreur, 'Veuillez rentrer un nom');
    }

    if (!isset($_POST['prenom'])) { //On regarde si le champ prénom n'est pas vide
        array_push($erreur, 'Veuillez rentrer un prénom');
    }

    if (!isset($_POST['email'])) {  //On regarde si le champ email n'est pas vide
        array_push($erreur, 'Veuillez rentrer un email');
    }

    if (!isset($_POST['mdp'])) {        //On regarde si le champ mdp n'est pas vide
        array_push($erreur, 'Veuillez rentrer un mdp');
    }

    foreach ($tab_mail as $key => $value)        //On vérifie que l'adresse email est pas déjà présent 
    {
        if ($value['email'] === $_POST['email']) {
            $mail_existant = true;
        }
    }

    /********************/

    if (isset($erreur) && !$mail_existant) {   //Si le tableau contenant les erreurs est vide, on peut enregistrer les données envoyées par le formulaire

        /*Partie définition des variables */
        $id = uniqid();
        $nom = validate($_POST['nom']);
        $prenom = validate($_POST['prenom']);
        $email = validate($_POST['email']);
        $mdp = hash('md5', $_POST['mdp']);
        $date_creation = $_POST['date_creation'];

        $role = 1;  //Par défaut le rôle de l'utilisateur est 1 : apprenant



        /*Si il s'agit d'un apprenant, il faut récupérer l'id de la promotion choisie */
        if ($_POST['role'] === 'Apprenant') {


            $promotion = $_POST['promotion'];
        }

        /**************************/
        /*
        if ($_POST['statut_tuteur'] === 'Oui') {    //On regarde si l'utilisateur aura un statut de tuteur ou pas
            $requete_role = "INSERT INTO `utilisateur_role`(`id_user`, `id_role`) VALUES ('$id','3')";
            $bdd->exec($requete_role);
        }
*/
        if ($_POST['role'] === 'Formateur') {   //On regarde si l'utilisateur sera un formateur ou pas
            $role = 2;  //Si ca se trouve être un formateur, on passe à 2
        }

        /*Partie enregistrement dans la bdd */
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //On va enregistrer le nouveau utilisateur dans notre bdd dans la table 'utilisateur'
        $requete_utilisateur = "INSERT INTO `utilisateur`(`id_user`, `nom`, `prenom`, `email`, `mdp`) VALUES ('$id','$nom','$prenom','$email','$mdp')";
        $bdd->exec($requete_utilisateur);

        //On va définir son rôle et le stocker dans la table 'utilisateur_role'
        $requete_role = "INSERT INTO `utilisateur_role`(`id_user`, `id_role`) VALUES ('$id','$role')";
        $bdd->exec($requete_role);

        //On va l'assigner à une promotion si l'utilisateur est défini comme un apprenant 
        if ($_POST['role'] === 'Apprenant') {
            $requete_promotion = "INSERT INTO `utilisateur_promotion`(`id_user`, `id_promo`, `entree`) VALUES ('$id','$promotion','$date_creation')";
            $bdd->exec($requete_promotion);
        }
        /***********************/

        header('location: ../pages/admin_accueil_creation.php');
        exit();
    } else {
        echo 'erreur';
        /*
        header('location: ../pages/formulaire_inscription.php');
        exit();
        */
    }
}
