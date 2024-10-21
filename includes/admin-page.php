<?php

function fsd_add_admin_page() {
    add_menu_page(
        'Financial Stats',
        'Financial Stats',
        'manage_options',
        'financial-stats',
        'fsd_display_dashboard',
        'dashicons-chart-line',
        100
    );
}
add_action('admin_menu', 'fsd_add_admin_page');

function fsd_display_dashboard() {
    ?>
    <div class="wrap">
        <h1>Financial Statistics Dashboard</h1>
        <?php fsd_input_form(); ?> <!-- Include the input form -->
        <canvas id="financialChart" width="400" height="200"></canvas>
        <script>
            // Call the renderChart function
            renderChart();
        </script>
    </div>
    <?php
}
