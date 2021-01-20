<?php

if (isset($_GET['choix_promo'])) {
    $id_promo = $_GET['choix_promo'];
} else {
    $id_promo = $_POST['choix_promo'];   //On récupére l'id de l'utilisateur pour pouvoir récupérer sa promotion
}


require_once 'bdd.php';

//On va récupérer dans la table évènement le titre, quand ça commence et quand ça se finit

$req = $bdd->prepare("SELECT evenement.titre AS title, evenement.start AS start, evenement.end AS end
    from evenement WHERE id_promo = '$id_promo'
");

$req->execute();
$tab = $req->fetchALL(PDO::FETCH_ASSOC);

//On le transforme sous un "format json" 

?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar_admin');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'fr',
            buttonText: {
                today: 'Aujourd\'hui',
                month: 'Mois',
                week: 'Semaine',
                day: 'Journée',
                list: 'Liste'
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },

            navLinks: true, // can click day/week names to navigate views
            dayMaxEvents: true, // allow "more" link when too many events
            events: <?= json_encode($tab); ?>



        });

        calendar.render();
    });
</script>