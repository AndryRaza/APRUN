<?php 

$allow = "0";    
$titre = "Messagerie Admin";
require_once '../includes/header.php';
require_once '../includes/fonctions.php';
?>

    <!---------- Tableau messagerie ---------->
    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>De</th>
                        <th>Date</th>
                        <th>Message</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        affichage_messagerie();
                   ?>

                </tbody>
            </table>
        </div>
    </div>

    <div id="afficher_modal">
    </div>

<?php 

require_once '../includes/footer.php';

?>