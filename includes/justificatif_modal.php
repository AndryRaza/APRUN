<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex flex-column align-items-start">
                <div><?= $_POST['email'] ?></div>
                <div>Raison : <?= $_POST['motif'] ?></div>
                <div>Date : <?= $_POST['date'] ?></div>
            </div>
            <div class="modal-body">
                <p>
                <?= $_POST['description'] ?>
               </p>
                <div><a href="#" class="text-decoration-none">Voir pdf</a></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="reset()">Fermer</button>
            </div>
        </div>
    </div>
</div>

