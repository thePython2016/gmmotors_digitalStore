<?php
/**
 * Search Result Sidebar page template (by slug).
 *
 * Matches page slug: search-result-sidebar
 * Example URL: /search-result-sidebar/?filter_make=toyota
 *
 * @package Astra
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header(); ?>

<?php if ( astra_page_layout() === 'left-sidebar' ) { ?>
	<?php get_sidebar(); ?>
<?php } ?>

<div id="primary" <?php astra_primary_class(); ?>>
	<?php astra_primary_content_top(); ?>

	<?php
	// Render the page content first (so Elementor/blocks still show).
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			the_content();
		}
		wp_reset_postdata();
	}

	// Build a product query from WooCommerce-style filter query params, e.g. filter_make=toyota.
	$paged = max( 1, (int) get_query_var( 'paged' ), (int) get_query_var( 'page' ) );

	$tax_query = array( 'relation' => 'AND' );

	// Support both "make=toyota" (vehicle_finder_form) and "filter_make=toyota" (layered nav style).
	if ( isset( $_GET['make'] ) && '' !== (string) $_GET['make'] && ! isset( $_GET['filter_make'] ) ) {
		$_GET['filter_make'] = $_GET['make']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}

	// Collect all filter_* query args and translate them to pa_* tax queries.
	foreach ( $_GET as $key => $raw_value ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( ! is_string( $key ) || 0 !== strpos( $key, 'filter_' ) ) {
			continue;
		}

		$attribute = substr( $key, 7 );
		$attribute = sanitize_key( $attribute );
		if ( '' === $attribute ) {
			continue;
		}

		$value = is_array( $raw_value ) ? implode( ',', $raw_value ) : (string) $raw_value;
		$value = sanitize_text_field( wp_unslash( $value ) );
		if ( '' === $value ) {
			continue;
		}

		$taxonomy = function_exists( 'wc_attribute_taxonomy_name' )
			? wc_attribute_taxonomy_name( $attribute )
			: ( 'pa_' . $attribute );
		if ( ! taxonomy_exists( $taxonomy ) ) {
			// Fallbacks for older/migrated setups.
			$fallback_taxonomies = array(
				'pa_' . $attribute,
				'pa-' . $attribute,
			);
			$found_taxonomy      = '';
			foreach ( $fallback_taxonomies as $maybe_taxonomy ) {
				if ( taxonomy_exists( $maybe_taxonomy ) ) {
					$found_taxonomy = $maybe_taxonomy;
					break;
				}
			}
			if ( '' === $found_taxonomy ) {
				continue;
			}
			$taxonomy = $found_taxonomy;
		}

		$terms = array_filter( array_map( 'sanitize_title', array_map( 'trim', explode( ',', $value ) ) ) );
		if ( empty( $terms ) ) {
			continue;
		}

		$tax_query[] = array(
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => $terms,
			'operator' => 'IN',
		);
	}

	// Support common Woo filters used in your forms.
	if ( isset( $_GET['product_cat'] ) && '' !== (string) $_GET['product_cat'] && taxonomy_exists( 'product_cat' ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$tax_query[] = array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => array( sanitize_title( wp_unslash( (string) $_GET['product_cat'] ) ) ), // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		);
	}
	if ( isset( $_GET['product_tag'] ) && '' !== (string) $_GET['product_tag'] && taxonomy_exists( 'product_tag' ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$tax_query[] = array(
			'taxonomy' => 'product_tag',
			'field'    => 'slug',
			'terms'    => array( sanitize_title( wp_unslash( (string) $_GET['product_tag'] ) ) ), // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		);
	}

	// Search: support either ?s=... or your ?product_name=...
	$search = '';
	if ( isset( $_GET['s'] ) && '' !== (string) $_GET['s'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$search = sanitize_text_field( wp_unslash( (string) $_GET['s'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	} elseif ( isset( $_GET['product_name'] ) && '' !== (string) $_GET['product_name'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$search = sanitize_text_field( wp_unslash( (string) $_GET['product_name'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
	}

	$meta_query = array();

	// Optional: price_range from the overlay form (e.g. 0-50, 500+).
	if ( isset( $_GET['price_range'] ) && '' !== (string) $_GET['price_range'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$range = sanitize_text_field( wp_unslash( (string) $_GET['price_range'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( preg_match( '/^(\d+)\s*-\s*(\d+)$/', $range, $m ) ) {
			$meta_query[] = array(
				'key'     => '_price',
				'value'   => array( (float) $m[1], (float) $m[2] ),
				'compare' => 'BETWEEN',
				'type'    => 'NUMERIC',
			);
		} elseif ( preg_match( '/^(\d+)\+$/', $range, $m ) ) {
			$meta_query[] = array(
				'key'     => '_price',
				'value'   => (float) $m[1],
				'compare' => '>=',
				'type'    => 'NUMERIC',
			);
		}
	}

	// Sorting similar to WooCommerce.
	$orderby  = 'date';
	$order    = 'DESC';
	$meta_key = '';
	if ( isset( $_GET['orderby'] ) && '' !== (string) $_GET['orderby'] ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$ob = sanitize_key( wp_unslash( (string) $_GET['orderby'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( 'price' === $ob ) {
			$orderby  = 'meta_value_num';
			$order    = 'ASC';
			$meta_key = '_price';
		} elseif ( 'price-desc' === $ob ) {
			$orderby  = 'meta_value_num';
			$order    = 'DESC';
			$meta_key = '_price';
		} elseif ( 'date' === $ob ) {
			$orderby = 'date';
			$order   = 'DESC';
		} elseif ( 'rating' === $ob ) {
			$orderby  = 'meta_value_num';
			$order    = 'DESC';
			$meta_key = '_wc_average_rating';
		} elseif ( 'popularity' === $ob ) {
			$orderby  = 'meta_value_num';
			$order    = 'DESC';
			$meta_key = 'total_sales';
		}
	}

	$args = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'posts_per_page' => 12,
		'paged'          => $paged,
		's'              => $search,
	);
	if ( count( $tax_query ) > 1 ) {
		$args['tax_query'] = $tax_query;
	}
	if ( ! empty( $meta_query ) ) {
		$args['meta_query'] = $meta_query;
	}
	if ( '' !== $meta_key ) {
		$args['meta_key'] = $meta_key;
	}
	$args['orderby'] = $orderby;
	$args['order']   = $order;

	$q = new WP_Query( $args );
	?>

	<div class="woocommerce search-result-sidebar-results">
		<?php if ( $q->have_posts() ) : ?>
			<?php
			if ( function_exists( 'woocommerce_product_loop_start' ) ) {
				woocommerce_product_loop_start();
				while ( $q->have_posts() ) :
					$q->the_post();
					wc_get_template_part( 'content', 'product' );
				endwhile;
				woocommerce_product_loop_end();
			} else {
				echo '<ul class="products">';
				while ( $q->have_posts() ) :
					$q->the_post();
					echo '<li><a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></li>';
				endwhile;
				echo '</ul>';
			}
			?>

			<?php
			// Pagination.
			$pagination_links = paginate_links(
				array(
					'total'   => max( 1, (int) $q->max_num_pages ),
					'current' => $paged,
					'type'    => 'list',
				)
			);
			if ( $pagination_links ) {
				echo '<nav class="navigation pagination">' . wp_kses_post( $pagination_links ) . '</nav>';
			}
			?>
		<?php else : ?>
			<p><?php esc_html_e( 'No products found for the selected filters.', 'astra' ); ?></p>
		<?php endif; ?>
	</div>

	<?php
	wp_reset_postdata();
	astra_primary_content_bottom();
	?>
</div><!-- #primary -->

<?php if ( astra_page_layout() === 'right-sidebar' ) { ?>
	<?php get_sidebar(); ?>
<?php } ?>

<?php get_footer(); ?>

