<?php
/**
 * Template part for displaying product search banner with promotional content
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<section class="product-search-banner-section">
	<div class="product-search-banner-container">
		<!-- Left Side: Product Search Form -->
		<div class="banner-search-form-wrapper">
			<div class="product-search-form-container">
				<h2 class="product-search-title">Product</h2>
				
				<form class="product-search-form" method="get" action="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>">
					
					<!-- Main Search Input -->
					<div class="search-field-wrapper">
						<input 
							type="text" 
							name="s" 
							class="product-search-input" 
							placeholder="Search any product"
							value="<?php echo isset( $_GET['s'] ) ? esc_attr( $_GET['s'] ) : ''; ?>"
						>
						<input type="hidden" name="post_type" value="product">
					</div>
					
					<!-- Filter Dropdowns -->
					<div class="search-filters">
						<!-- First Row -->
						<div class="filter-row">
							<select name="product_cat" class="filter-dropdown">
								<option value="">Category</option>
								<?php
								$categories = get_terms( array(
									'taxonomy' => 'product_cat',
									'hide_empty' => false,
								) );
								foreach ( $categories as $category ) {
									$selected = isset( $_GET['product_cat'] ) && $_GET['product_cat'] == $category->slug ? 'selected' : '';
									echo '<option value="' . esc_attr( $category->slug ) . '" ' . $selected . '>' . esc_html( $category->name ) . '</option>';
								}
								?>
							</select>
							
							<select name="product_tag" class="filter-dropdown">
								<option value="">Tag</option>
								<?php
								$tags = get_terms( array(
									'taxonomy' => 'product_tag',
									'hide_empty' => false,
								) );
								foreach ( $tags as $tag ) {
									$selected = isset( $_GET['product_tag'] ) && $_GET['product_tag'] == $tag->slug ? 'selected' : '';
									echo '<option value="' . esc_attr( $tag->slug ) . '" ' . $selected . '>' . esc_html( $tag->name ) . '</option>';
								}
								?>
							</select>
						</div>
						
						<!-- Second Row -->
						<div class="filter-row">
							<select name="orderby" class="filter-dropdown">
								<option value="">Sort By</option>
								<option value="popularity" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'popularity' ); ?>>Popularity</option>
								<option value="rating" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'rating' ); ?>>Rating</option>
								<option value="date" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'date' ); ?>>Latest</option>
								<option value="price" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'price' ); ?>>Price: Low to High</option>
								<option value="price-desc" <?php selected( isset( $_GET['orderby'] ) ? $_GET['orderby'] : '', 'price-desc' ); ?>>Price: High to Low</option>
							</select>
							
							<select name="price_range" class="filter-dropdown">
								<option value="">Price range</option>
								<option value="0-50" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '0-50' ); ?>>$0 - $50</option>
								<option value="50-100" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '50-100' ); ?>>$50 - $100</option>
								<option value="100-250" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '100-250' ); ?>>$100 - $250</option>
								<option value="250-500" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '250-500' ); ?>>$250 - $500</option>
								<option value="500+" <?php selected( isset( $_GET['price_range'] ) ? $_GET['price_range'] : '', '500+' ); ?>>$500+</option>
							</select>
						</div>
					</div>
					
					<!-- Search Button -->
					<button type="submit" class="product-search-button">SEARCH</button>
				</form>
			</div>
		</div>

		<!-- Right Side: Promotional Content -->
		<div class="banner-promotional-content">
			<h1 class="banner-title">
				<span class="banner-title-line1">Raining Offers For</span>
				<span class="banner-title-line2">Hot Summer!</span>
			</h1>
			<p class="banner-offer">25% Off On All Products</p>
			<div class="banner-buttons">
				<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="banner-btn banner-btn-primary">SHOP NOW</a>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="banner-btn banner-btn-secondary">FIND MORE</a>
			</div>
		</div>
	</div>
</section>

<style>
/* Product Search Banner Section */
.product-search-banner-section {
	position: relative;
	width: 100%;
	min-height: 500px;
	background: #e8f4fd;
	padding: 60px 40px;
	display: flex;
	align-items: center;
	overflow: hidden;
}

.product-search-banner-container {
	max-width: 1400px;
	width: 100%;
	margin: 0 auto;
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 60px;
	align-items: center;
}

/* Right Side: Promotional Content */
.banner-promotional-content {
	color: #ffffff;
	z-index: 2;
}

.banner-title {
	font-size: 4rem;
	font-weight: bold;
	line-height: 1.2;
	margin: 0 0 20px 0;
	color: #ffffff;
	font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
}

.banner-title-line1 {
	display: block;
}

.banner-title-line2 {
	display: block;
}

.banner-offer {
	font-size: 1.5rem;
	margin: 0 0 30px 0;
	color: #ffffff;
	font-weight: 500;
}

.banner-buttons {
	display: flex;
	gap: 15px;
	flex-wrap: wrap;
}

.banner-btn {
	padding: 15px 35px;
	font-size: 1rem;
	font-weight: bold;
	text-decoration: none;
	border-radius: 5px;
	text-transform: uppercase;
	transition: all 0.3s ease;
	display: inline-block;
}

.banner-btn-primary {
	background: #ffffff;
	color: #4a90e2;
	border: 2px solid #ffffff;
}

.banner-btn-primary:hover {
	background: transparent;
	color: #ffffff;
	border-color: #ffffff;
}

.banner-btn-secondary {
	background: transparent;
	color: #ffffff;
	border: 2px solid #ffffff;
}

.banner-btn-secondary:hover {
	background: #ffffff;
	color: #4a90e2;
}

/* Left Side: Product Search Form */
.banner-search-form-wrapper {
	z-index: 2;
}

.product-search-form-container {
	background: #ffffff;
	padding: 40px;
	border-radius: 15px;
	box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.product-search-title {
	font-size: 2rem;
	font-weight: bold;
	color: #333;
	text-align: center;
	margin-bottom: 25px;
	margin-top: 0;
	font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
}

.product-search-form {
	display: flex;
	flex-direction: column;
	gap: 15px;
}

.search-field-wrapper {
	margin-bottom: 5px;
}

.product-search-input {
	width: 100%;
	padding: 15px 20px;
	font-size: 1rem;
	border: 1px solid #d0d0d0;
	border-radius: 8px;
	background: #ffffff;
	color: #333;
	box-sizing: border-box;
	transition: border-color 0.3s ease;
}

.product-search-input:focus {
	outline: none;
	border-color: #4a90e2;
}

.product-search-input::placeholder {
	color: #999;
}

.search-filters {
	display: flex;
	flex-direction: column;
	gap: 15px;
}

.filter-row {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 15px;
}

.filter-dropdown {
	width: 100%;
	padding: 15px 20px;
	font-size: 1rem;
	border: 1px solid #d0d0d0;
	border-radius: 8px;
	background: #ffffff;
	color: #333;
	cursor: pointer;
	appearance: none;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
	background-repeat: no-repeat;
	background-position: right 15px center;
	background-size: 12px;
	padding-right: 40px;
	transition: border-color 0.3s ease, background-color 0.3s ease;
	box-sizing: border-box;
}

.filter-dropdown:hover {
	border-color: #4a90e2;
}

.filter-dropdown:focus {
	outline: none;
	border-color: #4a90e2;
}

.product-search-button {
	width: 100%;
	padding: 18px 30px;
	font-size: 1.1rem;
	font-weight: bold;
	color: #ffffff;
	background: #4a90e2;
	border: none;
	border-radius: 8px;
	cursor: pointer;
	transition: background-color 0.3s ease, transform 0.1s ease;
	font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
	margin-top: 5px;
	text-transform: uppercase;
	letter-spacing: 0.5px;
}

.product-search-button:hover {
	background: #357abd;
	transform: translateY(-2px);
	box-shadow: 0 4px 12px rgba(74, 144, 226, 0.3);
}

.product-search-button:active {
	transform: translateY(0);
}

/* Responsive Design */
@media (max-width: 1024px) {
	.product-search-banner-container {
		grid-template-columns: 1fr;
		gap: 40px;
	}
	
	.banner-title {
		font-size: 3rem;
	}
}

@media (max-width: 768px) {
	.product-search-banner-section {
		padding: 40px 20px;
		min-height: auto;
	}
	
	.banner-title {
		font-size: 2.5rem;
		margin-bottom: 15px;
	}
	
	.banner-offer {
		font-size: 1.2rem;
		margin-bottom: 20px;
	}
	
	.product-search-form-container {
		padding: 30px 20px;
	}
	
	.product-search-title {
		font-size: 2rem;
		margin-bottom: 20px;
	}
	
	.filter-row {
		grid-template-columns: 1fr;
	}
}

@media (max-width: 480px) {
	.banner-title {
		font-size: 2rem;
	}
	
	.banner-btn {
		padding: 12px 25px;
		font-size: 0.9rem;
	}
	
	.product-search-form-container {
		padding: 25px 15px;
	}
	
	.product-search-input,
	.filter-dropdown,
	.product-search-button {
		padding: 15px;
		font-size: 0.95rem;
	}
}
</style>
