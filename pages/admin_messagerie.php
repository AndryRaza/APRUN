<?php 

$allow = "0";    

require_once '../includes/header.php';
require_once '../includes/fonctions.php';
?>

    <!---------- Tableau messagerie ---------->
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>De</th>
                        <th>Date</th>
                        <th>Message</th>
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



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex flex-column align-items-start">
                    <div>De: john.doe@mail.com</div>
                    <div>Raison : Malade</div>
                    <div>Date : 01/01/2021</div>
                </div>
                <div class="modal-body">
                    <textarea name="commentaire" id="" cols="55" rows="10">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusantium doloremque nam iste dolor natus fugit repudiandae vitae, atque laborum ab ullam minus dicta nobis sapiente inventore nemo ducimus consequatur aperiam.</textarea>
                    <div><a href="#" class="text-decoration-none">Voir pdf</a></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

<?php 

require_once '../includes/footer.php';

?>