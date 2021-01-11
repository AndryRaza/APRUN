<script src="../scripts/signature_functions.js"></script>
<script src="../scripts/signature.js"></script>

<?php



if (isset($_POST['valider_promo_formateur'])) {

    $id_promo = $_POST['choix_promo_formateur'];

    require_once 'bdd.php';

    //On va sélectionner le nom de la promotion, ainsi que la liste de tous les apprenants de cette formations avec la table utilisateur_promotion

    $req = $bdd->prepare("SELECT promotion.nom AS nom_promo,promotion.debut AS debut_promo,promotion.fin AS fin_promo,
                        utilisateur.nom AS nom_utilisateur, utilisateur.prenom as prenom_utilisateur, utilisateur.id_user AS id_user
                        
                        FROM `utilisateur_promotion` 
                        INNER JOIN `utilisateur`ON utilisateur_promotion.id_user = utilisateur.id_user
                        INNER JOIN `promotion`ON promotion.id_promo = '$id_promo'
                        WHERE utilisateur_promotion.id_promo = '$id_promo'
                        ");
    $req->execute();
    $tab_utilisateur = $req->fetchAll(PDO::FETCH_ASSOC);

    $req_promo = $bdd->prepare("SELECT `nom`,`debut`, `fin` FROM `promotion` WHERE id_promo = '$id_promo'");
    $req_promo->execute();
    $tab_promotion = $req_promo->fetch(PDO::FETCH_ASSOC);

    //On va chercher si l'appel a été fait ou pas, si oui on désactivera le bouton pour valider la feuille d'appel

    $appel_fait = false;





?>

    <div class="d-flex flex-column text-center mt-5">
        <h1>
            Feuille d'émargement
        </h1>

        <p>Promotion : <?= $tab_promotion['debut'] . '-' . $tab_promotion['fin'] . ' - ' . $tab_promotion['nom']  ?> </p>

        <p>Date : <?= date('d-m-Y'); ?></p>
    </div>

    <section class="container text-center bg-light py-5">
        <form action="../includes/absence.php" method="POST">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Présent(e)</th>
                        <th scope="col">Absent(e)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tab_utilisateur as $key => $value) {
                    ?>
                        <tr>
                            <th scope="row"><?= $value['nom_utilisateur'] ?></th>
                            <td><?= $value['prenom_utilisateur'] ?></td>
                            <td>

                                <input type="checkbox" name="present_<?= $value['id_user'] ?>" checked>

                            </td>
                            <td><input type="checkbox" name="absent_<?= $value['id_user'] ?>"></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <input type="hidden" name="id_promo" value="<?= $id_promo ?>">
            <input type="hidden" name="date" value=" <?= date('Y-m-d'); ?>">




            <div id="canvas">
                <canvas class="roundCorners" id="newSignature" style="position: relative; margin: 0; padding: 0; border: 1px solid #c4caac;"></canvas>
            </div>
            <script>
                signatureCapture();
            </script>
            <button class="btn btn-primary" type="button" onclick="signatureSave()">Valider la signature</button>
            <button class="btn btn-primary" type="button" onclick="signatureClear()">Effacer la signature</button>
            <br>
            <img id="saveSignature" alt="Saved image png" />
            <br>
            <input type="submit" class="btn btn-primary mt-5" value="Valider" name="valider_emargement">
        </form>
    </section>

<?php
}
