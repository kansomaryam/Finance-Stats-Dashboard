<?php

function renderChart() {
    $revenue = get_option('fsd_revenue', 0);
    $expenses = get_option('fsd_expenses', 0);
    ?>
    <script>
        const ctx = document.getElementById('financialChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Revenue', 'Expenses'],
                datasets: [{
                    label: 'Financial Stats',
                    data: [<?php echo esc_js($revenue); ?>, <?php echo esc_js($expenses); ?>],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <?php
}
