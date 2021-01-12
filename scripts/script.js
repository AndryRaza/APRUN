
document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');

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
    editable: true,
    navLinks: true, // can click day/week names to navigate views
    dayMaxEvents: true, // allow "more" link when too many events
    events: {
      url: 'http://127.0.0.1:8080/edsa-App_run/includes/evenements.php'

    },

  });

  calendar.render();
});


var check = function () {
  if (document.getElementById('role').value === 'Apprenant') {
    document.getElementById('promotion').style.display = 'block';
  }
  if (document.getElementById('role').value === 'Formateur') {
    document.getElementById('promotion').style.display = 'none';
  }

  console.log('Script chargé');
}

$(document).ready(function(){

  $('.form_justif').submit(function(){
       var email = $('.email').val();
       var date = $('.date').val();
       var motif = $('.motif').val();
       var description = $('.description').val();

      //C'est pour envoyer et stocker dans la bdd
      $.post('http://127.0.0.1:8080/edsa-App_run/includes/justificatif_modal.php',{email:email,date:date,motif:motif,description:description},function(donnees){
        $('.afficher_modal').html(donnees);
      
        $("#exampleModal").modal('show');
      });
      return false; //pour empecher que ca envoie 
      
  })

  function reset(){
    $('.email').val('');
    $('.date').val('');
    $('.motif').val('');
    $('.description').val('');
  };

});