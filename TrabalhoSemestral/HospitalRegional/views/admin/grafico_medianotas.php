<?php
$title = 'Média das Notas por Pergunta';
ob_start();
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="/admin" class="d-flex align-items-center btn btn-outline-secondary me-2">
        <span class="material-icons me-2">arrow_back</span> Voltar
    </a>
    <h1 class="mb-0"><?= $title; ?></h1>
    <p></p>
</div>

<div class="mt-4">
    <canvas id="mediaNotasChart" width="400" height="200"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const mediaNotas = <?= json_encode($mediaNotasPorPergunta); ?>;
        
        const labels = mediaNotas.map(item => item.texto_pergunta);
        const data = mediaNotas.map(item => item.media_resposta);

        const ctx = document.getElementById('mediaNotasChart').getContext('2d');
        const mediaNotasChart = new Chart(ctx, {
            type: 'bar',  // Tipo de gráfico (continua sendo barra)
            data: {
                labels: labels,
                datasets: [{
                    label: 'Média das Notas',
                    data: data,
                    backgroundColor: data.map(media => {
                        // Defina a cor com base na média
                        if (media < 4) {
                            return 'rgba(255, 99, 132, 0.6)';  // Cor para médias baixas (vermelho)
                        } else if (media >= 4 && media < 7) {
                            return 'rgba(255, 159, 64, 0.6)';  // Cor para médias médias (laranja)
                        } else {
                            return 'rgba(75, 192, 192, 0.6)';  // Cor para médias altas (verde)
                        }
                    }),
                    borderColor: data.map(media => {
                        // A borda pode ser um pouco mais escura que a cor de fundo
                        if (media < 4) {
                            return 'rgba(255, 99, 132, 1)';
                        } else if (media >= 4 && media < 7) {
                            return 'rgba(255, 159, 64, 1)';
                        } else {
                            return 'rgba(75, 192, 192, 1)';
                        }
                    }),
                    borderWidth: 2,
                    borderRadius: 5  
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return `Média: ${tooltipItem.raw.toFixed(2)}`;
                            }
                        }
                    },
                    legend: {
                        display: true,  // Exibe a legenda
                        labels: {
                            generateLabels: function(chart) {
                                return [
                                    {
                                        text: 'Média Baixa (< 4)',
                                        fillStyle: 'rgba(255, 99, 132, 0.6)',
                                        strokeStyle: 'rgba(255, 99, 132, 1)'
                                    },
                                    {
                                        text: 'Média Média (4 - 7)',
                                        fillStyle: 'rgba(255, 159, 64, 0.6)',
                                        strokeStyle: 'rgba(255, 159, 64, 1)'
                                    },
                                    {
                                        text: 'Média Alta (> 7)',
                                        fillStyle: 'rgba(75, 192, 192, 0.6)',
                                        strokeStyle: 'rgba(75, 192, 192, 1)'
                                    }
                                ];
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    },
                    y: {
                        ticks: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    </script>
</div>

<?php
$content = ob_get_clean();
include '../views/templates/template.php';
?>
