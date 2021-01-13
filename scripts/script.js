
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

function afficher_modal_justificatif(email, date, motif, description) {

  document.getElementById('afficher_modal').innerHTML = `
    
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header d-flex flex-column align-items-start">
              <div>`+ email + `</div>
              <div>Raison : `+ motif + `</div>
              <div>Date : `+ date + `</div>
          </div>
          <div class="modal-body">
              <p>
              `+ description + `
             </p>
              <div><a href="#" class="text-decoration-none">Voir pdf</a></div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="reset()">Fermer</button>
          </div>
      </div>
  </div>
</div>
  
  `;
  $("#exampleModal").modal('show');
}

function afficher_modal_suppression(nom, id, role) {

  document.getElementById('afficher_modal_supprimer').innerHTML = `
    
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimer l'utilisateur "`+nom + `" ?
            </div>
            <div class="modal-footer">
                <form action="formulaire_modification.php" method="POST">
                    <input type="hidden" name="id" value="`+ id + `">
                    <input type="hidden" name="role" value="`+ role + `">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary" name="supprimer">Oui</button>
                </form>
            </div>
        </div>
    </div>
</div>

  `;
  $("#exampleModal").modal('show');
}