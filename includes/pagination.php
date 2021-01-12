<?php
$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "bdd_app_aprun";

$bdd2 = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$bdd2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $bdd2->prepare("SELECT COUNT(*) FROM `utilisateur_role` where id_role = '1' ");
$req->execute();
$tab_longueur = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();

//Récupérer le nombre de résultats présents dans la table
$number_of_results = $tab_longueur[0]['COUNT(*)'];

//Nombre d'éléments à afficher par pages 
$results_per_page = 7;

//Afficher le nombre de pages dispos 
$number_of_pages = ceil($number_of_results / $results_per_page);

?>

<nav aria-label="Page navigation example w-100" id="pagination">
    <ul class="pagination">
        <?php
        if ($page > 1) {
            echo '<li class="page-item"><a class="page-link" href="../pages/admin_liste_apprenants.php?page=' . ($page - 1) . '"> Précédent </a> </li>';
        }
        // Afficher les numéros des pages
        for ($page = 1; $page <= $number_of_pages; $page++) {
            echo '<li class="page-item"><a class="page-link" href="../pages/admin_liste_apprenants.php?page=' . $page . '">' . $page . '</a> </li>';
        }

        if ($_GET['page'] < $number_of_pages) {
            echo '<li class="page-item"><a class="page-link" href="../pages/admin_liste_apprenants.php?page=' . ($_GET['page'] + 1) . '"> Suivant </a> </li>';
        }

        ?>
    </ul>
</nav>