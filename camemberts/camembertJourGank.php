<div class="container d-flex justify-content-center mt-4">
        <canvas id="gankJour" width="300" height="300"></canvas>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<?php
$date = new DateTime();
$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
$formatter->setPattern('EEEE'); // pour afficher le jour en toutes lettres
$jourActuel = ucfirst($formatter->format($date)); // Majuscule initiale

$ganksForToday = getGanksForToday($jourActuel);
$dataForChart = json_encode($ganksForToday);
?>
<script>
// Récupérer les données PHP
const dataFromPHP = <?php echo $dataForChart; ?>;

// Préparer les labels et les valeurs pour le graphique
const labelsJour = dataFromPHP.map(entry => entry.gank);
const dataJour = dataFromPHP.map(entry => entry.total);

// Créer le graphique avec Chart.js
const canvasJour = document.getElementById('gankJour').getContext('2d');
new Chart(canvasJour, {
    type: 'pie', 
    data: {
        labels: labelsJour,
        datasets: [{
            label: 'Nombre de ganks pour <?php echo $jourActuel; ?>',
            data: dataJour,
            backgroundColor: [
                '#1A1A40',
                '#D1A684',
                '#FF6F61',
                '#8C7B6B',

            ],
            borderColor: [
                '#1A1A40',
                '#D1A684',
                '#FF6F61',
                '#8C7B6B',
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: false,
        plugins: {
            legend: {
                position: 'bottom',
            },
            title: {
                display: true,
                text: 'Nombre de ganks pour <?php echo $jourActuel; ?>'
            },
            datalabels: {
                display: true,
                formatter: ( value, context ) =>
                            {
                                const total = context.dataset.data.reduce( ( acc, val ) => acc + val, 0 );
                                const percentage = ( ( value / total ) * 100 ).toFixed( 1 ) + '%';
                                return percentage;
                            },
                            color: '#FFFFFF', // Couleur du texte
                            font: {
                                weight: 'bold',
                                size: 16
                            },
                            // Alignement et positionnement des labels
                            anchor: 'center', // Centrer le texte dans chaque secteur
                            align: 'center', // Alignement du texte
                            offset: 0 // Pas de décalage
                        }
                    }
                },
                plugins: [ ChartDataLabels ]  // Forcer l'intégration du plugin
});
</script>
