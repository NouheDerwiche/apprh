<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' rel='stylesheet' />

@livewireStyles

<div>
    <div id='calendar-container' wire:ignore>
        <div id='calendar'></div>
    </div>
</div>

@livewireScripts

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.min.js"></script>

<script>
    document.addEventListener('livewire:load', function () {
        const calendarEl = document.getElementById('calendar');
        const Calendar = FullCalendar.Calendar;
        const calendar = new Calendar(calendarEl, {
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            locale: 'fr',
            hiddenDays: [0],// nhar ahed mfes5ino

            editable: true,

            events: @json($taches),
            editable: true,
            selectable: true,

            eventClick: function (info) {
                var event = info.event;

    // Vérifier si l'événement est un jour férié
    if (event.extendedProps.isHoliday) {
        return; // Ne rien faire pour les jours fériés
    }
    var title = info.event.title;
    var nom = info.event.extendedProps.nom;
    var prenom=info.event.extendedProps.prenom;
    var projet = info.event.extendedProps.projet;
    var description = info.event.extendedProps.description;
    var localisation = info.event.extendedProps.localisation;
    var nbheures = info.event.extendedProps.nbh;
    var eventId = info.event.id;

    Swal.fire({
        title: 'Détails de tache',
        html: `
            <div>
                <p><strong>Titre :</strong> ${title}</p>
                <p><strong>Nom Employé :</strong> ${nom} ${prenom}</p>
                <p><strong>Nom Projet :</strong> ${projet}</p>
                <p><strong>Description :</strong> ${description}</p>
                <p><strong>Localisation :</strong> ${localisation}</p>
                <p><strong>Nombre d'heures :</strong> ${nbheures}</p>
            </div>
        `,

        showCloseButton: true,
        showLoaderOnConfirm: true,

    });
}



          });


        calendar.render();
    });
</script>

@endpush

