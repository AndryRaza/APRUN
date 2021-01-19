<?php

require_once 'bdd.php';


$req = $bdd->prepare("SELECT utilisateur.nom AS nom, utilisateur.prenom AS prenom, utilisateur.id_user as id, promotion.nom AS promotion
                    FROM  `utilisateur_tuteur`
                    INNER JOIN `utilisateur` ON utilisateur.id_user = utilisateur_tuteur.id_user_apprenant
                    INNER JOIN `utilisateur_promotion` on utilisateur_promotion.id_user = utilisateur.id_user 
                    INNER JOIN `promotion` ON promotion.id_promo = utilisateur_promotion.id_promo
                    WHERE id_user_tuteur IS NULL
");
$req->execute();
$tab = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();

?>

<section class="container-fluid py-5">
    <div class="container">
        <h1 class="text-center">Liste des apprenants sans tuteur</h1>
        <ul class="list-group list-group-flush text-center">
            <?php foreach ($tab as $key => $value) { ?>
                <li class="list-group-item d-flex justify-content-center"> Nom : <?= $value['nom'] . '<br> Prénom : ' . $value['prenom']
                                                                . '<br> Promotion : ' . $value['promotion']; ?>
                    <form action="../includes/liaison_tuteur_apprenant.php" method="POST">
                        <input type="hidden" name="id_tuteur" value="<?= $id_tuteur ?>">
                        <input type="hidden" name="id_apprenant" value="<?= $value['id'] ?>">
                        <button class="btn mt-3" type="submit" name="add">
                            <img src="../ressources/img/add.png" width="20px" height="20px">
                        </button>
                    </form>
                </li>
            <?php } ?>
        </ul>
    </div>

</section>