<?php
// Load WordPress environment
require_once('wp-load.php');

$taxonomies = [
    'pa_condition',
    'pa_year',
    'pa_make',
    'pa_model',
    'pa_body-type',
    'pa_mileage_range',   // WooCommerce "Mileage range" -> underscores
    'pa_mileage-range',   // alternate hyphen slug
];

echo "Checking Taxonomies...\n";
foreach ($taxonomies as $tax) {
    if (taxonomy_exists($tax)) {
        echo "[OK] Taxonomy '$tax' exists.\n";
        $terms = get_terms([
            'taxonomy' => $tax,
            'hide_empty' => false,
        ]);
        if (!is_wp_error($terms)) {
            echo "     Found " . count($terms) . " terms.\n";
            foreach (array_slice($terms, 0, 3) as $term) {
                echo "     - " . $term->name . " (" . $term->slug . ")\n";
            }
        } else {
            echo "     [ERROR] Could not retrieve terms: " . $terms->get_error_message() . "\n";
        }
    } else {
        echo "[FAIL] Taxonomy '$tax' DOES NOT exist.\n";
    }
}
