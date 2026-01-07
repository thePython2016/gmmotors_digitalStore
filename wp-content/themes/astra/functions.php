<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.11.18' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.11.6' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_WEBSITE_BASE_URL', 'https://wpastra.com' );

/**
 * Deprecate constants in future versions as they are no longer used in the codebase.
 */
define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'dashboard', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( '/pricing/', 'free-theme', 'customizer', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/dark-mode.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-memory-limit-notice.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-elementor-editor-settings.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-buddypress.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Hide "Home" text from header (site title area) without affecting menu
 */
add_action( 'wp_head', 'astra_hide_header_home_text' );
function astra_hide_header_home_text() {
	?>
	<style type="text/css">
		/* Hide site title "Home" text in header, but keep menu intact */
		#masthead .site-title,
		#masthead .site-title a,
		.main-header-bar .site-title,
		.main-header-bar .site-title a {
			display: none !important;
		}
	</style>
	<?php
}

/**
 * Fix checkout redirect using woocommerce_proceed_to_checkout hook
 * Ensures "Proceed to Checkout" button redirects to correct checkout page
 */
add_action( 'woocommerce_proceed_to_checkout', 'astra_fix_proceed_to_checkout_redirect', 5 );
function astra_fix_proceed_to_checkout_redirect() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}
	
	$checkout_page_id = wc_get_page_id( 'checkout' );
	if ( $checkout_page_id > 0 ) {
		$checkout_url = get_permalink( $checkout_page_id );
		
		// Ensure checkout URL is correct and doesn't contain /dashboard/
		if ( strpos( $checkout_url, '/dashboard/' ) === false ) {
			// Update the checkout URL if it's misconfigured
			update_option( 'woocommerce_checkout_page_id', $checkout_page_id );
		}
	}
}

// Also fix the checkout URL filter to ensure correct URL is always returned.
add_filter( 'woocommerce_get_checkout_url', 'astra_ensure_correct_checkout_url', 10, 1 );
function astra_ensure_correct_checkout_url( $url ) {
	if ( strpos( $url, '/dashboard/' ) !== false ) {
		$checkout_page_id = wc_get_page_id( 'checkout' );
		if ( $checkout_page_id > 0 ) {
			$url = get_permalink( $checkout_page_id );
		}
	}
	return $url;
}

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';

/**
 * ======================================================
 * ENABLE SHORTCODES INSIDE WORDPRESS MENUS (ASTRA SAFE)
 * ======================================================
 * Allows menu labels like:
 * [menu_cart]
 * [menu_login_signup]
 * [menu_logout]
 * [user_gravatar]
 */
add_filter('walker_nav_menu_start_el', function ($item_output) {
    if (strpos($item_output, '[') !== false) {
        $item_output = do_shortcode($item_output);
    }
    return $item_output;
}, 10, 1);

/**
 * ======================================================
 * USER GRAVATAR SHORTCODE
 * ======================================================
 * Shows logged-in user's avatar (menu-safe)
 *
 * Usage in menu:
 * [user_gravatar]
 * [user_gravatar size="28" show_name="no"]
 */
if (!function_exists('user_gravatar_shortcode')) {
    function user_gravatar_shortcode($atts) {

        if (!is_user_logged_in()) {
            return '';
        }

        $user = wp_get_current_user();

        $atts = shortcode_atts(array(
            'size'      => 28,
            'show_name' => 'no',
        ), $atts);

        $avatar = get_avatar(
            $user->ID,
            (int) $atts['size'],
            '',
            $user->display_name,
            array('class' => 'menu-user-avatar')
        );

        $html  = '<span class="menu-user-gravatar">';
        $html .= '<a href="' . esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) . '">';
        $html .= $avatar;

        if ($atts['show_name'] === 'yes') {
            $html .= '<span class="menu-user-name">' . esc_html($user->display_name) . '</span>';
        }

        $html .= '</a>';
        $html .= '</span>';

        return $html;
    }
}
if (!shortcode_exists('user_gravatar')) {
    add_shortcode('user_gravatar', 'user_gravatar_shortcode');
}

/**
 * ======================================================
 * LOGIN / SIGNUP MENU SHORTCODE
 * ======================================================
 * Shows ONLY when user is NOT logged in
 */
if (!function_exists('menu_login_signup_shortcode')) {
    function menu_login_signup_shortcode() {

        if (is_user_logged_in()) {
            return '';
        }

        return '<a class="menu-login-signup" href="' . esc_url(wp_login_url()) . '">
                    Signup / Login
                </a>';
    }
}
if (!shortcode_exists('menu_login_signup')) {
    add_shortcode('menu_login_signup', 'menu_login_signup_shortcode');
}

/**
 * ======================================================
 * LOGOUT MENU SHORTCODE
 * ======================================================
 * Shows ONLY when user IS logged in
 */
if (!function_exists('menu_logout_shortcode')) {
    function menu_logout_shortcode() {

        if (!is_user_logged_in()) {
            return '';
        }

        return '<a class="menu-logout" href="' . esc_url(wp_logout_url(home_url())) . '">
                    Logout
                </a>';
    }
}
if (!shortcode_exists('menu_logout')) {
    add_shortcode('menu_logout', 'menu_logout_shortcode');
}

/**
 * ======================================================
 * WOOCOMMERCE CART MENU SHORTCODE
 * ======================================================
 * - Basket icon
 * - ITEM COUNT AT TOP OF BASKET
 * - Total amount
 * - Opens Astra default slide-in cart
 */
if (!function_exists('menu_cart_shortcode')) {
    function menu_cart_shortcode() {

        if (!function_exists('WC')) {
            return '';
        }

        $count = WC()->cart->get_cart_contents_count();
        $total = WC()->cart->get_cart_total();

        ob_start(); ?>

        <a href="#" class="ast-cart-menu-trigger">

            <!-- Basket icon + count -->
            <span class="cart-icon-wrap">

                <span class="cart-icon">🛒</span>

                <?php if ($count > 0) : ?>
                    <span class="cart-count"><?php echo esc_html($count); ?></span>
                <?php endif; ?>

            </span>

            <span class="cart-total"><?php echo wp_kses_post($total); ?></span>

        </a>

        <?php
        return ob_get_clean();
    }
}
if (!shortcode_exists('menu_cart')) {
    add_shortcode('menu_cart', 'menu_cart_shortcode');
}

/**
 * ======================================================
 * OPEN ASTRA DEFAULT SLIDE-IN CART (RIGHT)
 * ======================================================
 */
add_action('wp_footer', function () {

    if (!function_exists('WC')) return;
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            document.body.addEventListener('click', function (e) {

                const trigger = e.target.closest('.ast-cart-menu-trigger');
                if (!trigger) return;

                e.preventDefault();

                const astraCart = document.querySelector('.ast-site-header-cart a');
                if (astraCart) {
                    astraCart.click();
                }
            });

        });
    </script>
    <?php
});

/**
 * ======================================================
 * MENU + CART + GRAVATAR STYLES
 * ======================================================
 */
add_action('wp_enqueue_scripts', function () {

    $css = "
    /* Cart trigger */
    .ast-cart-menu-trigger {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
    }

    /* Basket wrapper */
    .cart-icon-wrap {
        position: relative;
        display: inline-block;
    }

    /* Basket icon */
    .cart-icon {
        font-size: 20px;
    }

    /* ITEM COUNT AT TOP OF BASKET */
    .cart-icon-wrap .cart-count {
        position: absolute;
        top: -8px;
        right: -10px;
        background: #ff0000;
        color: #ffffff;
        font-size: 11px;
        min-width: 18px;
        height: 18px;
        line-height: 18px;
        text-align: center;
        border-radius: 50%;
        font-weight: bold;
        z-index: 9;
    }

    /* Cart total */
    .ast-cart-menu-trigger .cart-total {
        font-size: 14px;
    }

    /* User gravatar */
    .menu-user-gravatar {
        display: inline-flex;
        align-items: center;
        margin-right: 0 !important;
        margin-left: 0 !important;
        padding-right: 0 !important;
        padding-left: 0 !important;
    }

    .menu-user-gravatar img {
        border-radius: 50%;
        margin: 0 !important;
        padding: 0 !important;
    }

    .menu-user-name {
        margin-left: 4px;
        font-size: 14px;
    }

    /* Remove all distance between icon and signup/login */
    .menu-login-signup {
        margin-left: 0 !important;
        margin-right: 0 !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
    }

    /* Remove all spacing between user icon and signup/login */
    .menu-user-gravatar + .menu-login-signup,
    .menu-login-signup + .menu-user-gravatar {
        margin-left: 0 !important;
        margin-right: 0 !important;
    }

    /* Target menu items containing these elements - remove all spacing */
    .ast-header-menu .menu-item:has(.menu-user-gravatar) {
        margin-right: 0 !important;
        padding-right: 0 !important;
    }

    .ast-header-menu .menu-item:has(.menu-login-signup) {
        margin-left: 0 !important;
        padding-left: 0 !important;
    }

    /* When user icon and signup/login are adjacent menu items - zero spacing */
    .ast-header-menu .menu-item:has(.menu-user-gravatar) + .menu-item:has(.menu-login-signup),
    .ast-header-menu .menu-item:has(.menu-login-signup) + .menu-item:has(.menu-user-gravatar) {
        margin-left: 0 !important;
        padding-left: 0 !important;
    }

    /* Remove any gap from parent containers */
    .ast-header-menu li:has(.menu-user-gravatar),
    .ast-header-menu li:has(.menu-login-signup) {
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Ensure no gap between adjacent list items */
    .ast-header-menu li:has(.menu-user-gravatar) + li:has(.menu-login-signup),
    .ast-header-menu li:has(.menu-login-signup) + li:has(.menu-user-gravatar) {
        margin-left: 0 !important;
    }

    /* Move primary menu a little to the left */
    .ast-builder-layout-element[data-section='section-hb-menu-1'],
    .ast-builder-layout-element[data-section*='menu-1'],
    [data-section*='menu-1'],
    .ast-builder-menu-1,
    .ast-header-primary-menu,
    .ast-primary-menu,
    .ast-builder-menu-primary,
    .main-header-menu,
    .ast-main-header-bar-alignment {
        margin-left: -20px !important;
    }

    /* Move secondary menu block to the right */
    .ast-builder-layout-element[data-section='section-hb-menu-2'],
    .ast-builder-layout-element[data-section*='menu-2'],
    [data-section*='menu-2'],
    .ast-builder-menu-2,
    .ast-header-secondary-menu,
    .ast-secondary-menu,
    .ast-builder-menu-secondary {
        margin-left: auto !important;
        margin-right: 0 !important;
        order: 999 !important;
    }

    /* Push secondary menu items to right */
    .ast-header-secondary-menu .menu,
    .ast-secondary-menu .menu,
    .ast-builder-menu-secondary .menu,
    [data-section*='menu-2'] .menu,
    .ast-builder-menu-2 .menu,
    .site-header .ast-builder-menu-2 .menu {
        justify-content: flex-end !important;
        margin-left: auto !important;
        text-align: right;
    }

    /* Ensure header row pushes secondary menu to right */
    .ast-builder-header-row .ast-builder-layout-element[data-section*='menu-2'] {
        margin-left: auto !important;
    }

    /* For header builder grid layout */
    .ast-builder-header-row {
        display: flex !important;
    }

    .ast-builder-header-row .ast-builder-layout-element[data-section*='menu-2'] {
        margin-left: auto !important;
    }

    /* Ensure View Cart button is visible in cart drawer */
    .astra-cart-drawer .astra-cart-drawer-footer {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
        z-index: 10;
    }

    .astra-cart-drawer .astra-cart-drawer-view-cart-button {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    ";

    wp_register_style('menu-ui-style', false);
    wp_enqueue_style('menu-ui-style');
    wp_add_inline_style('menu-ui-style', $css);
});

/**
 * Product Search Banner Shortcode
 * Usage: [product_search_banner]
 */
if (!function_exists('product_search_banner_shortcode')) {
    function product_search_banner_shortcode($atts) {
        ob_start();
        get_template_part('template-parts/product-search-banner');
        return ob_get_clean();
    }
}
if (!shortcode_exists('product_search_banner')) {
    add_shortcode('product_search_banner', 'product_search_banner_shortcode');
}
