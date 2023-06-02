<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.css' rel='stylesheet' />

<?php echo \Livewire\Livewire::styles(); ?>


<div>
    <div id='calendar-container' wire:ignore>
        <div id='calendar'></div>
    </div>
</div>

<?php echo \Livewire\Livewire::scripts(); ?>


<?php $__env->startPush('scripts'); ?>
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

            events: <?php echo json_encode($taches, 15, 512) ?>,
            editable: true,
            selectable: true,
            eventClick: function (info) {
    var title = info.event.title;
    var nom = info.event.extendedProps.nom;
    var projet = info.event.extendedProps.projet;
    var description = info.event.extendedProps.description;
    var localisation = info.event.extendedProps.localisation;
    var nbheures = info.event.extendedProps.nbh;
    var eventId = info.event.id;

    Swal.fire({
        title: 'Détails de l\'événement',
        html: `<div table="table table-bordered justify-content-center align-items-center">
            <tbody>
                <tr><th>
                    <tr><th> <p><strong>Titre :</strong> </th> <td>${title}</td></tr>
                    <tr><th> <p><strong>Nom Employé :</strong> ${nom}</td></tr>
                        <tr><th><p><strong>Nom Projet :</strong>${projet}</td></tr>
                            <tr><th> <p><strong>Description :</strong> ${description}</td></tr>
                                <tr><th><p><strong>Localisation :</strong>${localisation}</td></tr>
                                    <tr><th> <p><strong>Nombre d'heures :</strong> ${nbheures}</td></tr>


            </tbody>
            </div>
        `,
        showCancelButton: true,
        cancelButtonText: 'Modifier',
        confirmButtonText: 'Supprimer',
        showLoaderOnConfirm: true,
        preConfirm: (choice) => {
            if (choice === 'cancel') {
                // Action de modification
                // Rediriger vers la page de modification avec l'identifiant de l'événement
                window.location.href = '/events/' + eventId + '/edit';
            } else if (choice === 'confirm') {
                // Action de suppression
                // Envoyer une requête AJAX pour supprimer l'événement
                // Exemple avec axios
                axios.delete('/events/' + eventId)
                    .then(response => {
                        Swal.fire('Suppression', 'L\'événement a été supprimé avec succès.', 'success');
                        // Recharger la page ou effectuer une autre action après la suppression
                        location.reload();
                    })
                    .catch(error => {
                        Swal.fire('Erreur', 'Une erreur est survenue lors de la suppression de l\'événement.', 'error');
                    });
            }
        }
    });
}

          });


        calendar.render();
    });
</script>

<?php $__env->stopPush(); ?>

<?php /**PATH C:\xampp\htdocs\pfe\apprh\resources\views/livewire/calendar.blade.php ENDPATH**/ ?>