<?php
/**
 * Default options for the Finance Stats Dashboard plugin
 */

// Default financial values if no data is saved yet
$fsd_default_options = array(
    'fsd_revenue'  => 0, // Default revenue
    'fsd_expenses' => 0, // Default expenses
);

// Hook to set these options upon plugin activation
function fsd_set_default_options() {
    foreach ($fsd_default_options as $key => $value) {
        if (!get_option($key)) {
            update_option($key, $value);
        }
    }
}
add_action('admin_init', 'fsd_set_default_options');
