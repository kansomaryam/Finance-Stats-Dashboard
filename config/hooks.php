<?php
/**
 * Hooks for the Finance Stats Dashboard plugin
 */

// Register activation hook to set default options
register_activation_hook(__FILE__, 'fsd_activate_plugin');
function fsd_activate_plugin() {
    // Set default values for revenue and expenses upon activation
    fsd_set_default_options();
}

// Shortcode for displaying the financial chart
function fsd_financial_chart_shortcode() {
    $revenue = get_option('fsd_revenue', 0);
    $expenses = get_option('fsd_expenses', 0);
    ob_start();
    ?>
    <canvas id="fsd-chart" width="400" height="200"></canvas>
    <script>
        var ctx = document.getElementById('fsd-chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Revenue', 'Expenses'],
                datasets: [{
                    label: 'Financial Data',
                    data: [<?php echo $revenue; ?>, <?php echo $expenses; ?>],
                    backgroundColor: ['#4CAF50', '#FF5733']
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
    return ob_get_clean();
}
add_shortcode('fsd_financial_chart', 'fsd_financial_chart_shortcode');
