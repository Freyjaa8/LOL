
<div class="container d-flex justify-content-center mt-4">
        <canvas id="looseGank" width="300" height="300"></canvas>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>


<?php
$data = [
    'On s\'est fait gank' => noslooseGank(),
    'Ils se sont fait ganks' => leurlooseGank(),
];
$labels =  json_encode(array_keys($data));
$values = json_encode(array_values($data));
?>

<script>
const labelsLoose = <?php echo $labels ?>;
const dataLoose = <?php echo $values ?>;

const canvasLoose = document.getElementById('looseGank').getContext('2d');

const myPieChartLoose = new Chart(canvasLoose, {
            type: 'pie',
            data: {
                labels: labelsLoose,
                datasets: [{
                    data: dataLoose,
                    backgroundColor: [
                        '#1A1A40',
                        '#D1A684',                       
                    ],
                    borderColor: [
                        '#1A1A40',
                        '#D1A684',
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
                        datalabels: {
                            // Format de l'étiquette des données
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
            } );
    </script>
