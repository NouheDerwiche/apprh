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
            hiddenDays: [0],

            editable: true,

            events: @json($taches),
            editable: true,
            selectable: true,
            eventClick: function (info) {
            var title = info.event.title;
            var nom = info.event.extendedProps.nom;
            var projet = info.event.extendedProps.projet;
            var description = info.event.extendedProps.description;
            var localisation = info.event.extendedProps.localisation;
            var nbheures = info.event.extendedProps.nbh;

            var start = info.event.extendedProps.debut;
            var end = info.event.extendedProps.fin;
// 'Nom Employe : ' + nom +
//            var nom = info.event.extendedProps.nom;

            // Afficher les données dans un popup ou une boîte de dialogue
            alert('Nom Employe : ' + nom +'\nTitre : ' + title + '\nNom projet : ' + projet + '\nDescription : ' + description + '\n Localisation : ' +localisation + '\n Nombre d heures : ' + nbheures);
        }

          });


        calendar.render();
    });
</script>

@endpush

