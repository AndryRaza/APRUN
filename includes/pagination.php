<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Précédent</a></li>
        <?php
        // display the links to the pages
        for ($page = 1; $page <= $number_of_pages; $page++) {
            echo '<li class="page-item"><a class="page-link" href="pagination_pdo.php?page=' . $page . '">' . $page . '</a> </li>';
        }

        ?>
        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
    </ul>
</nav>