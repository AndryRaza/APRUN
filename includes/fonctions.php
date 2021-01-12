<?php

function validate($donnees)
{     //Fonction pour sécuriser les données envoyées par les formulaires 
    $donnee = htmlspecialchars($donnees);
    $donnees = trim($donnees);
    $donnees = stripslashes($donnees);
    return ($donnees);
}

function affichage_promotion()  //Fonction pour afficher les choix des promotions pour l'inscription 
{
    require_once 'bdd.php';
    $recup_promotion = $bdd->prepare("SELECT * FROM `promotion`");

    $recup_promotion->execute();

    $tab_promotion = $recup_promotion->fetchALL(PDO::FETCH_ASSOC);

    foreach ($tab_promotion as $key => $value) { ?>
        <option value="<?= $value['id_promo'] ?>"><?= $value['debut'] . '-' . $value['fin'] . ' - ' . $value['nom'] ?></option>

        <?php
    }
}



function verif($role, $page)    //Fonction pour vérifier le statut du visiteur qui tente d'accèder à des pages dont il n'a pas le droit
{
    if ($role === 'Apprenant') {

        if ($_SESSION['user'] === "" && $_SESSION['user']['role'] != '1') {
            echo '<p class="text-warning">Permission refusée </p>';
        } else {
            header('Location: ../pages/' . $page);
            exit();
        }
    }

    if ($role === 'Formateur') {

        if ($_SESSION['user'] === "" && $_SESSION['user']['role'] != '2') {
            echo '<p class="text-warning">Permission refusée </p>';
        } else {
            header('Location: ../pages/' . $page);
            exit();
        }
    }

    if ($role === 'Admin') {

        if ($_SESSION['user'] === "" || $_SESSION['user']['role'] != '0') {
            echo '<p class="text-warning">Permission refusée </p>';
        } else {
            header('Location: ' . $page);
            exit();
        }
    }
}

function affichage_liste_formateur()
{
    require_once 'bdd.php';

    //On réalise une jointure, on récupère dans un tableau l'id de l'utilisateur qui cherche à se connecter, ainsi que son mail, mdp et son rôle
    $req = $bdd->prepare(" SELECT utilisateur.id_user AS id,utilisateur.nom AS nom_user , utilisateur.prenom AS prenom_user, utilisateur.email AS email, utilisateur_role.id_role AS user_role
                            FROM `utilisateur` 
                            INNER JOIN `utilisateur_role` ON utilisateur.id_user = utilisateur_role.id_user
                            ");

    $req->execute();

    $tab_utilisateur = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tab_utilisateur as $key => $value) {
        if ($value['user_role'] === '2') {
        ?>

            <tr>
                <th scope="row"><?= $value['nom_user'] ?></th>
                <td><?= $value['prenom_user'] ?></td>
                <td><?= $value['email'] ?></td>
                <td>non</td>
                <td>
                    <form action="../pages/formulaire_modification.php" method="POST">
                        <input type="hidden" name="id" value="<?= $value['id'] ?>">
                        <input type="hidden" name="role" value="<?= $value['user_role'] ?>">
                        <button class="btn" type="submit" name="modifier">
                            <img src="../ressources/img/pen.png" width="20px" height="20px">
                        </button>
                        <button class="btn" type="submit" name="supprimer">
                            <img src="../ressources/img/delete.png" width="20px" height="20px">
                        </button>
                    </form>
                </td>
            </tr>

        <?php          }
    }
}

function affichage_messagerie()
{
    require_once 'bdd.php';
    $req_ = $bdd->prepare("SELECT utilisateur.email AS email, absence_justificatif.date AS date, 
                            absence_justificatif.description AS description, absence_justificatif.motif AS motif, utilisateur.id_user AS id_user
                     
                    FROM absence_justificatif 
                    INNER JOIN utilisateur ON utilisateur.id_user = absence_justificatif.id_user
    
    ");
    $req_->execute();
    $tab = $req_->fetchAll(PDO::FETCH_ASSOC);
    foreach ($tab as $key => $value) {
        ?>

        <tr>

            <td><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><?= $value['email'] ?></a></td>
            <td><?= $value['date'] ?></td>
            <td>
                <p>
                    <?= $value['description'] ?>
                </p>
            </td>
            <td class="d-flex">
                <form class="form_justif" method="POST">
                    <input type="hidden" class="email" name="email" value="<?= $value['date'] ?>">
                    <input type="hidden" class="date" name="date" value="<?= $value['date'] ?>">
                    <input type="hidden" class="motif" name="motif" value="<?= $value['motif'] ?>">
                    <input type="hidden" class="description" name="description" value="<?= $value['description'] ?>">
                    <input type="submit" class="btn btn-primary" value="Voir">
                </form>
                <form action="../includes/valider_justificatif.php" method="POST">
                    <input type="hidden" name="id_user" value="<?= $value['id_user'] ?>">
                    <input type="hidden" class="date" name="date" value="<?= $value['date'] ?>">
                    <input type="submit" class="btn btn-primary" value="Valider" name="Valider">
                </form>
            </td>

        </tr>

<?php
    }
}
