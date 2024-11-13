<div class="container d-flex justify-content-center mt-4">
        <canvas id="gank" width="300" height="300"></canvas>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>


<?php
$data = [
    'On se fait gank' => nosGanks(),
    'Ils se font gank' => leursGanks (),
];
$labels =  json_encode(array_keys($data));
$values = json_encode(array_values($data));
?>

<script>
const labelsGank = <?php echo $labels ?>;
const dataGank = <?php echo $values ?>;

const canvas = document.getElementById('gank').getContext('2d');

const gank = new Chart(canvas, {
            type: 'pie',
            data: {
                labels: labelsGank,
                datasets: [{
                    data: dataGank,
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
                                const dataArray = context.dataset.data.map(Number);
                                const total = dataArray.reduce( ( acc, val ) => acc + val, 0 );
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
<?php
