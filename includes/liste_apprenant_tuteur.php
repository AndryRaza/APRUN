<?php
require_once 'bdd.php';

$id_tuteur = $_POST['id'];
$nom_tuteur = $_POST['nom_tuteur'];


$req = $bdd->prepare("SELECT utilisateur.nom AS nom, utilisateur.prenom AS prenom, promotion.nom AS promotion
                 FROM  `utilisateur_tuteur`
                 INNER JOIN `utilisateur` ON utilisateur.id_user = utilisateur_tuteur.id_user_apprenant
                 INNER JOIN `utilisateur_promotion` on utilisateur_promotion.id_user = utilisateur.id_user 
                 INNER JOIN `promotion` ON promotion.id_promo = utilisateur_promotion.id_promo
                 WHERE id_user_tuteur = '$id_tuteur'
    
    ");
$req->execute();
$tab = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();
?>

<section class="container-fluid py-5">
    <h1 class="text-center">Apprenant de <?= $nom_tuteur; ?> </h1>
    <div class="container">
        <div class="d-flex justify-content-center">
            <form action="admin_ajouter_apprenants_tuteur.php" method="POST">
                <input type="hidden" name="id_tuteur" value="<?= $id_tuteur ?>">
                <button class="btn mb-3" type="submit" name="add">
                    <img src="../ressources/img/add.png" width="40px" height="40px">
                </button>
            </form>
        </div>
        <ul class="list-group list-group-flush text-center">
            <?php foreach ($tab as $key => $value) { ?>
                <li class="list-group-item">Nom : <?= $value['nom'] . '<br> Prénom : ' . $value['prenom'] 
                 . '<br> Promotion : ' . $value['promotion']
                 ; ?></li>
            <?php } ?>
        </ul>
    </div>

</section>