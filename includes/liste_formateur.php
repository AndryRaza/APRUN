<?php

require_once 'bdd.php';

/*Partie pagination */

$req = $bdd->prepare("SELECT COUNT(*) FROM `utilisateur_role` where id_role = '2' ");
$req->execute();
$tab_longueur = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();

//Récupérer le nombre de résultats présents dans la table
$number_of_results = $tab_longueur[0]['COUNT(*)'];

//Nombre d'éléments à afficher par pages 
$results_per_page = 7;

//Si l'utilisateur décide d'enlever le numéro de page dans l'url 
if (!isset($_GET['page'])) {
    $page = 1;
} else {
    $page = $_GET['page'];
}

//Variable pour limiter le nombre de données sélectionnées dans notre requête
$limit_result = ($page - 1) * $results_per_page;

/************************* */

//On réalise une jointure, on récupère dans un tableau l'id de l'utilisateur qui cherche à se connecter, ainsi que son mail, mdp et son rôle
$req = $bdd->prepare(" SELECT utilisateur.id_user AS id,utilisateur.nom AS nom_user , utilisateur.prenom AS prenom_user, utilisateur.email AS email, utilisateur_role.id_role AS user_role
                        FROM `utilisateur_role` 
                        INNER JOIN `utilisateur` ON utilisateur.id_user = utilisateur_role.id_user
                        WHERE id_role = '2'
                        LIMIT  $limit_result , $results_per_page  
                        ");

$req->execute();

$tab_utilisateur = $req->fetchAll(PDO::FETCH_ASSOC);


foreach ($tab_utilisateur as $key => $value) {

?>

        <tr>
            <th scope="row"><?= $value['nom_user'] ?></th>
            <td><?= $value['prenom_user'] ?></td>
            <td><?= $value['email'] ?></td>
            <td class="d-flex justify-content-center">
                <form action="../pages/formulaire_modification.php" method="POST">
                    <input type="hidden" name="id" value="<?= $value['id'] ?>">
                    <input type="hidden" name="role" value="<?= $value['user_role'] ?>">
                    <button class="btn" type="submit" name="modifier">
                        <img src="../ressources/img/pen.png" width="20px" height="20px">
                    </button>
                </form>
                <button class="btn" type="button" onclick=" afficher_modal_suppression('<?= $value['nom_user'] ?>', '<?= $value['id'] ?>', '<?= $value['user_role'] ?>')">
                    <img src="../ressources/img/delete.png" width="20px" height="20px">
                </button>
                <div id="afficher_modal_supprimer">
                </div>
            </td>
        </tr>

<?php          
}

?>
