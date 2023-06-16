@extends('test.index')
@Section('content')<!-- Autres balises et contenu HTML de votre vue Blade -->

<!-- Inclure la balise <canvas> pour afficher le graphique -->
<canvas id="pieChart"></canvas>

<!-- Inclure le code JavaScript pour créer le graphique -->
<script>
    // Récupérer les données JSON passées depuis le contrôleur
    var pieData = {!! $pieDataJson !!};

    // Créer le graphique pie en utilisant Chart.js
    var ctx = document.getElementById('pieChart').getContext('2d');
    var pieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: pieData.map(data => data.role),
            datasets: [{
                data: pieData.map(data => data.count),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.8)',
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 205, 86, 0.8)',
                    // Ajoutez d'autres couleurs si nécessaire
                ]
            }]
        }
    });
</script>

<!-- Autres balises et contenu HTML de votre vue Blade -->


    @endsection
