<?php
/**
 * Enqueue scripts and styles for the Finance Stats Dashboard plugin
 */

function fsd_enqueue_scripts() {
    // Enqueue Chart.js library
    wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', array(), null, true);
    
    // Enqueue custom plugin styles
    wp_enqueue_style('fsd-style', FSD_PLUGIN_URL . 'assets/css/style.css', array(), FSD_VERSION);
}
add_action('wp_enqueue_scripts', 'fsd_enqueue_scripts');
