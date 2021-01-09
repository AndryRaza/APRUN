<?php


$id_utilisateur = $_SESSION['user'];

require_once 'bdd.php';

//Faire un schéma pour comprendre cette jointure
$req = $bdd->prepare(" SELECT module.nom AS nom_module 
FROM utilisateur
INNER JOIN utilisateur_promotion ON utilisateur_promotion.id_user = utilisateur.id_user
INNER JOIN promotion_a_module ON promotion_a_module.id_promo = utilisateur_promotion.id_promo
INNER JOIN module ON module.id_module = promotion_a_module.id_module
WHERE utilisateur.id_user = '$id_utilisateur'
");

$req->execute();
$tab = $req->fetchAll(PDO::FETCH_ASSOC);

$path = "../data/edt.json";
$json = file_get_contents($path); //ouvre le fichier



?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        let evenement =  <?= $json ?>;
        
        var calendar = new FullCalendar.Calendar(calendarEl, {

            initialView: 'dayGridMonth',
            locale: 'fr',
            events: evenement
            
        });

        calendar.render();
    });
</script>