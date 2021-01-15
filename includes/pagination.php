<?php

function pagination($number_of_results,$page,$liste)
//Nombre d'éléments à afficher par pages 
{$results_per_page = 7;

//Afficher le nombre de pages dispos 
$number_of_pages = ceil($number_of_results / $results_per_page);

?>

<nav aria-label="Page navigation example w-100" id="pagination">
    <ul class="pagination">
        <?php
        if ($page > 1) {
            echo '<li class="page-item"><a class="page-link" href="../pages/'.$liste.'?page=' . ($page - 1) . '"> Précédent </a> </li>';
        }
        // Afficher les numéros des pages
        for ($page = 1; $page <= $number_of_pages; $page++) {
            echo '<li class="page-item"><a class="page-link" href="../pages/'.$liste.'.php?page=' . $page . '">' . $page . '</a> </li>';
        }

        if ($_GET['page'] < $number_of_pages) {
            echo '<li class="page-item"><a class="page-link" href="../pages/'.$liste.'.php?page=' . ($_GET['page'] + 1) . '"> Suivant </a> </li>';
        }

        ?>
    </ul>
</nav>
<?php 
}