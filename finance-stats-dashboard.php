<?php
/**
 * sample plugin
 *
 * @package     blogger
 * @author      Maryam K
 * @copyright   2024 Maryam K
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Finance Stats Dashboard
 * Plugin URI:  http://blogger.local/sample-plugin
 * Description: This plugin allows users to display key financial metrics, statistics, and growth.
 * Version:     1.0.0
 * Author:      Maryam K
 * Author URI:  https://example.com
 * Text Domain: plugin-slug
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 *
*/

// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit;
}

// Include the necessary files
require_once plugin_dir_path(__FILE__) . 'includes/admin-page.php';
require_once plugin_dir_path(__FILE__) . 'includes/charts.php';
require_once plugin_dir_path(__FILE__) . 'includes/data-input.php';
/*require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';*/

// Enqueue styles and scripts
function financial_stats_enqueue_styles() {
    wp_enqueue_style('financial-stats-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'financial_stats_enqueue_styles');