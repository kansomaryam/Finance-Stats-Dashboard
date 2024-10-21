<?php

// Function to display the input form and handle submissions
function fsd_input_form() {
    ?>
    <form method="post" action="">
        <?php wp_nonce_field('fsd_save_data', 'fsd_nonce'); ?>
        <input type="text" name="revenue" placeholder="Enter Revenue" required />
        <input type="text" name="expenses" placeholder="Enter Expenses" required />
        <input type="submit" name="submit" value="Save Data" />
    </form>
    <?php

    if (isset($_POST['submit'])) {
        // Verify the nonce before proceeding
        if (isset($_POST['fsd_nonce']) && wp_verify_nonce($_POST['fsd_nonce'], 'fsd_save_data')) {
            // Sanitize input and save data
            $revenue = sanitize_text_field($_POST['revenue']);
            $expenses = sanitize_text_field($_POST['expenses']);
            update_option('fsd_revenue', $revenue);
            update_option('fsd_expenses', $expenses);
            
            // Show success message with shortcode info
            echo '<p>Data saved successfully! Use the shortcode <code>[fsd_chart]</code> to display the chart.</p>';
        } else {
            // Nonce verification failed
            echo '<p>Error: Nonce verification failed. Please try again.</p>';
        }
    }
}

// Function to generate chart using shortcode
function fsd_display_chart() {
    // Get the saved revenue and expenses
    $revenue = get_option('fsd_revenue', 0);
    $expenses = get_option('fsd_expenses', 0);

    // Output the chart container
    ob_start();
    ?>
    <canvas id="fsd-chart" width="400" height="400"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('fsd-chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Revenue', 'Expenses'],
                datasets: [{
                    label: 'Financial Data',
                    data: [<?php echo esc_js($revenue); ?>, <?php echo esc_js($expenses); ?>],
                    backgroundColor: ['#36a2eb', '#ff6384'],
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('fsd_chart', 'fsd_display_chart');
