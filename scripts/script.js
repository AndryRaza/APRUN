
document.addEventListener('DOMContentLoaded', function () {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'fr'
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
