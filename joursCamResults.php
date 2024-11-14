
<div class="container mt-4 border-left border-right">
    <ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="index.php?page=jours" class="nav-link active bg-dark text-light">Victoires/défaites de la semaine</a>
    </li>
    <li class="nav-item">
        <a href="index.php?page=joursGanks" class="nav-link text-dark">Ganks de la semaine</a>
    </li>
</ul>
<div class="d-flex justify-content-around flex-wrap mt-4">
    <?php
    include "traitement/fonctions.php";
    $joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    $dataForCharts = [];

    foreach ($joursSemaine as $jour) {
        // Obtenir les résultats pour chaque jour
        $resultsForDay = getResultForToday($jour);
        $dataForCharts[$jour] = $resultsForDay;
        
        // Générer les <canvas> pour chaque jour
        echo "<div class='chart-container m-3'>
                <canvas id='result_$jour' width='300' height='300'></canvas>
              </div>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script>
        // Données PHP pour chaque jour en JSON
        const dataFromPHPResults = <?php echo json_encode($dataForCharts); ?>;

        // Configuration pour chaque camembert
        const backgroundColors = ['#1A1A40', '#D1A684', '#FF6F61', '#8C7B6B'];
        
        // Créer un camembert pour chaque jour
        Object.keys(dataFromPHPResults).forEach(day => {
            const dataForDay = dataFromPHPResults[day];
            const labels = dataForDay.map(entry => entry.result);
            const data = dataForDay.map(entry => entry.total);

            const ctx = document.getElementById(`result_${day}`).getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: `Nombre de victoires/défaites pour ${day}`,
                        data: data,
                        backgroundColor: backgroundColors,
                        borderColor: backgroundColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: false,
                    plugins: {
                        legend: { position: 'bottom' },
                        title: { display: true, text: `Nombre de Victoire/Défaite pour ${day}` },
                        datalabels: {
                            display: true,
                            formatter: (value, context) => {
                                const dataArray = context.dataset.data.map(Number);
                                const total = dataArray.reduce((acc, val) => acc + val, 0);
                                return ((value / total) * 100).toFixed(1) + '%';
                            },
                            color: '#FFFFFF',
                            font: { weight: 'bold', size: 16 },
                            anchor: 'center',
                            align: 'center',
                            offset: 0
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        });
    </script>
</div>
