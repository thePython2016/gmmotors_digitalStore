<?php
/**
 * Account for Astra theme.
 *
 * @package     astra-builder
 * @link        https://wpastra.com/
 * @since       3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'ASTRA_HEADER_ACCOUNT_DIR', ASTRA_THEME_DIR . 'inc/builder/type/header/account' );
define( 'ASTRA_HEADER_ACCOUNT_URI', ASTRA_THEME_URI . 'inc/builder/type/header/account' );

if ( ! class_exists( 'Astra_Header_Account_Component' ) ) {

	/**
	 * Heading Initial Setup
	 *
	 * @since 3.0.0
	 */
	class Astra_Header_Account_Component {
		/**
		 * Constructor function that initializes required actions and hooks
		 */
		public function __construct() {

			// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			require_once ASTRA_HEADER_ACCOUNT_DIR . '/class-astra-header-account-component-loader.php';

			// Include front end files.
			if ( ! is_admin() || Astra_Builder_Customizer::astra_collect_customizer_builder_data() ) {
				require_once ASTRA_HEADER_ACCOUNT_DIR . '/dynamic-css/dynamic.css.php';
			}
			// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		}

		/**
		 * Get icon for account menu endpoint
		 *
		 * @param string $endpoint The WooCommerce account endpoint.
		 * @return string SVG icon markup.
		 */
		public static function get_account_menu_icon( $endpoint ) {
			$icons = array(
				'dashboard'      => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>',
				'orders'         => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>',
				'downloads'       => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>',
				'edit-address'   => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>',
				'edit-account'   => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>',
				'customer-logout' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>',
			);

			// Handle aliases
			if ( 'addresses' === $endpoint ) {
				$endpoint = 'edit-address';
			} elseif ( 'account-details' === $endpoint || 'account' === $endpoint ) {
				$endpoint = 'edit-account';
			} elseif ( 'logout' === $endpoint ) {
				$endpoint = 'customer-logout';
			}

			return isset( $icons[ $endpoint ] ) ? $icons[ $endpoint ] : '';
		}

		/**
		 * Account navigation markup
		 */
		public static function account_menu_markup() {
			$astra_builder   = astra_builder();
			$theme_location  = 'loggedin_account_menu';
			$account_type    = astra_get_option( 'header-account-type' );
			$enable_woo_menu = ( 'woocommerce' === $account_type && astra_get_option( 'header-account-woo-menu' ) );

			/**
			 * Filter the classes(array) for Menu (<ul>).
			 *
			 * @since  3.0.0
			 * @var Array
			 */
			$menu_classes = apply_filters( 'astra_menu_classes', array( 'main-header-menu', 'ast-menu-shadow', 'ast-nav-menu', 'ast-account-nav-menu' ) );

			$items_wrap  = '<nav ';
			$items_wrap .= astra_attr(
				'site-navigation',
				array(
					'id'         => 'account-site-navigation',
					'class'      => 'site-navigation ast-flex-grow-1 navigation-accessibility site-header-focus-item',
					'aria-label' => esc_attr__( 'Site Navigation', 'astra' ),
				)
			);
			$items_wrap .= '>';
			$items_wrap .= '<div class="account-main-navigation">';
			$items_wrap .= '<ul id="%1$s" class="%2$s">%3$s</ul>';
			$items_wrap .= '</div>';
			$items_wrap .= '</nav>';

			// Fallback Menu if primary menu not set.
			$fallback_menu_args = array(
				'theme_location' => $theme_location,
				'menu_id'        => 'ast-hf-account-menu',
				'menu_class'     => 'account-main-navigation',
				'container'      => 'div',
				'before'         => '<ul class="' . esc_attr( implode( ' ', $menu_classes ) ) . '">',
				'after'          => '</ul>',
				'walker'         => new Astra_Walker_Page(),
				'echo'           => false,
			);

			// To add default alignment for navigation which can be added through any third party plugin.
			// Do not add any CSS from theme except header alignment.
			echo '<div class="ast-hf-account-menu-wrap ast-main-header-bar-alignment">';

			if ( has_nav_menu( $theme_location ) && ! $enable_woo_menu ) {
				$account_menu_markup = wp_nav_menu(
					array(
						'menu_id'         => 'ast-hf-account-menu',
						'menu_class'      => esc_attr( implode( ' ', $menu_classes ) ),
						'container'       => 'div',
						'container_class' => 'account-main-header-bar-navigation',
						'items_wrap'      => $items_wrap,
						'theme_location'  => $theme_location,
						'echo'            => false,
					)
				);

				// Adding rel="nofollow" for duplicate menu render.
				$account_menu_markup = $astra_builder->nofollow_markup( $theme_location, $account_menu_markup );
				echo do_shortcode( $account_menu_markup );
			} elseif ( $enable_woo_menu ) {
				echo '<div class="ast-hf-account-menu-wrap ast-main-header-bar-alignment">';
					echo '<div class="account-main-header-bar-navigation">';
						echo '<nav ';
						echo wp_kses_post(
							astra_attr(
								'account-woo-navigation',
								array(
									'id' => 'account-woo-navigation',
								)
							)
						);
						echo ' class="ast-flex-grow-1 navigation-accessibility site-header-focus-item" aria-label="' . esc_attr__( 'Account Woo Navigation', 'astra' ) . '">';

				ob_start();
				if ( class_exists( 'woocommerce' ) ) {
					?>
					<ul id="ast-hf-account-menu" class="main-header-menu ast-nav-menu ast-account-nav-menu ast-header-account-woocommerce-menu">
						<?php foreach ( wc_get_account_menu_items() as $endpoint => $item ) { 
							$icon = self::get_account_menu_icon( $endpoint );
							?>
							<li class="menu-item <?php echo esc_attr( wc_get_account_menu_item_classes( $endpoint ) ); ?>">
								<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>" class="menu-link">
									<?php if ( $icon ) { ?>
										<span class="ast-account-menu-icon" aria-hidden="true"><?php echo wp_kses( $icon, Astra_Icons::allowed_svg_args() ); ?></span>
									<?php } ?>
									<span class="ast-account-menu-text"><?php echo esc_html( $item ); ?></span>
								</a>
							</li>
						<?php } ?>
					</ul>
					<?php
				}
				$account_menu_markup = ob_get_clean();

				// Adding rel="nofollow" for duplicate menu render.
				$account_menu_markup = $astra_builder->nofollow_markup( $theme_location, $account_menu_markup );
				echo wp_kses_post( $account_menu_markup );
						echo '</nav>';
					echo '</div>';
				echo '</div>';
			} else {
				echo '<div class="ast-hf-account-menu-wrap ast-main-header-bar-alignment">';
					echo '<div class="account-main-header-bar-navigation">';
						echo '<nav ';
							echo wp_kses_post(
								astra_attr(
									'site-navigation',
									array(
										'id'         => 'account-site-navigation',
										'class'      => 'site-navigation ast-flex-grow-1 navigation-accessibility',
										'aria-label' => esc_attr__( 'Site Navigation', 'astra' ),
									)
								)
							);
							echo '>';
							$account_menu_markup = wp_page_menu( $fallback_menu_args );

							// Adding rel="nofollow" for duplicate menu render.
							$account_menu_markup = $astra_builder->nofollow_markup( $theme_location, $account_menu_markup );
							echo wp_kses_post( $account_menu_markup );
						echo '</nav>';
					echo '</div>';
				echo '</div>';
			}
			echo '</div>';
		}
	}

	/**
	 *  Kicking this off by creating an object.
	 */
	new Astra_Header_Account_Component();

}
