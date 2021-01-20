<?php
$titre = 'Liste de vos apprenants';
$allow = '3';
require_once '../includes/header.php';
require_once '../includes/bdd.php';

$id_apprenant = $_POST['id'];
$_SESSION['user_apprenant'] = $_POST['id'];

$req = $bdd->prepare("SELECT `nom`, `prenom` FROM `utilisateur` WHERE id_user = '$id_apprenant'");
$req->execute();
$tab2 = $req->fetch(PDO::FETCH_ASSOC);
$req->closeCursor();




?>

<div class="d-flex flex-column text-center mt-5">
    <h1>
        Apprenant : <?= $tab2['nom']  . ' ' . $tab2['prenom']; ?>
    </h1>

</div>

<?php

require_once '../includes/tuteur_apprenant_presence.php';

?>

<div class="container" id='calendar_tuteur'>
</div>

<script>

        var calendarEl = document.getElementById('calendar_tuteur');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            locale: 'fr',
            buttonText: {
                today: 'Aujourd\'hui',
                month: 'Mois',
                week: 'Semaine',
                day: 'Journee',
                list: 'Liste'
            },
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },

            navLinks: true, // can click day/week names to navigate views
            dayMaxEvents: true, // allow "more" link when too many events
            events: {
                url: 'http://127.0.0.1:8080/edsa-App_run/includes/tuteur_apprenant_edt.php'

            },

        });

        calendar.render();

</script>



<?php

require_once '../includes/footer.php';

?>

<style>
    @media all and (max-width: 870px) {


        .fc-header-toolbar {
            display: flex;
            flex-direction: column;
        }
    }
</style>