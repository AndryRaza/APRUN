<?php
$titre = 'Formulaire d\'inscription';
$allow = '0';
require_once '../includes/fonctions.php';
require_once '../includes/header.php';

if (isset($_POST['modifier'])) {
    $id = $_POST['id']; //On récupère l'id de l'utilisateur
    $role = $_POST['role']; //De son rôle qui déterminera certains paramètres à afficher ou non


    $servername = "localhost";
    $username = "root";
    $password = NULL;
    $dbname = "bdd_app_aprun";

    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($role === '1') {    //Si l'utilisateur est un apprenant, on récupère ses infos perso + sa promotion
        $req = $bdd->prepare(" SELECT utilisateur.nom AS nom_user , utilisateur.prenom AS prenom_user, utilisateur.email AS email, promotion.nom AS promo_nom
                        FROM `utilisateur` 
                        INNER JOIN `utilisateur_promotion` ON utilisateur.id_user = utilisateur_promotion.id_user
                        INNER JOIN `promotion` ON promotion.id_promo = utilisateur_promotion.id_promo
                        WHERE utilisateur.id_user = '$id'
                        ");
    } else {    //Sinon il s'agit d'un formateur, on ne récupère que ses infos perso
        $req = $bdd->prepare(" SELECT utilisateur.nom AS nom_user , utilisateur.prenom AS prenom_user, utilisateur.email AS email
                        FROM `utilisateur` 
                        WHERE utilisateur.id_user = '$id'
                        ");
    }
    $req->execute();

    $tab_utilisateur = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach ($tab_utilisateur as $key => $value) {
?>


        <h1 class="mt-5 text-center">Formulaire de modification</h1>

        <section class="container-fluid d-flex justify-content-center my-5">
            <div id="formulaire_inscription" style="width:50%">
                <form class="d-flex flex-column" action="../includes/modification.php" method="POST">

                    <label class="mb-2" for="nom">Nom</label>
                    <input class=" form-control mb-4" value="<?= $value['nom_user'] ?>" type="text" name="nom" id="nom" required pattern="[A-Za-z - ]+">

                    <label class="mb-2" for="prenom">Prenom</label>
                    <input class=" form-control mb-4" type="text" value="<?= $value['prenom_user'] ?>" name="prenom" id="prenom" required pattern="[A-Za-z - é è ]+">

                    <?php if ($role === '1') { ?>
                        <label class="mb-2" for="promotion">Promotion :</label>
                        <select class="form-control mb-4" value=" <?= $value['promo_nom'] ?>" name="promotion" id="promotion">
                            <?php affichage_promotion(); ?>
                        </select>
                    <?php } ?>

                    <label class="mb-2" for="email">Adresse email</label>
                    <input class=" form-control mb-4" value="<?= $value['email'] ?>" type="mail" name="email" id="email" required>

                    <input type="hidden" value="<?= $id ?>" name="id">
                    <input type="submit" class="btn btn-secondary align-self-end" value="Modifier" name="btn_modifier" id="btn_modifier">
                </form>
            </div>
        </section>
<?php
    }
}

if (isset($_POST['supprimer'])) {

    $id = $_POST['id']; //On récupère l'id de l'utilisateur
    $servername = "localhost";
    $username = "root";
    $password = NULL;
    $dbname = "bdd_app_aprun";

    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req_user = $bdd->prepare("DELETE FROM `utilisateur` WHERE id_user = '$id'");
    $req_user->execute();
    $req_user_promo = $bdd->prepare("DELETE FROM `utilisateur_promotion` WHERE id_user = '$id'");
    $req_user_promo->execute();
    $req_user_role = $bdd->prepare("DELETE FROM `utilisateur_role` WHERE id_user = '$id'");
    $req_user_role->execute();
    $req_user_absence = $bdd->prepare("DELETE FROM `absence` WHERE id_user = '$id'");
    $req_user_absence->execute();
    $req_user_nbre_absence = $bdd->prepare("DELETE FROM `nbre_absence_utilisateur` WHERE id_user = '$id'");
    $req_user_nbre_absence->execute();
    
    header('Location: admin_gestion_compte_liste.php');
}


require_once '../includes/footer.php';

?>