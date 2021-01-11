<?php

require_once 'fonctions.php';

require_once 'bdd.php';


/*On récupère sous forme de tableau les mails existant dans notre bdd */

$recup_mail = $bdd->prepare("SELECT `email` FROM `utilisateur` ");

$recup_mail->execute();

$tab_mail = $recup_mail->fetchALL(PDO::FETCH_ASSOC);

$mail_existant = false;
/**************************/



if (isset($_POST['btn_inscription'])) {
    $erreur = [
        'nom' => NULL, 'prenom' => NULL, 'statut' => NULL, 'promotion' => NULL, 'email' => NULL, 'mdp' => NULL, 'statut_tuteur' => NULL

    ];  //Tableau qui contiendra les messages d'erreur
 
    /*On vérifie que les données envoyées ne sont pas vides */
    if (!$_POST['nom']) {    //On regarde si le champ nom n'est pas vide
        $erreur['nom'] = 'Veuillez rentrer un nom';
    } /*else {
        $donnees['nom'] = $_POST['nom'];
    }*/

    if (!$_POST['prenom']) { //On regarde si le champ prénom n'est pas vide
        $erreur['prenom'] = 'Veuillez rentrer un prénom';
    } /*else {
        $donnees['nom'] = $prenom;
    }*/

    if (!$_POST['role'] || ($_POST['role'] !== 'Apprenant' && $_POST['role'] !== 'Formateur')) { //On regarde si le champ prénom n'est pas vide
        $erreur['statut'] = 'Veuillez choisir un statut';
    }

    if (!$_POST['promotion']) {  //On regarde si le champ email n'est pas vide
        $erreur['promotion'] = 'Veuillez choisir une promotion';
    }

    if (!$_POST['email']) {  //On regarde si le champ email n'est pas vide
        $erreur['email'] = 'Veuillez rentrer un email';
    } else {
        $donnee['email'] = $email;
    }

    if (!$_POST['mdp']) {        //On regarde si le champ mdp n'est pas vide
        $erreur['mdp'] = 'Veuillez rentrer un mdp';
    } else {
        $donnees['nom'] = $mdp;
    }

    if (!$_POST['statut_tuteur'] || ($_POST['statut_tuteur'] !== 'Oui' && $_POST['statut_tuteur'] !== 'Non')) {        
        $erreur['statut_tuteur'] = 'Veuillez choisir une option';
    }



    foreach ($tab_mail as $key => $value)        //On vérifie que l'adresse email est pas déjà présent 
    {
        if ($value['email'] === $_POST['email']) {
            $email_existant = true;
            $erreur['email'] = 'Mail déjà existant';
        }/* else {
            $donnee['email'] = $email;
        }*/
    }
    /********************/

    if ($erreur === [
        'nom' => NULL, 'prenom' => NULL, 'statut' => NULL, 'promotion' => NULL, 'email' => NULL, 'mdp' => NULL, 'statut_tuteur' => NULL

    ] && !$email_existant) {   //Si le tableau contenant les erreurs est vide, on peut enregistrer les données envoyées par le formulaire

        /*Partie définition des variables */
        $id = uniqid();
        $nom = validate($_POST['nom']);
        $prenom = validate($_POST['prenom']);
        $email = validate($_POST['email']);
        $mdp = hash('md5', $_POST['mdp']);
        $date_creation = $_POST['date_creation'];

        $role = 1;  //Par défaut le rôle de l'utilisateur est 1 : apprenant

        /*Si il s'agit d'un apprenant, il faut récupérer l'id de la promotion choisie */
        if (validate($_POST['role']) === 'Apprenant') {
            $promotion = validate($_POST['promotion']);
        }

        /**************************/
        /*
        if ($_POST['statut_tuteur'] === 'Oui') {    //On regarde si l'utilisateur aura un statut de tuteur ou pas
            $requete_role = "INSERT INTO `utilisateur_role`(`id_user`, `id_role`) VALUES ('$id','3')";
            $bdd->exec($requete_role);
        }
*/
        if (validate($_POST['role']) === 'Formateur') {   //On regarde si l'utilisateur sera un formateur ou pas
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

        $erreur_serialiser = serialize($erreur);
        //$donnees_serialiser = serialize($donnees);
        header('location: ../pages/formulaire_inscription.php?error=' . $erreur_serialiser /*. '&d='.$donnees_serialiser*/);
        exit();
    }
}
