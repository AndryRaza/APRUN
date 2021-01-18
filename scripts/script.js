
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
  if (document.getElementById('role').value === '1') {
    document.getElementById('promotion').style.display = 'block';
  }
  if (document.getElementById('role').value === '2' || document.getElementById('role').value === '3') {
    document.getElementById('promotion').style.display = 'none';
  }

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
                Voulez-vous vraiment supprimer l'utilisateur "`+ nom + `" ?
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

function afficher_modal_imprimer_absence(date, promotion, id_img) {


  document.getElementById('afficher_modal_imprimer_absence').innerHTML = `
  <div class="modal fade" id="exampleModal_" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body" id="pdf">
          <section class="container d-flex flex-column">
          <h1 class="text-center">Feuille d'émargement du` + date + `</h1>
          <h2 class="text-center">Promotion - `+ promotion + `</h2>
          <div class="align-self-center d-flex flex-column align-items-center">
              <h2>Absent(s)</h2>
              <ul>
                  <li>John Snow</li>
                  <li>John Sun</li>
              </ul>
              <img class="w-50 h-50" src="../ressources/signature/`+ id_img +`.png" alt="signature">
          </div>
      </section>
          </div>
          <div class="modal-footer">
              <button type="button" onclick="ExportPdf()" class="btn btn-primary">Télécharger</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          </div>
      </div>
  </div>
</div>

  `;

  //document.getElementById('liste_absence').innerHTML = liste;

  $("#exampleModal_").modal('show');
}

function ExportPdf() {
  kendo.drawing
    .drawDOM("#pdf",
      {
        paperSize: "A4",
        margin: { top: "1cm", bottom: "1cm" },
        scale: 0.8,
        height: 500
      })
    .then(function (group) {
      kendo.drawing.pdf.saveAs(group, "Exported.pdf")
    });
}

$(document).ready(function() {

  function myFunction() {
     setInterval(function() {
          $('header#notification').load('#notification');
      }, 1000);
  };

  myFunction();
})


function checked_un(id) {
  document.getElementById("present_"+id).checked = true;
  document.getElementById("absent_"+id).checked = false;
  console.log('in');
}

function checked_deux(id) {
  document.getElementById("absent_"+id).checked = true;
  document.getElementById("present_"+id).checked = false;
}