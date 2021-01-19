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
$id = $_SESSION['user'];

//On réalise une jointure, on récupère dans un tableau l'id de l'utilisateur qui cherche à se connecter, ainsi que son mail, mdp et son rôle
$req = $bdd->prepare(" SELECT utilisateur.id_user AS id,utilisateur.nom AS nom_user , utilisateur.prenom AS prenom_user, utilisateur.email AS email
                        FROM `utilisateur_tuteur` 
                        INNER JOIN `utilisateur` ON utilisateur.id_user = utilisateur_tuteur.id_user_apprenant
                        WHERE id_user_tuteur = '$id'
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
                <form action="../pages/tuteur_apprenant.php" method="POST">
                    <input type="hidden" name="id" value="<?= $value['id'] ?>">
                    <button class="btn" type="submit" name="voir">
                        <img src="../ressources/img/view.png" width="20px" height="20px">
                    </button>
                </form>
            </td>
        </tr>

<?php          
}
