<section class="container-fluid h-100 mt-5" id="presence_apprenant">

    <h1 class="text-center">Stats de présence</h1>

    <div class="container py-5 w-75 bg-light">
        <h2>Présence/Absence :</h2>
        <p class="py-2">
            Nombres d'heures de présence :
        </p>
        <p class="py-2">
            Nombres d'heures d'absence :
        </p>
        <p class="py-2">
            Pourcentage de présence :
        </p>
    </div>

    <div class="container mt-5 text-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-light border " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Justifier une absence
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Absence</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <select class="form-control" id="motif" name="motif">Choisir un motif
                                <option>Maladie</option>
                                <option>Rendez-vous</option>
                                <option>Autre</option>
                            </select>
                            <input type="date" class="form-control my-2" id="date_motif" name="date_motif">
                            <input type="file" class="form-control my-2" id="justificatif" name="justificat">
                            <textarea class="form-control my-2" id="description_motif" name="description_motif" rows="10"></textarea>
                            <input type="submit" class="btn btn-secondary" value="Envoyer" name="envoi_justificatif">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
