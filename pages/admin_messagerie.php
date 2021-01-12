<?php 

$allow = "0";    

require_once '../includes/header.php';

?>

    <!---------- Tableau messagerie ---------->
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>De</th>
                        <th>Date</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">john.doe@mail.com</a></td>
                        <td>07/01/2021</td>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sint est illum perspiciatis facilis quae doloribus, asperiores iste suscipit distinctio sequi. Reprehenderit saepe similique nostrum, assumenda dolore accusamus nisi mollitia. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi dicta architecto reprehenderit aspernatur quasi omnis quos, eveniet cupiditate numquam sint velit nulla praesentium reiciendis. Aspernatur esse eius alias quos voluptas?</p>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">james.bond@mail.com</a></td>
                        <td>15/12/2020</td>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sint est illum perspiciatis facilis quae doloribus, asperiores iste suscipit distinctio sequi. Reprehenderit saepe similique nostrum, assumenda dolore accusamus nisi mollitia.</p>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="" data-bs-toggle="modal" data-bs-target="#exampleModal">neo.anderson@mail.com</a></td>
                        <td>23/O5/2020</td>
                        <td>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sint est illum perspiciatis facilis quae doloribus, asperiores iste suscipit distinctio sequi. Reprehenderit saepe similique nostrum, assumenda dolore accusamus nisi mollitia.</p>
                        </td>
                    </tr>
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