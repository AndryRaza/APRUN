
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
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
