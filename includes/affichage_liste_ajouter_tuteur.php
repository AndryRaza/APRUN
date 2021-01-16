<?php

require_once 'bdd.php';


$req = $bdd->prepare("SELECT utilisateur.nom AS nom, utilisateur.prenom AS prenom, utilisateur.id_user as id
                    FROM  `utilisateur_tuteur`
                    INNER JOIN `utilisateur` ON utilisateur.id_user = utilisateur_tuteur.id_user_apprenant
                    WHERE id_user_tuteur IS NULL
");
$req->execute();
$tab = $req->fetchAll(PDO::FETCH_ASSOC);
$req->closeCursor();

?>

<section class="container-fluid py-5">
    <div class="container">
        <ul class="list-group list-group-flush text-center">
            <?php foreach ($tab as $key => $value) { ?>
                <li class="list-group-item d-flex"><?= $value['nom'] . ' ' . $value['prenom']; ?>
                    <form action="../includes/liaison_tuteur_apprenant.php" method="POST">
                        <input type="hidden" name="id_tuteur" value="<?= $id_tuteur ?>">
                        <input type="hidden" name="id_apprenant" value="<?= $value['id'] ?>">
                        <button class="btn" type="submit" name="add">
                            <img src="../ressources/img/add.png" width="40px" height="40px">
                        </button>
                    </form>
                </li>
            <?php } ?>
        </ul>
    </div>

</section>