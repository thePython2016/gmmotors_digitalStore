<?php
/**
 * Clear WordPress Cache Script
 * Run this file once from your browser to clear all caches
 * Then delete this file for security
 */

// Load WordPress
require_once('wp-load.php');

// Clear object cache
wp_cache_flush();

// Clear transients
global $wpdb;
$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_%'");
$wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE '_site_transient_%'");

// Clear any plugin caches
if (function_exists('wp_cache_clear_cache')) {
    wp_cache_clear_cache();
}

// Clear WooCommerce cache if exists
if (function_exists('wc_delete_product_transients')) {
    wc_delete_product_transients();
}

echo "✓ WordPress cache cleared successfully!<br>";
echo "✓ Transients cleared!<br>";
echo "✓ Now delete this file (clear-cache.php) for security.<br>";
echo "<br><a href='/'>Go to Home Page</a>";
?>
